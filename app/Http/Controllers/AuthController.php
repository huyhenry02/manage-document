<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class AuthController extends Controller
{
    public function show_login(): View|Factory|Application
    {
        return view('auth.login');
    }

    public function postLoin()
    {

    }
}
