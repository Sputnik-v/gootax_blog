@extends('admin.layouts.main-admin-layouts')
@section('breadcrumb', 'user')
@section('content')

    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Registration Form</h1>
        <form method="POST" enctype="multipart/form-data" class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
            @csrf

            @if ($errors->any())
                <div class="bg-red-200 rounded text-center py-2 ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-gray-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('message'))
                <div class="bg-green-200 rounded text-center py-2">
                    {{ session('message') }}
                </div>
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                       type="text" id="name" name="name" placeholder="John Doe">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                       type="email" id="email" name="email" placeholder="john@example.com">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                       type="password" id="password" name="password" placeholder="********">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">Confirm Password</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                       type="password" id="confirm-password" name="password_confirmation" placeholder="********">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">Photo user</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                       type="file" id="" name="image">
            </div>


            <button
                class="w-full border text-gray-700 text-sm font-bold py-2 px-4 rounded-md hover:bg-blue-400 transition duration-300"
                type="submit">Register</button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>

@endsection
