<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetailRequest;

class UserDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'details']);
    }

    public function showForm()
    {
        return view('get-detail');
    }

    public function process(UserDetailRequest $request)
    {
        auth()->user()->details()->create(
            $request->all()
        );
    }
}
