<x-dashboard-layout>
    <x-slot:title>Edit Post - Dashboard</x-slot:title>

    <div class="max-w-2xl mx-auto py-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('dashboard.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-4">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Dashboard
            </a>
            <h1 class="text-3xl font-bold text-gray-900">Edit Post</h1>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
            <form action="{{ route('dashboard.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Title Field -->
                <div>
                    <label for="title" class="block text-sm font-bold text-gray-900">Title <span class="text-red-600">*</span></label>
                    <input type="text" id="title" name="title" required autofocus
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror"
                        placeholder="Enter post title" value="{{ old('title', $post->title) }}">
                    @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Category Field -->
                <div>
                    <label for="category_id" class="block text-sm font-bold text-gray-900">Category <span class="text-red-600">*</span></label>
                    <select id="category_id" name="category_id" required
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('category_id') border-red-500 @enderror">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Excerpt Field -->
                <div>
                    <label for="excerpt" class="block text-sm font-bold text-gray-900">Excerpt <span class="text-red-600">*</span></label>
                    <textarea id="excerpt" name="excerpt" rows="3" required
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('excerpt') border-red-500 @enderror"
                        placeholder="Short summary of your post">{{ old('excerpt', $post->excerpt) }}</textarea>
                    @error('excerpt') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Content Field -->
                <div>
                    <label for="body" class="block text-sm font-bold text-gray-900">Content <span class="text-red-600">*</span></label>
                    <textarea id="body" name="body" rows="12" required
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('body') border-red-500 @enderror"
                        placeholder="Write your post content here...">{{ old('body', $post->body) }}</textarea>
                    @error('body') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Current Image Preview -->
                @if($post->image)
                    <div>
                        <label class="block text-sm font-bold text-gray-900 mb-2">Current Image</label>
                        <div class="relative inline-block">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full max-w-md h-48 object-cover rounded-lg border border-gray-300">
                        </div>
                    </div>
                @endif

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-bold text-gray-900">
                        {{ $post->image ? 'Change Featured Image' : 'Featured Image' }}
                        <span class="text-gray-500 text-xs font-normal">(Optional)</span>
                    </label>
                    <input type="file" id="image" name="image" accept="image/*"
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('image') border-red-500 @enderror">
                    @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    <p class="text-gray-500 text-xs mt-1">
                        {{ $post->image ? 'Leave empty to keep current image. Upload new image to replace.' : 'Max size: 2MB. Formats: JPG, PNG, GIF' }}
                    </p>
                </div>

                <!-- Image Preview (for new upload) -->
                <div id="imagePreview" class="hidden">
                    <label class="block text-sm font-bold text-gray-900 mb-2">New Image Preview</label>
                    <img id="previewImg" src="" alt="Preview" class="w-full max-w-md h-48 object-cover rounded-lg border border-gray-300">
                </div>

                <!-- Submit Buttons -->
                <div class="flex gap-4 pt-4 border-t">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                        Update Post
                    </button>
                    <a href="{{ route('dashboard.index') }}" class="px-6 py-2 bg-gray-300 text-gray-800 font-medium rounded-lg hover:bg-gray-400 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Image preview functionality
        const imageInput = document.getElementById('image');
        const previewContainer = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');

        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                
                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('hidden');
            }
        });
    </script>
</x-dashboard-layout>