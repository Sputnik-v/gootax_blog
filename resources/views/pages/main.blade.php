@php use Carbon\Carbon; @endphp
@extends('layouts.mainLayout')

@section('content')
    <div class="">

        @isset($category)
            <h2 class="text-2xl font-bold text-blue-500 my-2 pb-2">#{{$category}}</h2>
        @endisset

        @foreach($posts as $post)

            <div class="mt-2 overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                <img class="object-cover w-full h-64" src="{{ asset('storage/' . $post->image) }}" alt="Article">

                <div class="p-6">
                    <div>
                        <a href="{{route('posts.show', ['id' => $post->id])}}"
                           class="block mt-2 text-xl font-semibold text-gray-800 transition-colors duration-300 transform dark:text-white hover:text-gray-600 hover:underline"
                           tabindex="0" role="link">{{$post->title}}</a>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{substr($post->description, 0, 200) . '...'}}</p>
                    </div>

                    <div class="mt-4">
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <img class="object-cover h-10 rounded-full" src="{{ asset('storage/' . $post->user->image) }}"
                                     alt="Avatar">
                                <a href="#" class="mx-2 font-semibold text-gray-700 dark:text-gray-200" tabindex="0"
                                   role="link">{{$post->user->name}}</a>
                            </div>
                            <span
                                class="mx-1 text-xs text-gray-600 dark:text-gray-300">{{Carbon::parse($post->created_at)->format('d.m.Y H:i')}}</span>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

        <div class="px-4 mt-4">
            {{$posts->links()}}
        </div>

    </div>

@endsection
