<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\PostController;
use App\Models\Category;

Route::group(['middleware' => 'verifyAccountLogin'], function () {
    Route::post('/comment/{category}/{slug}', [DetailController::class, 'Post_comment']);
    Route::match(['post', 'delete'], '/update_like/{slug}', [DetailController::class, 'update_like']);
    Route::get('/{status}/post', [PostController::class, 'create']);
    Route::post('/{status}/post', [PostController::class, 'store']);
});

Route::post('/tinymce/upload', [PostController::class, 'tinymceUpload'])->name('tinymce.upload');

Route::get('/dang-nhap', [AuthController::class, 'login'])->name('login');
Route::post('/dang-nhap', [AuthController::class, 'post_login']);
Route::get('/', [HomeController::class, 'home'])->name('home');;
Route::get('/dang-ky', [AuthController::class, 'register']);
Route::post('/dang-ky', [AuthController::class, 'post_register']);
Route::post('/dang-xuat', [AuthController::class, 'logout'])->name('logout');

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('/the-loai/{category}', [CategoryController::class, 'index']);
Route::get('/{category}/{slug}', [DetailController::class, 'index']);
Route::get('/gioi-thieu', function () {
    return view('introBlog');
});


// Route::post('/ckediter/upload-image', [App\Http\Controllers\PostController::class, 'upload'])->name('ckeditor.upload');
