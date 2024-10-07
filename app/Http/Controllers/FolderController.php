<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class FolderController extends Controller
{
    public function show_index(): View|Factory|Application
    {
        $categories = Folder::all()->toArray();
        $data = $this->buildFolderTree($categories);
        return view('folder.index', ['data' => $data]);
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

    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            if (!empty($input['parent_id']))
            {
                $input['parent_id'] = null;
            }
            $input['create_user_id'] = auth()->id();
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
}
