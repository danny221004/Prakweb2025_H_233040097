@props(['categories'])

<div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <div class="mb-5 border-b border-gray-200 pb-4">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Create New Post</h2>
        <p class="text-sm text-gray-500">Fill in the details below to publish a new article.</p>
    </div>

    <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid gap-6 mb-6 md:grid-cols-2">

            {{-- Title (Full Width) --}}
            <div class="col-span-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Title</label>
                <input type="text" name="title" id="title" 
                    value="{{ old('title') }}"
                    class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 
                    @error('title') border-red-500 bg-red-50 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror" 
                    placeholder="E.g. The Future of AI in 2025" required>
                
                @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>
                @enderror
            </div>

            {{-- Category (Full Width) --}}
            <div class="col-span-2">
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select name="category_id" id="category_id" 
                    class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 
                    @error('category_id') border-red-500 bg-red-50 text-red-900 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Excerpt (Full Width) --}}
            <div class="col-span-2">
                <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Excerpt (Summary)</label>
                <textarea name="excerpt" id="excerpt" rows="3" 
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border 
                    @error('excerpt') border-red-500 bg-red-50 text-red-900 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror" 
                    placeholder="Write a short summary of the post...">{{ old('excerpt') }}</textarea>
                
                @error('excerpt')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Content / Body (Full Width) --}}
            <div class="col-span-2">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Main Content</label>
                <textarea name="body" id="body" rows="8" 
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border 
                    @error('body') border-red-500 bg-red-50 text-red-900 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror" 
                    placeholder="Write the full article content here...">{{ old('body') }}</textarea>
                
                @error('body')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image Upload (Modern Dropzone Style) --}}
            <div class="col-span-2">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Cover Image</label>
                <div class="flex items-center justify-center w-full">
                    <label for="image" class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:hover:bg-gray-800 dark:bg-gray-700 hover:border-blue-500 transition-colors duration-200 @error('image') border-red-500 bg-red-50 @else border-gray-300 dark:border-gray-600 @enderror">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or JPEG (MAX. 2MB)</p>
                        </div>
                        <input id="image" name="image" type="file" class="hidden" accept="image/png, image/jpeg, image/jpg" />
                    </label>
                </div>

                @error('image')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

        </div>

        {{-- Footer Actions --}}
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
            <a href="{{ route('dashboard.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 transition-colors">
                Cancel
            </a>
            
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center gap-2 transition-colors">
                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                  </svg>
                Create Post
            </button>
        </div>
    </form>
</div>