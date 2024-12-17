<div class="p-2 bg-white mt-2 rounded-md">
    <div class="flex items-center justify-between">
        <h2 class="text-base font-semibold text-gray-800 dark:text-white">Categories</h2>

    </div>

    <nav class="mt-4 -mx-3 space-y-3 ">

        @foreach($categories as $category)

            <a href="{{route('posts.show.category', ['category' => $category->category, 'id' => $category->id])}}" class="cursor-pointer flex items-center justify-between w-full px-3 py-2 text-xs font-medium text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700">
                <div class="flex items-center gap-x-2 ">
                    <span class="w-2 h-2 bg-green-300 rounded-full"></span>
                    <span>{{$category->category}}</span>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 rtl:rotate-180">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </a>

        @endforeach

    </nav>

</div>

