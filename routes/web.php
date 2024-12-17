<?php

use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


require_once 'admin.php';

Route::get('/', [MainController::class, 'index'])->name('main');

Route::middleware('guest')->group(function (){

    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('register', [UserController::class, 'store'])->name('register.store');

    Route::get('login', [loginController::class, 'index'])->name('login');
    Route::post('login', [loginController::class, 'auth'])->name('login.auth');

});

Route::middleware('auth')->group(function (){

    Route::post('logout', [loginController::class, 'exit'])->name('logout.exit');
    Route::get('account', [\App\Http\Controllers\UserController::class, 'showAccount'])->name('account.showAccount');

    Route::post('comment/{id}', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

});

Route::get('posts/{id}', [MainController::class, 'show'])->name('posts.show');
Route::get('posts/categories/{category}', [MainController::class, 'showCategoryPosts'])->name('posts.show.category');






