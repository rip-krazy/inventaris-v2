<x-guest-layout>
    <div class="glass-effect rounded-2xl p-8 shadow-xl animate__animated animate__fadeIn">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-white mb-2">{{ __('Forgot Password') }}</h2>
            <p class="text-gray-200 text-sm">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email')" class="text-white" />
                <div class="relative">
                    <input
                        id="email"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400/50 focus:ring-opacity-50 transition duration-300"
                        placeholder="Enter your email address"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-between pt-2">
                <a href="{{ route('login') }}" class="text-sm text-gray-200 hover:text-white transition duration-300">
                    {{ __('Back to Login') }}
                </a>
                <x-primary-button class="hover-scale bg-white/10 border border-white/20 px-6 py-3 rounded-lg text-white hover:bg-white/20 transition duration-300">
                    {{ __('Send Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>