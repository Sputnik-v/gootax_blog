@extends('layouts.mainLayout')
@section('title')
    Account Page - {{$user->name}}
@endsection
@section('content')

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#dialog" ).dialog({
                autoOpen: false,
                modal: true,
                show: {
                    effect: "blind",
                    duration: 100
                },
                hide: {
                    effect: "blind",
                    duration: 100
                }
            });

            $( "#opener" ).on( "click", function() {
                $( "#dialog" ).dialog( "open" );
            });
        } );
    </script>

    <div class="lg:min-w-[1200px] md:min-w-[700px] min-w-[400px] h-[800px] mt-5 pt-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

        <div class="flex flex-col items-center pb-10">
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('storage/' . $user->image) }}" alt="image"/>
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$user->name}}</h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">{{$user->email}}</span>
            <div class="flex mt-4 md:mt-6">
                <a href="{{route('account.update')}}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update account</a>
                <a href="#" id="opener" class="py-2 px-4 ms-2 text-sm font-medium text-gray-200 focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-red-600 hover:text-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Delete</a>
            </div>
        </div>
        <div class="" id="dialog" title="Attention, {{$user->name}}">
            <p class="">Your account will be completely lost, and you will not be able to restore the data. Do you still want to delete your account?</p>
            <form method="POST" action="{{route('account.delete')}}">
                @csrf
                <button class="text-gray-100 bg-red-500 px-2 py-1 rounded hover:bg-red-600">Yes, Delete</button>
            </form>
        </div>
    </div>






@endsection
