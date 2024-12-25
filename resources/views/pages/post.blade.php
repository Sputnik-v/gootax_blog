@php use Carbon\Carbon; @endphp
@extends('layouts.mainLayout')
@section('title')
    Post Page - {{$post->title}}
@endsection
@section('content')

    @php

    function disabled($id)
    {
        if (session()->get('like') == $id || session()->get('not-like') == $id || !\Illuminate\Support\Facades\Auth::check()){
            return 'disabled';
        }
        return false;
    }

    @endphp

    <h1 class="text-center font-bold text-blue-500 mb-2">View Post</h1>
    <div class="flex flex-col">
        <div class="flex justify-between items-center bg-white px-6">
            <div class="flex items-center pt-5">
                <img class="object-cover h-10 rounded-full" src="{{asset('storage/' . $post->user->image) }}"
                     alt="Avatar">
                <a href="#" class="mx-2 font-semibold text-gray-700 dark:text-gray-200" tabindex="0"
                   role="link">{{$post->user->name}}</a>
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
        <div class="bg-white py-8">
            <div class="container mx-auto px-4 flex flex-col md:flex-row">
                <div class="w-full px-4">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Blog Featured Image" class="mb-8 h-[400px] w-full object-cover">
                    <div class="prose max-w-none">

                        <h3 class="font-bold text-lg mb-5">{{$post->title}}</h3>
                        <p>
                            {{$post->description}}
                        </p>
                    </div>
                    <div class="text-right mx-4 mt-4">
                        <div class="flex justify-end items-center gap-2">
                            <form name="like" id="like-form" method="POST" action="{{route('storeLike', ['id' => $post->id])}}">
                                @csrf
                                <button {{disabled($post->id)}} type="submit" class="flex justify-center px-2 gap-2 text-blue-500 rounded border border-transparent @auth() hover:border hover:border-blue-500 hover:bg-blue-400 hover:text-white @endauth">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                                    </svg>

                                    <span id="like">
                                        {{$post->like}}
                                    </span>
                                </button>
                            </form>

                            <form name="not_like" id="not_like-form" method="POSt" action="{{route('storeNotLike', ['id' => $post->id])}}">
                                @csrf
                                <button {{disabled($post->id)}} type="submit" class="flex justify-center gap-2 px-2 text-gray-500 rounded border border-transparent @auth() hover:border hover:border-gray-800 hover:bg-gray-500 hover:text-white @endauth">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path d="M15.73 5.5h1.035A7.465 7.465 0 0 1 18 9.625a7.465 7.465 0 0 1-1.235 4.125h-.148c-.806 0-1.534.446-2.031 1.08a9.04 9.04 0 0 1-2.861 2.4c-.723.384-1.35.956-1.653 1.715a4.499 4.499 0 0 0-.322 1.672v.633A.75.75 0 0 1 9 22a2.25 2.25 0 0 1-2.25-2.25c0-1.152.26-2.243.723-3.218.266-.558-.107-1.282-.725-1.282H3.622c-1.026 0-1.945-.694-2.054-1.715A12.137 12.137 0 0 1 1.5 12.25c0-2.848.992-5.464 2.649-7.521C4.537 4.247 5.136 4 5.754 4H9.77a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23ZM21.669 14.023c.536-1.362.831-2.845.831-4.398 0-1.22-.182-2.398-.52-3.507-.26-.85-1.084-1.368-1.973-1.368H19.1c-.445 0-.72.498-.523.898.591 1.2.924 2.55.924 3.977a8.958 8.958 0 0 1-1.302 4.666c-.245.403.028.959.5.959h1.053c.832 0 1.612-.453 1.918-1.227Z" />
                                    </svg>

                                    <span id="not-like">
                                        {{$post->not_like}}
                                    </span>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
                <div class="max-w-2xl mx-auto px-4">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion ({{count($comments)}})</h2>
                    </div>

                    @auth()
                        <form action="{{route('comment.store', ['id' => $post->id])}}" method="POST" class="mb-6">

                            @csrf

                            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                <label for="comment" class="sr-only">Your comment</label>
                                <textarea id="comment" rows="6"
                                          name="text"
                                          class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                          placeholder="Write a comment..." required></textarea>
                            </div>
                            <button type="submit"
                                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-gray-100 bg-blue-500 rounded-lg hover:bg-blue-400">
                                Post comment
                            </button>
                        </form>
                    @endauth

                    @foreach($comments as $comm)
                        <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                        <img
                                            class="mr-2 w-6 h-6 rounded-full"
                                            src="{{asset('storage/' . $comm->user->image)}}"
                                            alt="Michael Gough">
                                        {{$comm->user->name}}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                                                                              title="February 8th, 2022">{{Carbon::parse($comm->created_at)->longRelativeDiffForHumans()}}</time></p>
                                </div>
                            </footer>
                            <p class="text-gray-500 dark:text-gray-400">{{$comm->comment}}</p>

                        </article>
                    @endforeach

                </div>
            </section>

        </div>
    </div>

@endsection
