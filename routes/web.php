<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VerificationController;

// auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


// Verifikasi email
Route::get('/email/verify', [VerificationController::class, 'notice'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [VerificationController::class, 'resend'])->name('verification.resend');


Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/profile', [PageController::class, 'profile']);
// news
Route::get('/news', [PageController::class, 'news']);
Route::get('/news/{news:slug}', [PageController::class, 'detail']);
// category
Route::get('/category/{categories:slug}', [PageController::class, 'category']);


// admin
Route::get('/admin', [PageController::class, 'admin']);
// admin/news (resurceful)
Route::prefix('admin')->group(function () {
    Route::resource('news', NewsController::class);
});
// admin/users (resurceful)
Route::prefix('admin')->group(function () {
    Route::resource('users', UsersController::class);
});
// admin/categories (resurceful)
Route::prefix('admin')->group(function () {
    Route::resource('categories', CategoriesController::class);
});


// search news
Route::post('/search', [SearchController::class, 'search']);
// search
Route::get('/admin/search', [SearchController::class, 'adminSearch']);
Route::get('/admin/users/search', [SearchController::class, 'adminUsersSearch']);



// Forgot password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
