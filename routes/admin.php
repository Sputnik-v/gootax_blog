<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.pages.main');
    })->name('admin.main')->middleware(IsAdmin::class);

    Route::get('add-post', [PostController::class, 'index'])->name('add-post.index')->middleware(IsAdmin::class);
    Route::post('add-post', [PostController::class, 'store'])->name('add-post.store')->middleware(IsAdmin::class);
    Route::get('all-posts', [PostController::class, 'all'])->name('all-posts.all')->middleware(IsAdmin::class);
    Route::get('update-post/{id}', [PostController::class, 'update'])->name('update-post.update')->middleware(IsAdmin::class);
    Route::post('update-post/{id}', [PostController::class, 'updatePost'])->name('update-post.update')->middleware(IsAdmin::class);

    Route::get('add-user', [UserController::class, 'index'])->name('add-user.index')->middleware(IsAdmin::class);
    Route::post('add-user', [UserController::class, 'store'])->name('add-user.store')->middleware(IsAdmin::class);
    Route::get('all-users', [UserController::class, 'all'])->name('all-users.all')->middleware(IsAdmin::class);
    Route::get('update-user/{id}', [UserController::class, 'update'])->name('update-user.update')->middleware(IsAdmin::class);
    Route::post('update-user/{id}', [UserController::class, 'updateUser'])->name('update-user.update')->middleware(IsAdmin::class);

    Route::get('all-comments', [CommentController::class, 'all'])->name('all-comments.all')->middleware(IsAdmin::class);
    Route::post('comments-delete/{id}', [CommentController::class, 'delete'])->name('comments-delete.delete')->middleware(IsAdmin::class);
});
