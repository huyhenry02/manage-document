<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Document;
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
        return view('document.index');
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
            $document = new Document();
            $document->fill($input);
            $document->save();
            DB::commit();
            return redirect()->route('document.index');

        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
