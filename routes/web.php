<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/top-posts', 'index')->name('top-posts');
    Route::get('/posts/create', 'create')->middleware(['auth'])->name('posts.create');
    Route::post('/posts/store', 'store')->middleware(['auth'])->name('posts.create');
    Route::get('/posts/{post}', 'show')->middleware(['auth']);
});



require __DIR__.'/auth.php';
