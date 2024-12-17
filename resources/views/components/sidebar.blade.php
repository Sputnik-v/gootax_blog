<div class="flex flex-col justify-center">
    <h2 class="text-center font-bold text-blue-500">Most Viewed Posts</h2>

    @foreach($mostViewedPosts as $post)

        <article class="mt-2 overflow-hidden rounded-lg border border-gray-100 bg-white shadow-sm">
            <img
                alt=""
                src="{{ asset('storage/' . $post['image'])  }}"
                class="h-56 w-full object-cover"
            />

            <div class="p-4 sm:p-6">
                <a href="{{route('posts.show', ['id' => $post['id']])}}">
                    <h3 class="text-lg font-medium text-gray-900 hover:text-gray-700">
                        {{$post['title']}}
                    </h3>
                </a>

                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                    {{$post['description']}}
                </p>

                <a href="{{route('posts.show', ['id' => $post['id']])}}" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
                    Find out more

                    <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">&rarr;</span>
                </a>
            </div>
        </article>

    @endforeach



    @include('components.category-bar')
</div>
