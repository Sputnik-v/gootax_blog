<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.pages.user');
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

        session()->flash('message', 'User ' . $user['name'] . ' add');

        return redirect()->route('add-user.index' );
    }

    public function all()
    {
        $users = User::all()->toArray();

        return view('admin.pages.all-users', compact('users'));
    }
}
