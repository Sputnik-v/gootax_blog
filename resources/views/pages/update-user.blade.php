@extends('layouts.mainLayout')
@section('title')
    Update Page - {{$user['name']}}
@endsection
@section('content')

    <div class="lg:min-w-[1200px] md:min-w-[700px] min-w-[400px] h-[800px] bg-white">
    <form action="{{route('account.update.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="heading text-center font-bold text-2xl pt-2 m-5 text-blue-500 bg-white">You Account Update</div>

        @if ($errors->any())
            <div class="bg-red-200 rounded text-center py-2 mx-auto max-w-2xl">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-gray-500">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="relative editor mx-auto w-10/12 h-[450px] flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Name</label>
                <input name="name" value="{{$user['name']}}" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Email</label>
                <input name="email" value="{{$user['email']}}" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <img class="absolute right-2 bottom-2 w-20 h-20 rounded-full" src="{{ asset('storage/' . $user['image']) }}" alt="image">

            <div class="mb-5">
                <label class="block text-gray-500 text-sm font-medium mb-2" for="confirm-password">Photo user</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                       type="file" id="" name="image">
            </div>
            <!-- Buttons -->
            <button type="submit" class="buttons flex justify-end mt-5">
                <div class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Update</div>
            </button>


        </div>


    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
@endsection
