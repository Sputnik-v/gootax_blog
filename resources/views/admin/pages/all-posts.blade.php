@php use Illuminate\Support\Facades\Storage; @endphp

@extends('admin.layouts.main-admin-layouts')
@section('breadcrumb', 'posts')
@section('content')

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 my-2">


        @if (session()->has('message'))
            <div class="bg-green-200 rounded text-center py-2">
                {{ session('message') }}
            </div>
        @endif

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Title
            </th>
            <th scope="col" class="px-6 py-3">
                Category
            </th>
            <th scope="col" class="px-6 py-3">
                Status
            </th>
            <th scope="col" class="px-6 py-3">
                Action
            </th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts as $post)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10" src="{{ asset('storage/' . $post->image) }}" alt="image">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{$post->title}}</div>
                        <div class="font-normal text-gray-500">{{$post->description}}</div>
                    </div>
                </th>
                <td class="px-6 py-4">
                    {{$post->category->category}}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full {{rand(0, 1) ? 'bg-green-500' : 'bg-red-500'}} me-2"></div>
                        Online
                    </div>
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('update-post.update', ['id' => $post->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit post</a>
                </td>
            </tr>

        @endforeach

        </tbody>

            <div class="px-4">
                {{$posts->links()}}
            </div>
    </table>

@endsection
