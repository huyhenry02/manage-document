<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class CategoryController extends Controller
{
    public function show_index(): View|Factory|Application
    {
        $categories = Category::all()->toArray();
        $data = $this->buildCategoryTree($categories);
        return view('category.index', ['data' => $data]);
    }

    private function buildCategoryTree(array $categories, $parentId = null): array
    {
        $branch = [];

        foreach ($categories as $category) {
            if ($category['parent_id'] === $parentId) {
                $children = $this->buildCategoryTree($categories, $category['id']);
                if ($children) {
                    $category['subfolder'] = $children;
                } else {
                    $category['subfolder'] = null;
                }
                $branch[] = $category;
            }
        }

        return $branch;
    }

    public function show_detail(): View|Factory|Application
    {
        return view('category.detail');

    }

    public function show_update(): View|Factory|Application
    {
        return view('category.update');

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
            $category = new Category();
            $category->fill($input);
            $category->save();
            DB::commit();
            return redirect()->route('category.index');
        }catch (Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }
}
