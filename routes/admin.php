<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.pages.main');
    })->name('admin.index');
});
