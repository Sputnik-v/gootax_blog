<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">
    <title>@yield('title', 'BLOG')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body>

    @if (session()->has('message'))
        <div class="bg-green-200 rounded text-center py-2">
            {{ session('message') }}
        </div>
    @endif

    <div>
        @include('components.header')
    </div>

    <div class="container py-2 px-2 flex justify-center">
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
            <div class="rounded-lg lg:col-span-2">
                @yield('content')
            </div>

                @if(!\Illuminate\Support\Facades\Route::is('register')
                        && !\Illuminate\Support\Facades\Route::is('login')
                        && !\Illuminate\Support\Facades\Route::is('account.showAccount')
                        && !\Illuminate\Support\Facades\Route::is('show.about')
                        && !\Illuminate\Support\Facades\Route::is('account.update')
                        )
                    <div class="rounded-lg bg-[#eaf5f2]">
                        @include('components.sidebar')
                    </div>
                @endif


        </div>
    </div>


    <div class="mt-5">
        @include('components.footer')
    </div>

</body>

</html>
