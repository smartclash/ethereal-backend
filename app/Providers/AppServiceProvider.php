<?php

namespace App\Providers;

use App\Enums\Role;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;
use Razorpay\Api\Api;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Api::class, function () {
            return new Api(
                config('services.razorpay.key'),
                config('services.razorpay.secret')
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        LogViewer::auth(function (Request $request) {
            return $request->user()
                && $request->user()->role == Role::ADMIN;
        });
    }
}
