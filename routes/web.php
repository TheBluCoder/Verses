<?php

use App\Http\Controllers\PoemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/',[ PoemController::class,'index'])->name('home');
Route::get('/poems/{poem}', [PoemController::class, 'show'])->middleware(['auth']);






require __DIR__.'/auth.php';
