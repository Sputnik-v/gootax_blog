<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('pages.register');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'min:3', 'max:100', 'confirmed'],
            'image' => ['image', 'nullable', 'max:2999'],
        ]);

        $pathAvatar = null;

        if( $request->hasFile('image')){
            $pathAvatar = $request->file('image')->store('avatars');
        } else {
            $pathAvatar = 'https://yt3.ggpht.com/ytc/AKedOLRkaYp4Ty4xfk0IPIyX4R50XQ2xTIcsvbxZ5CDN=s900-c-k-c0x00ffffff-no-rj';
        }
        $passwordHash = Hash::make($validated['password']);

        $user = User::query()->create(array_merge($validated, ['image' => $pathAvatar], ['password' => $passwordHash]));

        session()->flash('message', $user['name'] . ', thanks! You Register!');

        return redirect()->route('main' );
    }
}
