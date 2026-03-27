<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CricJobController;

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/search', [SearchController::class, 'index']);

Route::get('/jobs', [CricJobController::class, 'index']);
Route::get('/jobs/{slug}', [CricJobController::class, 'show']);

Route::get('/{slug?}', [PageController::class, 'show']);

