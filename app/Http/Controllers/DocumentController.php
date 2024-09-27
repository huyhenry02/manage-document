<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

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
}
