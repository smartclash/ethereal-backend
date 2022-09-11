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

Route::post('register', [\App\Http\Controllers\AuthController::class, 'processRegister']);

Route::get('detail', [\App\Http\Controllers\UserDetailsController::class, 'showForm'])->name('details.form');
Route::post('detail', [\App\Http\Controllers\UserDetailsController::class, 'process']);
