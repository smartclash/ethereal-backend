<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'paid']);
    }

    public function show()
    {
        if (auth()->user()->role == Role::ADMIN) {
            return redirect()->route('admin.dashboard');
        }

        return view('dashboard');
    }
}
