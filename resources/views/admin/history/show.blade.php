@extends('main')

@section('content')
<div class="container mx-auto mt-32 px-6 sm:px-8 md:px-12 lg:px-16 xl:px-24">
    <div class="bg-white rounded-xl shadow-2xl p-8 max-w-4xl mx-auto mb-14">
        <h1 class="text-4xl font-extrabold text-gray-900 text-center mb-6">{{ $history['title'] }}</h1>
        <p class="text-lg text-gray-600 mb-6 text-center">{{ $history['description'] }}</p>

        <p class="text-gray-600">Detail: {{ $history['extra'] }}</p>
        <p class="mt-2 text-sm text-gray-500">Diperoleh pada: {{ $history['date'] }}</p>
        <a href="{{ route('history.index') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800 font-semibold">
            Kembali ke halaman utama
        </a>
    </div>
</div>
@endsection
