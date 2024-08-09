<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingPageController;

Route::get('/', [LandingPageController::class, 'index']);

// admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/news', [AdminController::class, 'adminNews']);

// news
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{news:slug}', [NewsController::class, 'detail']);

// search news
Route::post('/search', [NewsController::class, 'search']);

// category
Route::get('/category/{categories:slug}', [CategoryController::class, 'index']);
