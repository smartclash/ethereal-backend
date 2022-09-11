<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\PaymentGateway;

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
        $customer = PaymentGateway::createCustomer(
            $request->get('name'),
            $request->get('email'),
            $request->get('phone')
        );
        $order = PaymentGateway::createOrder();

        $user = User::create($request->all());
        $user->razorpay()->create([
            'customer' => $customer->id,
            'order' => $order->id
        ]);

        auth()->login($user);

        return auth()->user();
    }
}
