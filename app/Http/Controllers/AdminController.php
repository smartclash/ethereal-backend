<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'only.admin']);
    }

    public function dashboard()
    {
        $registrants = User::select('id')->count();
        $paidRegistrants = User::whereRelation('razorpay', 'paid', true)->count();

        $kcgRegistrants = User::whereRelation('details', 'college', 'like', '%kcg%')
            ->count();
        $paidKcgRegistrants = User::whereRelation('details', 'college', 'like', '%kcg%')
            ->whereRelation('razorpay', 'paid', true)
            ->count();

        return view('admin.dashboard')->with([
            'registrants' => $registrants,
            'paidRegistrants' => $paidRegistrants,
            'kcgRegistrants' => $kcgRegistrants,
            'paidKcgRegistrants' => $paidKcgRegistrants,
        ]);
    }
}
