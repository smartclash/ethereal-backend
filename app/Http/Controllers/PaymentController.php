<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistered;
use App\Services\PaymentGateway;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'payment']);
    }

    public function show()
    {
        return redirect()->route('closed');

        return view('payment');
    }

    public function callback()
    {
        try {
            \DB::beginTransaction();

            PaymentGateway::verifyPayment(request()->only([
                'razorpay_payment_id',
                'razorpay_order_id',
                'razorpay_signature'
            ]));

            auth()->user()->razorpay->update([
                'paid' => true,
                'razorpay' => request()->get('razorpay_payment_id'),
            ]);
            auth()->user()->details->update([
                'code' => \Str::random(6)
            ]);

            \Mail::to(auth()->user())
                ->send(new UserRegistered(auth()->user()));

            \DB::commit();
            return redirect()->route('dashboard.show');
        } catch (\Throwable $e) {
            \DB::rollBack();
            return redirect()->route('payment.show');
        }
    }
}
