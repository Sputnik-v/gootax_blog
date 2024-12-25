@extends('admin.layouts.main-admin-layouts')
@section('breadcrumb', 'comments')
@section('content')

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



            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-s-lg">
                            Comment
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Post
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-e-lg">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($comments as $comment)

                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$comment->comment}}
                            </th>
                            <td class="px-6 py-4">
                                <a class="hover:bg-gray-200 hover:text-gray-700 px-2 border border-b-gray-500" href="{{route('update-post.update', ['id' => $comment->post->id])}}">
                                    {{$comment->post->id}}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <form method="POST" action="{{route('comments-delete.delete', ['id' => $comment->id])}}">
                                    @csrf
                                    <button class="px-4 py-2 text-red-500" type="submit">delete</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>

@endsection
