<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $user = null;

        if (Auth::check()){

            $user = Auth::user();

        }

        return view('pages.main', compact('user'));
    }
}
