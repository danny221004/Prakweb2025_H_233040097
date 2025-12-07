
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @vite('resources/css/app.css') --}}
</head>
</body>
<body class="bg-gray-50 min-h-screen flex flex-col font-sans">

    <nav class="bg-white shadow">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <div class="flex items-center gap-3">
                    <a href="/" class="text-xl font-bold text-gray-800">MyApp</a>
                </div>

                <div class="hidden md:flex items-center gap-6">
                    <a href="/home" class="text-gray-700 hover:text-blue-600 font-medium transition">Home</a>
                    <a href="/about" class="text-gray-700 hover:text-blue-600 font-medium transition">About</a>
                    <a href="/blog" class="text-gray-700 hover:text-blue-600 font-medium transition">Blog</a>
                    <a href="/categories" class="text-gray-700 hover:text-blue-600 font-medium transition">Categories</a>
                    <a href="/posts" class="text-gray-700 hover:text-blue-600 font-medium transition">Posts</a>
                    <a href="/contact" class="text-gray-700 hover:text-blue-600 font-medium transition">Contact</a>
                </div>

                <div class="flex items-center gap-3">
                    <a href="/login" class="hidden md:inline-block px-4 py-2 bg-blue-600 text-white rounded-md text-sm hover:bg-blue-700 transition">Log in</a>
                    <button id="nav-toggle" aria-expanded="false" aria-controls="mobile-menu" class="md:hidden p-2 rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>

            <div id="mobile-menu" class="md:hidden hidden pb-4">
                <div class="flex flex-col gap-2 px-2">
                    <a href="/home" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Home</a>
                    <a href="/about" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">About</a>
                    <a href="/blog" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Blog</a>
                    <a href="/categories" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Categories</a>
                    <a href="/posts" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Posts</a>
                    <a href="/contact" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Contact</a>
                    <a href="/login" class="block mt-2 px-3 py-2 rounded-md bg-blue-600 text-white text-center">Log in</a>
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
        (function(){
            const btn = document.getElementById('nav-toggle');
            const menu = document.getElementById('mobile-menu');
            if (!btn || !menu) return;
            btn.addEventListener('click', function(){
                const expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', String(!expanded));
                menu.classList.toggle('hidden');
            });
        })();
    </script>
</body>
</html>
