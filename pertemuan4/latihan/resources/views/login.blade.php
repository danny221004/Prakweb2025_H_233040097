<x-layout title="Login">
    <div class="max-w-md mx-auto mt-12 bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-semibold mb-4">Sign in to your account</h1>
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" required autofocus
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded" />
                    <label for="remember" class="ml-2 block text-sm text-gray-600">Remember me</label>
                </div>

                <div class="text-sm">
                    <a href="/" class="text-blue-600 hover:underline">Forgot password?</a>
                </div>
            </div>

            <div>
                <button type="submit" class="w-full inline-flex justify-center rounded-md bg-blue-600 text-white px-4 py-2 text-sm font-medium hover:bg-blue-700">Login</button>
            </div>

            <div class="text-center text-sm text-gray-600">
                Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
            </div>
        </form>
    </div>
</x-layout>