<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Folder;
use App\Models\Comment;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\AttachmentFile;
use App\Models\DocumentAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class DocumentController extends Controller
{
    public function show_index(): View|Factory|Application
    {
        $documents = Document::where('is_private', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('document.index',
            [
                'documents' => $documents,
            ]);
    }

    public function show_create(): View|Factory|Application
    {
        $folders = Folder::all()->toArray();
        $folderTree = $this->buildFolderTree($folders);
        return view('document.create', [
            'folderTree' => $folderTree
        ]);

    }

    public function show_detail(Document $model): View|Factory|Application
    {
        $comments = Comment::where('document_id', $model->id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('document.detail',
            [
                'model' => $model,
                'comments' => $comments
            ]);
    }

    public function showRequestDetail(DocumentAction $documentAction): View|Factory|Application
    {
        $document = $documentAction->document;
        return view('document.request.request-detail',
            [
                'documentAction' => $documentAction,
                'document' => $document
            ]);
    }

    public function showPrivateDocument(): View|Factory|Application
    {
        $documents = Document::where('created_by_id', auth()->id())->get();
        return view('document.request.private',
            [
                'documents' => $documents
            ]);
    }
    private function buildFolderTree(array $folders, $parentId = null): array
    {
        $branch = [];

        foreach ($folders as $folder) {
            if ($folder['parent_id'] === $parentId) {
                $children = $this->buildFolderTree($folders, $folder['id']);
                if ($children) {
                    $folder['subfolder'] = $children;
                } else {
                    $folder['subfolder'] = null;
                }
                $branch[] = $folder;
            }
        }

        return $branch;
    }

    public function show_update(): View|Factory|Application
    {
        return view('document.update');

    }

    public function showListRequestForAdmin(): View|Factory|Application
    {
        $requests = DocumentAction::all();
        return view('document.request.list-request-for-admin',
            [
                'requests' => $requests
            ]);
    }

    public function showListRequestForAgent(): View|Factory|Application
    {
        $requests = DocumentAction::where('created_by_id', auth()->id())->get();
        return view('document.request.list-request-for-agent',
            [
                'requests' => $requests
            ]);
    }
    public function createDocument(Request $request): JsonResponse|RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['created_by_id'] = auth()->id();
            $input['is_featured'] = $request->has('is_featured') ? 1 : 0;
            $document = new Document();
            $document->fill($input);
            $document->save();
            $document->code = 'DOC' . $document->folder_id . '-' . $document->id;
            $document->save();
            if ($request->hasFile('attachment_file')) {
                $this->handleUploadFile($request, $document);
            }
            DB::commit();
            return redirect()->route('document.index');

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    private function handleUploadFile($request, $document): void
    {
        $file = $request->file('attachment_file');
        $fileName = $document->code . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storePubliclyAs('files/document', $fileName);
        $data = asset('storage/' . $filePath);
        $attachment = new AttachmentFile();
        $input = [
            'document_id' => $document->id,
            'file_path' => $data,
            'file_name' => $fileName,
            'file_size' => $file->getSize(),
            'mime_type' => $file->getClientMimeType(),
            'uploaded_by_id' => auth()->id()
        ];
        $attachment->fill($input);
        $attachment->save();
    }

    public function actionDocument(Document $document, Request $request): JsonResponse|RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['created_by_id'] = auth()->id();
            $input['user_type'] = auth()->user()->role_type;
            $input['document_id'] = $document->id;
            $documentAction = new DocumentAction();
            $documentAction->fill($input);
            $documentAction->save();
            DB::commit();
            return redirect()->route('document.index');
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function confirmRequest(DocumentAction $documentAction, Request $request): JsonResponse|RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            if ($input['action'] === DocumentAction::STATUS_APPROVED) {
                switch ($documentAction->action) {
                    case DocumentAction::ACTION_PUBLIC_DOCUMENT:
                        $document = Document::find($documentAction->document_id);
                        $document->is_private = 0;
                        $document->save();
                        break;
                    case DocumentAction::ACTION_EDIT_DOCUMENT:
                        $document = Document::find($documentAction->document_id);
                        $document->save();
                        break;
                }
            }
            $documentAction->status = $input['action'];
            $documentAction->confirmed_by_id = auth()->id();
            $documentAction->save();
            DB::commit();
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
