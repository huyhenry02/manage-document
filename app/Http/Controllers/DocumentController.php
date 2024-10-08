<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Contracts\View\View;
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
        return view('document.create');

    }

    public function show_detail(): View|Factory|Application
    {
        return view('document.detail');

    }

    public function show_update(): View|Factory|Application
    {
        return view('document.update');

    }

    public function createDocument(Request $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['created_by_id'] = auth()->id();
            $document = Document::create($input);
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
