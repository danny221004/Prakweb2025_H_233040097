<x-layout title="{{ $post->title }}">
    <div class="max-w-4xl mx-auto py-8">
        <!-- Back Button -->
        <a href="/posts" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 mb-6 font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Posts
        </a>

        <!-- Article Header -->
        <article class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Featured Image -->
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-96 object-cover">
            @else
                <div class="w-full h-96 bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                    <span class="text-gray-600 text-lg">No Image</span>
                </div>
            @endif

            <!-- Article Content -->
            <div class="p-8">
                <!-- Title -->
                <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>

                <!-- Meta Information -->
                <div class="flex flex-wrap items-center gap-4 mb-8 text-sm text-gray-600 border-b pb-4">
                    <!-- Author -->
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ $post->author ?? 'Unknown Author' }}</span>
                    </span>

                    <!-- Category -->
                    @if($post->category)
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5 3a2 2 0 012-2h6a2 2 0 012 2v4a1 1 0 001 1h4a1 1 0 011 1v5a1 1 0 11-2 0v-5h-4a2 2 0 00-2 2v4a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm0 0V5a2 2 0 012-2h6a2 2 0 012 2v2h4a1 1 0 110 2h-4v4a1 1 0 11-2 0V7a1 1 0 00-1-1H5a1 1 0 00-1 1"></path>
                            </svg>
                            <a href="/categories/{{ $post->category->slug ?? '' }}" class="text-blue-600 hover:underline">
                                {{ $post->category->name ?? 'Uncategorized' }}
                            </a>
                        </span>
                    @endif

                    <!-- Published Date -->
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2h16V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h12a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                        </svg>
                        <time datetime="{{ $post->created_at->toIso8601String() }}">
                            {{ $post->created_at->format('d M Y') }}
                        </time>
                    </span>

                    <!-- Reading Time (optional) -->
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5.951-1.488 5.738 1.488a1 1 0 001.187-1.41l-7-14z"></path>
                        </svg>
                        <span>{{ ceil(str_word_count($post->content) / 200) }} min read</span>
                    </span>
                </div>

                <!-- Body Content -->
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <!-- Footer Info -->
                <div class="mt-10 pt-6 border-t border-gray-200">
                    <div class="text-sm text-gray-600">
                        <p class="mb-2">Last updated: <time datetime="{{ $post->updated_at->toIso8601String() }}">{{ $post->updated_at->format('d M Y H:i') }}</time></p>
                    </div>
                </div>
            </div>
        </article>

        <!-- Related Posts Section (Optional) -->
        @if(isset($relatedPosts) && $relatedPosts->count() > 0)
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Related Posts</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedPosts as $relatedPost)
                        <a href="/posts/{{ $relatedPost->slug }}" class="group block bg-white rounded-lg shadow hover:shadow-lg transition">
                            @if($relatedPost->image)
                                <img src="{{ asset('storage/' . $relatedPost->image) }}" 
                                     alt="{{ $relatedPost->title }}" 
                                     class="w-full h-48 object-cover rounded-t-lg group-hover:opacity-90 transition">
                            @else
                                <div class="w-full h-48 bg-gray-300 rounded-t-lg flex items-center justify-center">
                                    <span class="text-gray-600">No Image</span>
                                </div>
                            @endif
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-900 group-hover:text-blue-600 line-clamp-2">{{ $relatedPost->title }}</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $relatedPost->created_at->format('d M Y') }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-layout>