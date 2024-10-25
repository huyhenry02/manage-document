<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class AuthController extends Controller
{
    public function show_login(): View|Factory|Application
    {
        return view('auth.login');
    }

    public function postLogin(Request $request): ?RedirectResponse
    {
        try {
            $credentials = $request->only('user_name', 'password');
            if (auth()->attempt($credentials)) {
                return redirect()->route('document.index');
            }
            return redirect()->back();
        }catch (Exception $e) {
            return redirect()->route('auth.login')->with('error', $e->getMessage());
        }
    }

    public function postLogout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('auth.login');
    }
}
