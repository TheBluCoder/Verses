<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/top-posts', 'index')->name('home');
    Route::get('/posts/create', 'create')->middleware(['auth']);
    Route::get('/posts/{post}', 'show')->middleware(['auth']);
});



require __DIR__.'/auth.php';
