<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UsersController;

Route::get('/', [PageController::class, 'index']);
// news
Route::get('/news', [PageController::class, 'news']);
Route::get('/news/{news:slug}', [PageController::class, 'detail']);
// search news
Route::post('/search', [PageController::class, 'search']);
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
