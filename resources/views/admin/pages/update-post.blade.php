@extends('admin.layouts.main-admin-layouts')

@section('content')
    <form action="{{route('update-post.update', [request('id')])}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="heading text-center font-bold text-2xl m-5 text-gray-800 bg-white">Update Post</div>

        @if ($errors->any())
            <div class="bg-red-200 rounded text-center py-2 mx-auto max-w-2xl">
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

        <div class="relative editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">title</label>
                <input name="title" value="{{$post->title}}" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="desc" class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Description</label>
                <textarea name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full" id="desc" cols="30" rows="10">{{$post->description}}</textarea>
{{--                <textarea name="email" value="" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">--}}
            </div>

            <img class="absolute right-2 bottom-2 w-20 h-20" src="{{ asset('storage/' . $post->image) }}" alt="image">

            <div class="mb-5">
                <label class="block text-gray-500 text-sm font-medium mb-2" for="confirm-password">Photo post</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                       type="file" id="" name="image">
            </div>
            <!-- Buttons -->
            <button type="submit" class="buttons flex justify-end mt-5">
                <div class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Update</div>
            </button>


        </div>


    </form>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>

@endsection
