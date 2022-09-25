<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PaidMiddleware
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
        if (auth()->user()->razorpay->paid) {
            return $next($request);
        }

        if (auth()->user()->details()->doesntExist()) {
            return redirect()->route('details.form');
        }

        return redirect()->route('payment.show');
    }
}
