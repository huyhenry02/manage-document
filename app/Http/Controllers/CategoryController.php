<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class CategoryController extends Controller
{
    public function show_index(): View|Factory|Application
    {
        return view('category.index');
    }

    public function show_create(): View|Factory|Application
    {
        return view('category.create');

    }

    public function show_detail(): View|Factory|Application
    {
        return view('category.detail');

    }

    public function show_update(): View|Factory|Application
    {
        return view('category.update');

    }
}
