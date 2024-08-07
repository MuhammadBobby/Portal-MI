<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingPageController;

Route::get('/', [LandingPageController::class, 'index']);

// news
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{news:slug}', [NewsController::class, 'detail']);

// search news
Route::post('/search', [NewsController::class, 'search']);

// category
Route::get('/category/{categories:slug}', [CategoryController::class, 'index']);
