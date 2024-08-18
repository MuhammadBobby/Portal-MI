<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VerificationController;



Route::get('/', [PageController::class, 'index'])->name('home');
// news
Route::get('/news', [PageController::class, 'news']);
Route::get('/news/{news:slug}', [PageController::class, 'detail']);
// category
Route::get('/category/{categories:slug}', [PageController::class, 'category']);


// profile
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'editProfile']);
Route::patch('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::get('/profile/changePassword', [ProfileController::class, 'changePassword']);
Route::patch('/profile/updatePassword', [ProfileController::class, 'updatePassword']);

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


// Forgot password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
