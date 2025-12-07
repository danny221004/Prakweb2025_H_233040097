<x-layout>
    <x-slot:title>Blog Posts</x-slot:title>

    <div class="py-8 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h1 class="mb-8 text-3xl font-bold text-gray-900">Daftar Posts</h1>

        @forelse ($posts as $post)
            <article class="py-8 max-w-screen-md border-b border-gray-200 hover:bg-gray-50 px-4 py-6 rounded transition">
                <a href="{{ route('posts.show', $post->slug) }}">
                    <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900 hover:text-blue-600 hover:underline">{{ $post->title }}</h2>
                </a>
                <div class="text-base text-gray-500 mb-4 flex flex-wrap gap-4">
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        By <a href="#" class="hover:underline font-medium">{{ $post->author->name ?? 'User' }}</a>
                    </span>
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 012-2h6a2 2 0 012 2v4a1 1 0 001 1h4a1 1 0 011 1v5a1 1 0 11-2 0v-5h-4a2 2 0 00-2 2v4a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"></path></svg>
                        in <a href="#" class="hover:underline font-medium">{{ $post->category->name ?? 'Uncategorized' }}</a>
                    </span>
                    <span class="text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <p class="font-light text-gray-600 text-justify leading-relaxed mb-4">
                    {{ $post->excerpt ?? Str::limit($post->content, 150) }}
                </p>
                <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800 hover:underline mt-4 transition">
                    Read more
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </article>
        @empty
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">No posts available yet.</p>
            </div>
        @endforelse
    </div>
</x-layout>