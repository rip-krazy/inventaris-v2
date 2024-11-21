@extends('main')
@section('content')
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="py-12 px-48 flex justify-center">
    <div class="w-full max-w-4xl space-y-6">
        <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">{{ __('Update Profile Information') }}</h2>
            <div>
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">{{ __('Update Password') }}</h2>
            <div>
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
            <h2 class="text-xl font-semibold text-red-600 dark:text-red-400 mb-4">{{ __('Delete Account') }}</h2>
            <div>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection
