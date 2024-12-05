<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/',[ PostController::class,'index'])->name('home');
Route::get('/poems/{poem}', [PostController::class, 'show'])->middleware(['auth']);






require __DIR__.'/auth.php';
