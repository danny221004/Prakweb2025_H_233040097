<x-dashboard-layout>
    <x-slot:title>Edit Category - Dashboard</x-slot:title>

    <div class="max-w-2xl mx-auto py-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('categories.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-4">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Categories
            </a>
            <h1 class="text-3xl font-bold text-gray-900">Edit Category</h1>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
            <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-bold text-gray-900">Category Name <span class="text-red-600">*</span></label>
                    <input type="text" id="name" name="name" required autofocus
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                        placeholder="Enter category name" value="{{ old('name', $category->name) }}">
                    @error('name') 
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
                    @enderror
                    <p class="text-gray-500 text-xs mt-1">The category name will be displayed publicly.</p>
                </div>

                <!-- Slug Field -->
                <div>
                    <label for="slug" class="block text-sm font-bold text-gray-900">Slug <span class="text-red-600">*</span></label>
                    <input type="text" id="slug" name="slug" required
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('slug') border-red-500 @enderror"
                        placeholder="category-slug" value="{{ old('slug', $category->slug) }}">
                    @error('slug') 
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
                    @enderror
                    <p class="text-gray-500 text-xs mt-1">URL-friendly version of the category name.</p>
                </div>

                <!-- Info Box -->
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700">
                                This category has <strong>{{ $category->posts->count() }} post(s)</strong>. Changing the slug may affect existing URLs.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex gap-4 pt-4 border-t">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                        Update Category
                    </button>
                    <a href="{{ route('categories.index') }}" class="px-6 py-2 bg-gray-300 text-gray-800 font-medium rounded-lg hover:bg-gray-400 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Auto-generate slug from name (only if slug is empty or matches pattern)
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        const originalSlug = slugInput.value;
        
        nameInput.addEventListener('input', function() {
            // Only auto-generate if user hasn't manually changed the slug
            if (!slugInput.dataset.manuallyEdited) {
                const slug = this.value
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '');
                slugInput.value = slug;
            }
        });
        
        slugInput.addEventListener('input', function() {
            if (this.value !== originalSlug) {
                this.dataset.manuallyEdited = 'true';
            }
        });
    </script>
</x-dashboard-layout>