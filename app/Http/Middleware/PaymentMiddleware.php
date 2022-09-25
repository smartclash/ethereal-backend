<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PaymentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->details()->doesntExist()) {
            return redirect()->route('details.form');
        }

        if (auth()->user()->razorpay->paid) {
            return redirect()->route('dashboard.show');
        }

        return $next($request);
    }
}
