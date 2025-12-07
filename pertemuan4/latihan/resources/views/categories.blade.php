<x-layout>
    <x-slot:title>Categories</x-slot:title>

    <div class="py-8 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h1 class="mb-8 text-3xl font-bold text-gray-900">Daftar Kategori</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($categories as $category)
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 transition">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $category->name }}</h5>
                    <p class="font-normal text-gray-700">Klik untuk melihat artikel di kategori ini.</p>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>