@extends('main')

@section('content')

<div class="container mx-auto mt-32 px-6 sm:px-8 md:px-12 lg:px-16 xl:px-24">
    <div class="bg-white rounded-xl shadow-2xl p-8 max-w-4xl mx-auto mb-14">
        <h1 class="text-4xl font-extrabold text-gray-900 text-center mb-6">History Page</h1>
        <p class="text-lg text-gray-600 mb-6 text-center">This is where you can view all your historical actions and changes. Below you will find a log of all activities that have been recorded.</p>

        <!-- History Card Section (2 rows, 3 columns) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @php
                // Array of data for each day
                $days = [
                    ['day' => 'Senin', 'date' => 'Januari 5, 2025', 'description' => 'Deskripsi tindakan yang dilakukan pada hari Senin. Rincian mengenai apa yang terjadi pada hari ini.'],
                    ['day' => 'Selasa', 'date' => 'Januari 6, 2025', 'description' => 'Deskripsi tindakan yang dilakukan pada hari Selasa. Rincian mengenai apa yang terjadi pada hari ini.'],
                    ['day' => 'Rabu', 'date' => 'Januari 7, 2025', 'description' => 'Deskripsi tindakan yang dilakukan pada hari Rabu. Rincian mengenai apa yang terjadi pada hari ini.'],
                    ['day' => 'Kamis', 'date' => 'Januari 8, 2025', 'description' => 'Deskripsi tindakan yang dilakukan pada hari Kamis. Rincian mengenai apa yang terjadi pada hari ini.'],
                    ['day' => 'Jumat', 'date' => 'Januari 9, 2025', 'description' => 'Deskripsi tindakan yang dilakukan pada hari Jumat. Rincian mengenai apa yang terjadi pada hari ini.'],
                    ['day' => 'Sabtu', 'date' => 'Januari 10, 2025', 'description' => 'Deskripsi tindakan yang dilakukan pada hari Sabtu. Rincian mengenai apa yang terjadi pada hari ini.']
                ];
            @endphp

            @foreach($days as $day)
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $day['day'] }}</h3>
                    <p class="text-gray-600 mt-2">{{ $day['description'] }}</p>
                    <p class="mt-2 text-sm text-gray-500">Diperoleh pada: {{ $day['date'] }}</p>
                    <a href="{{ route('history.show', ['day' => strtolower($day['day'])]) }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800 font-semibold">
                <img src="assets/img/info detail hari.png" alt="Detail Logo" class="w-6 h-6">
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection
