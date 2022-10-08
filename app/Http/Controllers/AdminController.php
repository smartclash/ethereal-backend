<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'only.admin']);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
