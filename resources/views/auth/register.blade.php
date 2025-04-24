<x-guest-layout>
    <div class="glass-effect rounded-3xl p-8 shadow-2xl space-y-8">
        <div class="text-center space-y-2 animate__animated animate__fadeInDown">
            <h2 class="text-3xl font-bold text-black">Buat Akun Baru</h2>
            <p class="text-gray-800">Daftar untuk memulai</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div class="space-y-2">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <x-text-input id="name" 
                        class="block w-full pl-10 bg-white/10 border-gray-200/20 text-black placeholder-gray-500 focus:border-green-400 focus:ring focus:ring-green-400 focus:ring-opacity-40"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Full Name" />
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            <!-- Email Address -->
            <div class="space-y-2">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                    <x-text-input id="email" 
                        class="block w-full pl-10 bg-white/10 border-gray-200/20 text-black placeholder-gray-500 focus:border-green-400 focus:ring focus:ring-green-400 focus:ring-opacity-40"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autocomplete="username"
                        placeholder="Email Address" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Mapel (Subject) -->
            <div class="space-y-2">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <x-text-input id="mapel" 
                        class="block w-full pl-10 bg-white/10 border-gray-200/20 text-black placeholder-gray-500 focus:border-green-400 focus:ring focus:ring-green-400 focus:ring-opacity-40"
                        type="text"
                        name="mapel"
                        :value="old('mapel')"
                        required
                        placeholder="Mata Pelajaran" />
                </div>
                <x-input-error :messages="$errors->get('mapel')" class="mt-1" />
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <x-text-input id="password"
                        class="block w-full pl-10 bg-white/10 border-gray-200/20 text-black placeholder-gray-500 focus:border-green-400 focus:ring focus:ring-green-400 focus:ring-opacity-40"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Password" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- Confirm Password -->
            <div class="space-y-2">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <x-text-input id="password_confirmation"
                        class="block w-full pl-10 bg-white/10 border-gray-200/20 text-black placeholder-gray-500 focus:border-green-400 focus:ring focus:ring-green-400 focus:ring-opacity-40"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm Password" />
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>

            <!-- Register Button & Login Link -->
            <div class="space-y-4">
                <button type="submit" 
                    class="w-full py-3 px-4 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold rounded-lg shadow-lg transform transition-all duration-200 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                    Register
                </button>

                <div class="text-center">
                    <p class="text-sm text-gray-800">
                        Already have an account?
                        <a href="{{ route('login') }}" 
                            class="font-medium text-green-600 hover:text-green-700 transition-colors duration-200">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>