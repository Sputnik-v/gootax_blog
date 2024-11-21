<?php

use Illuminate\Support\Facades\Route;

require_once 'admin.php';

Route::get('/', function () {
    return view('pages.main');
});
