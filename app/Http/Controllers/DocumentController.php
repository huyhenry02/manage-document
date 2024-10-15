<?php

namespace App\Http\Controllers;

use App\Models\AttachmentFile;
use App\Models\Folder;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function show_index(): View|Factory|Application
    {
        $documents = Document::all();
        $draftDocuments = Document::where('status', Document::STATUS_DRAFT)->get();
        $pendingDocuments = Document::where('status', Document::STATUS_PENDING)->get();
        $activeDocuments = Document::where('status', Document::STATUS_ACTIVE)->get();
        $rejectDocuments = Document::where('status', Document::STATUS_REJECTED)->get();

        return view('document.index',
            [
                'documents' => $documents,
                'draftDocuments' => $draftDocuments,
                'pendingDocuments' => $pendingDocuments,
                'activeDocuments' => $activeDocuments,
                'rejectDocuments' => $rejectDocuments
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

    public function show_detail(): View|Factory|Application
    {
        return view('document.detail');
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

    public function createDocument(Request $request): JsonResponse|RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['created_by_id'] = auth()->id();
            $input['status'] = auth()->user()->role_type === User::ROLE_ADMIN ? Document::STATUS_ACTIVE : Document::STATUS_DRAFT;
            $input['is_featured'] = $request->has('is_featured') ? 1 : 0;
            $document = new Document();
            $document->fill($input);
            $document->save();
            $document->code = 'DOC' . $document->folder_id . '-' . $document->id;
            $document->save();
            if ($request->hasFile('attachment_files')) {
                $this->handleUploadFile($request, $document);
            }
            DB::commit();
            return redirect()->route('document.index');

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function updateDocument(Request $request, Document $model)
    {

    }

    private function handleUploadFile($request, $document): void
    {
        $file = $request->file('attachment_fil');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storePubliclyAs('files/products', $fileName);
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
}
