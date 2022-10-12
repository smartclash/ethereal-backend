<?php

use App\Http\Controllers\AdminController;
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
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
Route::get('reset-password/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');

Route::get('auth/admin', [AuthController::class, 'adminLogin'])->name('auth.admin');
Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('callback/google', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

Route::post('reset-password', [AuthController::class, 'processResetPassword'])->name('password.update');
Route::post('forgot-password', [AuthController::class, 'processForgotPassword'])->name('password.email');
Route::post('register', [AuthController::class, 'processRegister']);
Route::post('login', [AuthController::class, 'processLogin']);

Route::get('detail', [UserDetailsController::class, 'showForm'])->name('details.form');
Route::post('detail', [UserDetailsController::class, 'process']);

Route::get('payment', [PaymentController::class, 'show'])->name('payment.show');
Route::post('payment/callback', [PaymentController::class, 'callback'])
    ->name('payment.callback');

Route::get('dashboard', [DashboardController::class, 'show'])->name('dashboard.show');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('export', [AdminController::class, 'exportPage'])->name('admin.excel.export');

    Route::post('export', [AdminController::class, 'export']);
});
