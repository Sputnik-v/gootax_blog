<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.pages.main');
    })->name('admin.main');

    Route::get('add-post', [PostController::class, 'index'])->name('add-post.index');
    Route::post('add-post', [PostController::class, 'store'])->name('add-post.store');


    Route::get('add-user', [UserController::class, 'index'])->name('add-user.index');
    Route::post('add-user', [UserController::class, 'store'])->name('add-user.store');
    Route::get('all-users', [UserController::class, 'all'])->name('all-users.all');
});
