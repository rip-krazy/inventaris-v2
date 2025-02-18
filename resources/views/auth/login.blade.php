<!-- login.blade.php -->
<x-guest-layout>
    <div class="glass-effect rounded-3xl p-8 shadow-2xl space-y-8">
        <div class="text-center space-y-2">
            <h2 class="text-3xl font-bold text-white">Selamat Datang</h2>
            <p class="text-gray-200">Silakan masuk ke akun Anda</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div class="space-y-2">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                    <x-text-input id="email" 
                        class="block w-full pl-10 bg-white/10 border-gray-200/20 text-white placeholder-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-40"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Email Address" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <x-text-input id="password"
                        class="block w-full pl-10 bg-white/10 border-gray-200/20 text-white placeholder-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-40"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Password" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- Additional Options -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me"
                        type="checkbox"
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-200">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-200 hover:text-white transition-colors duration-200"
                        href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>

            <!-- Login Button -->
            <div>
                <button type="submit" 
                    class="w-full py-3 px-4 bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-semibold rounded-lg shadow-lg transform transition-all duration-200 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                    Sign in
                </button>
            </div>

            <!-- Register Link -->
            <div class="text-center">
                <p class="text-sm text-gray-200">
                    Don't have an account?
                    <a href="{{ route('register') }}" 
                        class="font-medium text-blue-400 hover:text-blue-300 transition-colors duration-200">
                        Register here
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>