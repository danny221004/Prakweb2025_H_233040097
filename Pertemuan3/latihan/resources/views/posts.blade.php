<x-layout>
    <x-slot:title>Blog Posts</x-slot:title>

    <div class="py-8 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h1 class="mb-8 text-3xl font-bold text-gray-900">Daftar Posts</h1>

        @foreach ($posts as $post)
            <article class="py-8 max-w-screen-md border-b border-gray-200">
                <a href="/posts/{{ $post->slug }}">
                    <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900 hover:underline">{{ $post->title }}</h2>
                </a>
                <div class="text-base text-gray-500 mb-4">
                    By <a href="#" class="hover:underline text-base text-gray-500">{{ $post->author->name ?? 'User' }}</a> in <a href="#" class="hover:underline text-base text-gray-500">{{ $post->category->name ?? 'Category' }}</a> | {{ $post->created_at->diffForHumans() }}
                </div>
                <p class="font-light text-gray-500 text-justify">
                    {{ $post->excerpt }}
                </p>
                <a href="/posts/{{ $post->slug }}" class="inline-flex items-center font-medium text-blue-600 hover:underline mt-4">
                    Read more &raquo;
                </a>
            </article>
        @endforeach
    </div>
</x-layout>