<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\User;
use App\Services\PaymentGateway;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Laravel\Socialite\Facades\Socialite;

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

    public function adminLogin()
    {
        return view('auth.admin');
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

    public function forgotPassword()
    {
        return view('auth.forgot');
    }

    public function processForgotPassword(ForgotPasswordRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword($token)
    {
        return view('auth.reset')->with([
            'token' => $token
        ]);
    }

    public function processResetPassword(ResetPasswordRequest $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, $password) {
                $user->forceFill([
                    'password' => \Hash::make($password)
                ])->setRememberToken(\Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('auth.login')->with('status', __($status))
            : back()->withErrors(['password' => [__($status)]]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('auth.choose');
    }

    public function redirectToGoogle()
    {
        config(['services.google.redirect' => route('auth.google.callback')]);
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        config(['services.google.redirect' => route('auth.google.callback')]);
        $socialite = Socialite::driver('google')->stateless()->user();

        $user = User::whereEmail($socialite->getEmail())->first();

        if (!$user?->exists()) {
            $user = User::create([
                'name' => $socialite->getName(),
                'phone' => fake()->phoneNumber,
                'email' => $socialite->getEmail(),
                'password' => \Hash::make(\Str::random(10)),
                'google_id' => $socialite->getId(),
                'role' => Role::ADMIN,
            ]);
        }

        \Auth::login($user);

        return redirect()->route('admin.dashboard');
    }
}
