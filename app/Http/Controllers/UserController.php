<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class UserController extends Controller
{
    public function show_index(): View|Factory|Application
    {
        $agents = User::where('role_type', User::ROLE_AGENT)->get();
        return view('user.index',
        [
            'agents' => $agents,
        ]);
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
