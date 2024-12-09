<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/',[ PostController::class,'index'])->name('home');
Route::get('/poems',[ PostController::class,'index'])->name('home');
Route::get('/top-poems',[ PostController::class,'index'])->name('home');
Route::get('/poems/{poem}', [PostController::class, 'show'])->middleware(['auth']);


require __DIR__.'/auth.php';
