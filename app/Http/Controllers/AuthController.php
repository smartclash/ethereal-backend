<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\PaymentGateway;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

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

        $user = User::create([
            'password' => \Hash::make($request->get('password')),
            ...$request->only(['name', 'email', 'phone'])
        ]);
        $user->razorpay()->create([
            'customer' => $customer->id,
            'order' => $order->id
        ]);

        auth()->login($user);

        return redirect()->route('details.form');
    }

    public function processLogin(LoginRequest $request)
    {
        $attempt = \Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        if ($attempt) {
            return redirect()->route('dashboard.show');
        }

        return redirect()->route('auth.login')->withErrors([
            'password' => 'The password you entered was wrong'
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('auth.choose');
    }
}
