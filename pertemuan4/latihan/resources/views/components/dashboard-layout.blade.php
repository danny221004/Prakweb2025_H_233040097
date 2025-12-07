
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</head>
</body>
<body class="bg-gray-50 min-h-screen flex flex-col font-sans">

     <nav class="bg-white shadow relative z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                {{-- Logo --}}
                <div class="flex items-center gap-3">
                    <a href="/" class="text-xl font-bold text-gray-800">MyApp</a>
                </div>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex items-center gap-6">
                    <a href="/home" class="text-gray-700 hover:text-blue-600 font-medium transition">Home</a>
                    <a href="/about" class="text-gray-700 hover:text-blue-600 font-medium transition">About</a>
                    <a href="/blog" class="text-gray-700 hover:text-blue-600 font-medium transition">Blog</a>
                    <a href="/categories" class="text-gray-700 hover:text-blue-600 font-medium transition">Categories</a>
                    <a href="/posts" class="text-gray-700 hover:text-blue-600 font-medium transition">Posts</a>
                    <a href="/contact" class="text-gray-700 hover:text-blue-600 font-medium transition">Contact</a>
                </div>

                {{-- Auth Buttons --}}
                <div class="flex items-center gap-3">

                    {{-- Jika belum login --}}
                    @guest
                        <a href="/login" 
                           class="hidden md:inline-block px-4 py-2 bg-blue-600 text-white rounded-md text-sm hover:bg-blue-700 transition">
                            Log in
                        </a>
                    @endguest

                    {{-- Jika sudah login (DROPDOWN) --}}
                    @auth
                        <div class="relative hidden md:block">
                            <button id="user-menu-button" class="flex items-center gap-2 text-gray-700 hover:text-blue-600 font-medium focus:outline-none transition">
                                <span>Hello, {{ auth()->user()->name }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div id="user-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 border border-gray-100 z-50">
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth

                    <button id="nav-toggle" aria-expanded="false" aria-controls="mobile-menu" 
                        class="md:hidden p-2 rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Mobile Menu --}}
            <div id="mobile-menu" class="md:hidden hidden pb-4 border-t border-gray-100 mt-2 pt-2">
                <div class="flex flex-col gap-2 px-2">
                    <a href="/home" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Home</a>
                    <a href="/about" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">About</a>
                    <a href="/blog" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Blog</a>
                    <a href="/categories" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Categories</a>
                    <a href="/posts" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Posts</a>
                    <a href="/contact" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Contact</a>

                    @guest
                        <a href="/login" class="block mt-2 px-3 py-2 rounded-md bg-blue-600 text-white text-center">
                            Log in
                        </a>
                    @endguest

                    @auth
                        <div class="border-t border-gray-200 my-2"></div>
                        <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Account</p>
                        <a href="/profile" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Profile</a>
                        <a href="/dashboard" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Dashboard</a>
                        <form action="/logout" method="POST" class="mt-1">
                            @csrf
                            <button type="submit" 
                                    class="w-full text-left px-3 py-2 rounded-md text-red-600 hover:bg-red-50 font-medium">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>


    <main class="flex-1 container mx-auto px-4 py-6">
        {{ $slot }}
    </main>

    <footer class="bg-gray-900 text-gray-200 mt-12">
        <div class="container mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <a href="/" class="text-lg font-bold text-white">MyApp</a>
                <p class="mt-3 text-sm text-gray-400">A small Laravel project for learning and showcasing posts. Built with simplicity and accessibility in mind.</p>
            </div>

            <div>
                <h4 class="font-semibold text-white">Quick Links</h4>
                <ul class="mt-3 space-y-2 text-sm text-gray-400">
                    <li><a href="/blog" class="hover:text-white">Blog</a></li>
                    <li><a href="/categories" class="hover:text-white">Categories</a></li>
                    <li><a href="/about" class="hover:text-white">About</a></li>
                    <li><a href="/contact" class="hover:text-white">Contact</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold text-white">Contact & Social</h4>
                <p class="mt-3 text-sm text-gray-400">Email: <a href="mailto:chankirana722@gmail.com" class="hover:text-white">chankirana722@gmail.com</a></p>
                <div class="mt-3 flex gap-3">
                    <a href="https://github.com/chandafa" target="_blank" class="text-gray-400 hover:text-white">GitHub</a>
                    <a href="https://linkedin.com/in/candra-kirana-dev" target="_blank" class="text-gray-400 hover:text-white">LinkedIn</a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800">
            <div class="container mx-auto px-4 py-4 flex flex-col md:flex-row items-center justify-between text-sm text-gray-400">
                <div>&copy; {{ date('Y') }} MyApp. All rights reserved.</div>
                <div class="mt-3 md:mt-0">
                    <a href="/privacy" class="hover:text-white mr-4">Privacy</a>
                    <a href="/terms" class="hover:text-white">Terms</a>
                </div>
            </div>
        </div>
    </footer>

   <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Menu Logic
            const btn = document.getElementById('nav-toggle');
            const menu = document.getElementById('mobile-menu');

            if (btn && menu) {
                btn.addEventListener('click', function() {
                    const expanded = this.getAttribute('aria-expanded') === 'true';
                    this.setAttribute('aria-expanded', String(!expanded));
                    menu.classList.toggle('hidden');
                });
            }

            // Dropdown Menu Logic (Desktop)
            const dropdownBtn = document.getElementById('user-menu-button');
            const dropdownMenu = document.getElementById('user-dropdown');

            if (dropdownBtn && dropdownMenu) {
                // Toggle dropdown click
                dropdownBtn.addEventListener('click', function(e) {
                    e.stopPropagation(); // Mencegah event bubbling
                    dropdownMenu.classList.toggle('hidden');
                });

                // Close dropdown ketika klik di luar area menu
                document.addEventListener('click', function(e) {
                    if (!dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>
