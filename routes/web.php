<?php

use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;

require_once 'admin.php';

Route::get('/', function () {
    return view('pages.main');
})->name('main');

Route::middleware('guest')->group(function (){

    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('register', [UserController::class, 'store'])->name('register.store');

});


