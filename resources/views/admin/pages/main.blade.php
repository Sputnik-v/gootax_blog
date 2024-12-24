@extends('admin.layouts.main-admin-layouts')

@section('content')
    <div class="text-center text-7xl h-[450px] flex-col flex justify-center items-center gap-4">
        <span class="">Welcome to the admin panel</span>

        <div class="flex justify-center items-center gap-6">
            <a class="text-xl bg-blue-400 px-4 py-2 rounded text-gray-100 hover:text-gray-200 hover:bg-blue-500" href="{{route('add-post.index')}}">
                Add Post
            </a>
            <a class="text-xl bg-green-500 px-4 py-2 rounded text-gray-100 hover:text-gray-200 hover:bg-green-600" href="{{route('add-user.index')}}">
                Add User
            </a>
        </div>

    </div>

@endsection
