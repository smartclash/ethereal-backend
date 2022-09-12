<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'paid']);
    }

    public function show()
    {
        return view('dashboard');
    }
}