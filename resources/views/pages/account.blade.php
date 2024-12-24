@extends('layouts.mainLayout')

@section('content')


<div class="flex justify-center items-center h-[800px]">
    <div class="w-[500px] mt-5 pt-5 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

        <div class="flex flex-col items-center pb-10">
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('storage/' . $user->image) }}" alt="image"/>
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$user->name}}</h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">{{$user->email}}</span>
            <div class="flex mt-4 md:mt-6">
                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update account</a>
                <a href="#" class="py-2 px-4 ms-2 text-sm font-medium text-gray-200 focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-red-600 hover:text-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Delete</a>
            </div>
        </div>
    </div>
</div>



@endsection
