<?php

use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;

require_once 'admin.php';

Route::get('/', function () {
    return view('pages.main');
})->name('main');

Route::middleware('guest')->group(function (){

    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('register', [UserController::class, 'store'])->name('register.store');

    Route::get('login', [loginController::class, 'index'])->name('login');
    Route::post('login', [loginController::class, 'auth'])->name('login.auth');

});

Route::middleware('auth')->group(function (){

    Route::post('logout', [loginController::class, 'exit'])->name('logout.exit');

});




