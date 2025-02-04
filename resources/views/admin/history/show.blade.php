@extends('main')

@section('content')
<div class="container mx-auto mt-32 px-6 sm:px-8 md:px-12 lg:px-16 xl:px-24">
    <div class="bg-white rounded-xl shadow-2xl p-8 max-w-4xl mx-auto mb-14">
    <h1 class="text-4xl font-extrabold text-gray-900 text-center mb-6">{{ ucfirst($day) }}</h1>
    <p class="text-lg text-gray-600 mb-6 text-center">Aktivitas untuk hari {{ ucfirst($day) }}.</p>

        @if ($history->isEmpty())
            <p class="text-gray-600">Tidak ada aktivitas untuk hari ini.</p>
        @else
            <ul>
                @foreach ($history as $entry)
                    <li class="mb-4">
                        <strong>{{ $entry->action }}</strong> oleh Admin (ID: {{ $entry->admin_id }}) pada {{ $entry->created_at }}.
                        <p class="text-sm text-gray-500">{{ $entry->notes }}</p>
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('history.index') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800 font-semibold">
            Kembali ke halaman utama
        </a>
    </div>
</div>
@endsection
