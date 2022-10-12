<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Exports\UsersExport;
use App\Http\Requests\Admin\ExportRequest;
use App\Models\User;
use Maatwebsite\Excel\Excel;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'only.admin']);
    }

    public function dashboard()
    {
        $registrants = User::where('role', Role::PARTICIPANT)->count();
        $paidRegistrants = User::where('role', Role::PARTICIPANT)
            ->whereRelation('razorpay', 'paid', true)
            ->count();

        $kcgRegistrants = User::where('role', Role::PARTICIPANT)
            ->whereRelation('details', 'college', 'like', '%kcg%')
            ->count();
        $paidKcgRegistrants = User::where('role', Role::PARTICIPANT)
            ->whereRelation('details', 'college', 'like', '%kcg%')
            ->whereRelation('razorpay', 'paid', true)
            ->count();

        return view('admin.dashboard')->with([
            'registrants' => $registrants,
            'paidRegistrants' => $paidRegistrants,
            'kcgRegistrants' => $kcgRegistrants,
            'paidKcgRegistrants' => $paidKcgRegistrants,
        ]);
    }

    public function export(ExportRequest $request)
    {
        return (new UsersExport(
            $request->get('paid', false),
            $request->get('kcg', false)
        ))->download('users.xlsx');
    }
}
