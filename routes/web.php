<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\AuthController::class, 'choose'])->name('auth.choose');
Route::get('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
Route::get('register', [\App\Http\Controllers\AuthController::class, 'register'])->name('auth.register');
Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');

Route::post('register', [\App\Http\Controllers\AuthController::class, 'processRegister']);

Route::get('detail', [\App\Http\Controllers\UserDetailsController::class, 'showForm'])->name('details.form');
Route::post('detail', [\App\Http\Controllers\UserDetailsController::class, 'process']);

Route::get('payment', [\App\Http\Controllers\PaymentController::class, 'show'])->name('payment.show');
Route::post('payment/callback', [\App\Http\Controllers\PaymentController::class, 'callback'])
    ->name('payment.callback');

Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'show'])->name('dashboard.show');
