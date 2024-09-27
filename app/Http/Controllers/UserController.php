<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class UserController extends Controller
{
    public function show_index(): View|Factory|Application
    {
        return view('user.index');
    }

    public function show_create(): View|Factory|Application
    {
        return view('user.create');

    }

    public function show_detail(): View|Factory|Application
    {
        return view('user.detail');

    }

    public function show_update(): View|Factory|Application
    {
        return view('user.update');

    }
}
