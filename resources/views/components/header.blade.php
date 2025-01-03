
@php use Illuminate\Support\Facades\Auth; @endphp

<header class="bg-blue-300">
    <div class="container">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6">
        <div class="flex h-16 items-center justify-between">
            <div class="flex-1 md:flex md:items-center md:gap-12">
                <a class="block text-teal-600 w-[100px] drop-shadow-lg" href="/">
                    <span class="sr-only">Home</span>
                    <img class="rounded" src="{{asset('images/logo.jpg')}}" alt="logo">
                </a>
            </div>

            <div class="md:flex md:items-center md:gap-12">
                <nav aria-label="Global" class="hidden md:block">
                    <ul class="flex items-center gap-6 text-sm">

                        <li>
                            <a class="border-b-2 border-transparent hover:border-b-2 hover:border-b-gray-500/75 text-gray-500 transition hover:text-gray-500/75" href="/"> Home </a>
                        </li>

                        <li>
                            <a class="border-b-2 border-transparent hover:border-b-2 hover:border-b-gray-500/75 text-gray-500 transition hover:text-gray-500/75" href="{{route('show.about')}}"> About </a>
                        </li>
                    </ul>
                </nav>

                @guest()
                    <div class="flex justify-center gap-2 text-sm text-blue-600">

                            <a class="hover:text-blue-500" href="{{route('register')}}">Register</a>
                            <a class="hover:text-blue-500" href="{{route('login')}}">Login</a>

                    </div>
                @endguest

                @auth()
                    <div class="hidden md:relative md:block">

                <button
                    type="button"
                    class="btn-header-menu overflow-hidden rounded-full border border-gray-300 shadow-inner"
                >
                    <span class="sr-only">Toggle dashboard menu</span>

                    <img
                        src="{{ asset('storage/' . $user->image) }}"
                        alt=""
                        class="size-10 object-cover"
                    />
                </button>

                <div
                    class="hidden-block-menu hidden absolute end-0 z-10 mt-0.5 w-56 divide-y divide-gray-100 rounded-md border border-gray-100 bg-white shadow-lg"
                    role="menu"
                >
                    <div class="p-2">
                        <a
                            href="{{route('account.showAccount')}}"
                            class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                            role="menuitem"
                        >
                            My profile
                        </a>


                        @if(Auth::user()->name == 'admin')

                            <a
                                href="{{route('admin.main')}}"
                                class="block rounded-lg px-4 py-2 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-700"
                                role="menuitem"
                            >
                                Admin Panel
                            </a>

                        @endif

                    </div>

                    <div class="p-2">
                        <form action="{{route('logout.exit')}}" method="POST">

                            @csrf

                            <button
                                type="submit"
                                class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-50"
                                role="menuitem"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-4"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"
                                    />
                                </svg>

                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
                @endauth

                <div class="block md:hidden">
                    <button class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>

