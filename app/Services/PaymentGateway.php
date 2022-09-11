<?php

namespace App\Services;

use Razorpay\Api\Api;

class PaymentGateway
{
    public static function createCustomer($name, $email, $phone)
    {
        return app(Api::class)->customer->create([
            'name' => $name,
            'email' => $email,
            'contact' => '+91' . $phone,
        ]);
    }

    public static function createOrder()
    {
        return app(Api::class)->order->create([
            'receipt' => \Str::uuid(),
            'amount' => 25000,
            'currency' => 'INR',
        ]);
    }
}
