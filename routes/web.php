<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserDetailsController;
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

Route::get('/', [AuthController::class, 'choose'])->name('auth.choose');
Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('register', [AuthController::class, 'register'])->name('auth.register');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::post('register', [AuthController::class, 'processRegister']);
Route::post('login', [AuthController::class, 'processLogin']);

Route::get('detail', [UserDetailsController::class, 'showForm'])->name('details.form');
Route::post('detail', [UserDetailsController::class, 'process']);

Route::get('payment', [PaymentController::class, 'show'])->name('payment.show');
Route::post('payment/callback', [PaymentController::class, 'callback'])
    ->name('payment.callback');

Route::get('dashboard', [DashboardController::class, 'show'])->name('dashboard.show');
