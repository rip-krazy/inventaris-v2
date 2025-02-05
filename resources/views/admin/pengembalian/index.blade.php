@extends('main')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<body>
    <div class="w-screen ml-72 mr-10 bg-white rounded-lg shadow-lg p-10 my-10 animate__animated animate__fadeIn">
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6 my-4">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Pengembalian Tertunda</h2>

            <!-- Status Messages -->
            @if(session('status'))
                <div class="bg-green-50 border border-green-200 text-green-600 px-4 py-2 rounded-lg mb-4 text-center">
                    {{ session('message') }}
                </div>
            @endif

            <div class="overflow-hidden">
                <ul id="pengembalianList" class="space-y-3">
                    @foreach ($pengembalianTertunda as $index => $entry)
                        <li class="group bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4">
                                <div class="flex-1 mb-2 sm:mb-0">
                                    <div class="grid grid-cols-2 gap-2 text-sm">
                                        <div>
                                            <span class="text-gray-500">Nama:</span>
                                            <span class="text-gray-800 font-medium ml-1">{{ $entry['name'] }}</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-500">Mata Pelajaran:</span>
                                            <span class="text-gray-800 font-medium ml-1">{{ $entry['mapel'] }}</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-500">Barang atau Tempat:</span>
                                            <span class="text-gray-800 font-medium ml-1">{{ $entry['barangTempat'] }}</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-500">Waktu:</span>
                                            <span class="text-gray-800 font-medium ml-1">{{ $entry['jam'] }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-4">
                                    <!-- Status Badge -->
                                    @if ($entry['status'] == 'Pending')
                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-yellow-50 text-yellow-600">
                                            Pending
                                        </span>
                                    @elseif ($entry['status'] == 'Diterima')
                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-600">
                                            Diterima
                                        </span>
                                    @endif

                                    <!-- Action Button -->
                                    <form action="{{ route('pengembalian.approve', $index) }}" method="POST">
                                        @csrf
                                        <button type="submit" 
                                            class="bg-green-600 text-white rounded-md px-6 py-2 text-sm font-medium
                                                   hover:bg-green-700 transition-all duration-150 shadow-sm hover:shadow">
                                            Setujui
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                
        </ul>
    </div>
</body>

@endsection