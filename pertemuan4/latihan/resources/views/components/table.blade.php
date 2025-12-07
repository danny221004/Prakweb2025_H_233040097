{{-- Wrapper Utama --}}
<div class="bg-neutral-primary-soft shadow-xs rounded-base border border-default">

    {{-- Header with Search and Add Post Button --}}
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center gap-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-t-base">
        
        {{-- Search Form --}}
        <form method="GET" action="{{ route('dashboard.index') }}" class="flex-1 max-w-md">
            <label for="search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input 
                    type="search" 
                    name="search" 
                    id="search" 
                    value="{{ request('search') }}"
                    class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" 
                    placeholder="Search posts..." 
                />
                <button type="submit" class="absolute end-1.5 bottom-1.5 text-white bg-blue-600 hover:bg-blue-700 box-border border border-transparent focus:ring-4 focus:ring-blue-500 shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none">
                    Search
                </button>
            </div>
        </form>

        {{-- Add Post Button --}}
        <a href="{{ route('dashboard.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 whitespace-nowrap">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Add Post
        </a>

    </div>

    {{-- Main Table Content --}}
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">No</th>
                    {{-- 1. Tambahkan Header Image --}}
                    <th scope="col" class="px-6 py-3 font-medium">Image</th> 
                    <th scope="col" class="px-6 py-3 font-medium">Title</th>
                    <th scope="col" class="px-6 py-3 font-medium">Category</th>
                    <th scope="col" class="px-6 py-3 font-medium">Published At</th>
                    <th scope="col" class="px-6 py-3 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr class="bg-neutral-primary border-b border-default hover:bg-neutral-primary-soft transition-colors">
                        <td class="px-6 py-4">
                            {{ $posts->firstItem() + $loop->index }}
                        </td>

                        {{-- 2. Tambahkan Kolom Image Data --}}
                        <td class="px-6 py-4">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" 
                                     alt="{{ $post->title }}" 
                                     class="w-16 h-10 object-cover rounded border border-gray-200">
                            @else
                                <div class="w-16 h-10 bg-gray-100 rounded border border-gray-200 flex items-center justify-center text-xs text-gray-400">
                                    No Img
                                </div>
                            @endif
                        </td>

                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{ $post->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $post->category->name ?? 'Uncategorized' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $post->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('dashboard.show', $post->slug) }}" 
                                   class="inline-flex items-center px-3 py-1 text-xs font-medium text-blue-700 bg-blue-100 rounded-lg hover:bg-blue-200 transition"
                                   title="View">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                
                                <a href="{{ route('dashboard.edit', $post->slug) }}" 
                                   class="inline-flex items-center px-3 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 transition"
                                   title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                
                                <form action="{{ route('dashboard.destroy', $post->slug) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center px-3 py-1 text-xs font-medium text-red-700 bg-red-100 rounded-lg hover:bg-red-200 transition"
                                            title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        {{-- 3. Ubah colspan menjadi 6 karena ada kolom baru --}}
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            No posts yet. <a href="{{ route('dashboard.create') }}" class="text-blue-600 hover:underline">Create one</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    {{-- Pagination --}}
    @if ($posts->hasPages())
        <div class="flex justify-between items-center px-6 py-4 border-t border-default bg-white rounded-b-base">
            {{-- Previous Button --}}
            @if ($posts->onFirstPage())
                <span class="px-3 py-2 text-sm rounded-lg bg-neutral-primary-soft border border-default-medium text-gray-400 cursor-not-allowed">
                    Previous
                </span>
            @else
                <a href="{{ $posts->previousPageUrl() }}" class="px-3 py-2 text-sm rounded-lg bg-white border border-default-medium hover:bg-neutral-secondary-medium hover:text-heading transition">
                    Previous
                </a>
            @endif

            {{-- Page Numbers --}}
            <ul class="flex items-center gap-2">
                @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                    @if ($page == $posts->currentPage())
                        <li>
                            <span aria-current="page" class="px-3 py-2 text-sm rounded-lg bg-brand text-white shadow-sm">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="px-3 py-2 text-sm rounded-lg bg-white border border-default-medium hover:bg-neutral-secondary-medium hover:text-heading transition">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>

            {{-- Next Button --}}
            @if ($posts->hasMorePages())
                <a href="{{ $posts->nextPageUrl() }}" class="px-3 py-2 text-sm rounded-lg bg-white border border-default-medium hover:bg-neutral-secondary-medium hover:text-heading transition">
                    Next
                </a>
            @else
                <span class="px-3 py-2 text-sm rounded-lg bg-neutral-primary-soft border border-default-medium text-gray-400 cursor-not-allowed">
                    Next
                </span>
            @endif
        </div>
    @endif

</div>