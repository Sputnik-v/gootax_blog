@php use Carbon\Carbon; @endphp
@extends('layouts.mainLayout')
@section('title', 'Main Page - all news')
@section('content')

    <div>
        @isset($category)
            <h2 class="text-xl font-bold text-blue-500">#{{$category}}</h2>
        @endisset

        @if(\Illuminate\Support\Facades\Route::is('main'))
            <h1 class="text-center font-bold text-blue-500">All News</h1>
        @endif

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

                    <div class="mt-4 flex justify-between items-center">
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <img class="object-cover h-10 rounded-full" src="{{ asset('storage/' . $post->user->image) }}"
                                     alt="Avatar">
                                <a href="#" class="mx-2 font-semibold text-gray-700 dark:text-gray-200" tabindex="0"
                                   role="link">{{$post->user->name}}</a>
                            </div>
                            <span
                                class="mx-1 text-xs text-gray-600 dark:text-gray-300">{{Carbon::parse($post->created_at)->format('d.m.Y H:i')}}
                            </span>
                        </div>
                        <div class="flex justify-center items-center">
                            <div class="flex flex-row items-center text-gray-500 gap-3 text-sm px-2 pt-4">
                                <span>{{$post->views}}</span>
                                <svg fill="#959595" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 57.945 57.945" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M57.655,27.873c-7.613-7.674-17.758-11.9-28.568-11.9c-0.026,0-0.051,0.002-0.077,0.002c-0.013,0-0.025-0.002-0.037-0.002 c-0.036,0-0.071,0.005-0.106,0.005C18.14,16.035,8.08,20.251,0.52,27.873l-0.23,0.232c-0.389,0.392-0.386,1.025,0.006,1.414 c0.195,0.193,0.45,0.29,0.704,0.29c0.257,0,0.515-0.099,0.71-0.296l0.23-0.232c5.245-5.287,11.758-8.841,18.856-10.402 c-2.939,2.385-4.823,6.022-4.823,10.094c0,7.168,5.832,13,13,13s13-5.832,13-13c0-4.116-1.928-7.784-4.922-10.167 c7.226,1.522,13.858,5.107,19.184,10.476c0.389,0.393,1.023,0.395,1.414,0.006C58.041,28.898,58.044,28.265,57.655,27.873z M39.973,28.972c0,6.065-4.935,11-11,11s-11-4.935-11-11c0-6.029,4.878-10.937,10.893-10.995c0.048,0,0.096-0.003,0.144-0.003 C35.058,17.995,39.973,22.92,39.973,28.972z"></path> <path d="M36,27.972c-0.552,0-1,0.448-1,1c0,3.309-2.691,6-6,6s-6-2.691-6-6s2.691-6,6-6c0.552,0,1-0.448,1-1s-0.448-1-1-1 c-4.411,0-8,3.589-8,8s3.589,8,8,8s8-3.589,8-8C37,28.42,36.552,27.972,36,27.972z"></path> </g> </g></svg>
                            </div>
                            <div class="flex flex-row items-center text-gray-500 gap-3 text-sm px-2 pt-4">
                                <span>{{$post->like}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>

                            </div>
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
