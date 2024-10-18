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
        $documents = Document::where('folder_id', $folder_id)->get();
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

        Document::whereIn('id', $documentIds)->update(['folder_id' => $folderId]);

        return response()->json(['message' => 'Moved successfully']);
    }


}
