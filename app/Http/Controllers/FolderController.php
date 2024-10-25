<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Folder;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class FolderController extends Controller
{
    public function show_index($folder_id): View|Factory|Application
    {
        $folders = Folder::all()->toArray();
        $documents = Document::where('folder_id', $folder_id)->get();
        $folder = Folder::find($folder_id);
        $data = $this->buildFolderTree($folders);
        return view('folder.index',
            [
                'data' => $data,
                'documents' => $documents,
                'folders' => $folders,
                'folder' => $folder
            ]);
    }

    private function buildFolderTree(array $categories, $parentId = null): array
    {
        $branch = [];

        foreach ($categories as $folder) {
            if ($folder['parent_id'] === $parentId) {
                $children = $this->buildFolderTree($categories, $folder['id']);
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

    public function show_detail(): View|Factory|Application
    {
        return view('folder.detail');

    }

    public function show_update(): View|Factory|Application
    {
        return view('folder.update');

    }

    public function getDocumentsOfFolder($folder_id): View|Factory|Application
    {
        $documents = Document::where('folder_id', $folder_id)
            ->where('is_private', 0)
            ->get();
        $folder = Folder::find($folder_id);
        return view('partials.documents-of-folder', [
            'documents' => $documents,
            'folder' => $folder
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['created_by_id'] = auth()->id();
            $folder = new Folder();
            $folder->fill($input);
            $folder->save();
            DB::commit();
            return redirect()->route('folder.index');
        }catch (Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function moveDocuments(Request $request): JsonResponse
    {
        $documentIds = $request->input('document_ids');
        $folderId = $request->input('folder_id');
        Document::whereIn('id', $documentIds)->update([
            'folder_id' => $folderId,
            'updated_by_id' => auth()->id()
        ]);

        return response()->json(['message' => 'Moved successfully']);
    }

    public function deleteDocumentsOfFolder(Request $request): JsonResponse
    {
        $documentIds = $request->input('document_ids');

        if (!empty($documentIds)) {
            Document::whereIn('id', $documentIds)->delete();
            return response()->json(['message' => 'Deleted successfully']);
        }

        return response()->json(['message' => 'No documents selected'], 400);
    }

    public function delete($folder_id): JsonResponse
    {
        $folder = Folder::with('children.documents', 'documents')->find($folder_id);

        if (!$folder) {
            return response()->json(['success' => false, 'message' => 'Folder not found.']);
        }

        if ($folder->documents->isNotEmpty() || $folder->children->flatMap->documents->isNotEmpty()) {
            return response()->json(['success' => false, 'message' => 'Thư mục vẫn còn tài liệu bên trong, vui lòng di chuyển tài liệu sang thư mục khác.']);
        }

        $folder->children()->delete();
        $folder->delete();

        return response()->json(['success' => true, 'message' => 'Xóa thành công.']);
    }
}
