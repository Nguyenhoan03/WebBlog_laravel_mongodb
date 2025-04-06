<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


Route::get('/dang-nhap', [AuthController::class, 'login']);
Route::post('/dang-nhap', [AuthController::class, 'post_login']);
Route::get('/', [HomeController::class, 'home']);
Route::get('/dang-ky', [AuthController::class, 'register']);
Route::post('/dang-ky', [AuthController::class, 'post_register']);
Route::post('/dang-xuat', [AuthController::class, 'logout'])->name('logout');

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('/the-loai/{category}', function () {
    return view('category');
});
