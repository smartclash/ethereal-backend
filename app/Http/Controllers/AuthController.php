<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function choose()
    {
        return view('auth.choose');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function processRegister(RegisterRequest $request)
    {
        auth()->login(
            User::create($request->all())
        );

        return auth()->user();
    }
}
