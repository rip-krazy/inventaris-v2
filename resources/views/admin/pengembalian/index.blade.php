@extends('main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<body class="bg-gray-50 font-sans">
    <div class="w-100 mx-24 bg-gradient-to-br from-white to-green-50 rounded-xl shadow-2xl p-10 my-10 animate__animated animate__fadeIn">
        <!-- Header Section -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                <i class="fas fa-clipboard-check text-green-500 mr-2"></i>Pengembalian Tertunda
            </h1>
            <p class="text-gray-600">Tinjau dan kelola permintaan pengembalian yang menunggu</p>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-undo text-white mr-3 text-xl"></i>
                    <h2 class="text-xl font-semibold text-white">Menunggu Persetujuan Pengembalian</h2>
                </div>
                <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm text-white">
                    {{ count($pengembalianTertunda) }} permintaan
                </span>
            </div>

            <!-- Requests List -->
            <div class="p-6">
                @if(count($pengembalianTertunda) > 0)
                <div class="space-y-4">
                    @foreach ($pengembalianTertunda as $index => $entry)
                    <div id="pengembalian-{{ $index }}" class="bg-white border border-gray-200 rounded-lg hover:shadow-md transition-all duration-300 ease-in-out">
                        <div class="p-5 h-full">
                            <div class="flex flex-col lg:flex-row gap-6 h-full">
                                <!-- Request Details -->
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 flex-grow">
                                    <div class="flex flex-col justify-center space-y-1">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</p>
                                        <p class="text-gray-800 font-medium flex items-center">
                                            <i class="fas fa-user-circle text-green-500 mr-2 mt-1"></i>
                                            {{ $entry['name'] }}
                                        </p>
                                    </div>
                                    <div class="flex flex-col justify-center space-y-1">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Pelajaran</p>
                                        <p class="text-gray-800 font-medium flex items-center">
                                            <i class="fas fa-book text-blue-500 mr-2 mt-1"></i>
                                            {{ $entry['mapel'] }}
                                        </p>
                                    </div>
                                    <div class="flex flex-col justify-center space-y-1">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            @if (!empty($entry['barangTempat'])) Barang 
                                            @elseif (!empty($entry['ruangTempat'])) Ruang 
                                            @else Lokasi @endif
                                        </p>
                                        <p class="text-gray-800 font-medium flex items-center">
                                            <i class="fas fa-map-marker-alt text-purple-500 mr-2 mt-1"></i>
                                            @if (!empty($entry['ruangTempat']) && $entry['ruangTempat'] !== '-')
                                                {{ $entry['ruangTempat'] }}
                                            @elseif (!empty($entry['barangTempat']) && $entry['barangTempat'] !== '-')
                                                {{ $entry['barangTempat'] }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                    <div class="flex flex-col justify-center space-y-1">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</p>
                                        <p class="text-gray-800 font-medium flex items-center">
                                            <i class="far fa-clock text-amber-500 mr-2 mt-1"></i>
                                            {{ $entry['jam'] }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Status Badge -->
                                <div class="flex flex-col justify-center items-center">
                                    <div class="mb-3">
                                        @if ($entry['status'] == 'Pending')
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-yellow-50 text-yellow-700">
                                                <i class="fas fa-clock mr-2"></i>Pending
                                            </span>
                                        @elseif ($entry['status'] == 'Approved')
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-50 text-green-700">
                                                <i class="fas fa-check mr-2"></i>Approved
                                            </span>
                                        @elseif ($entry['status'] == 'Rejected')
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-red-50 text-red-700">
                                                <i class="fas fa-times mr-2"></i>Rejected
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Action Button -->
                                    <form action="{{ route('pengembalian.approve', $index) }}" method="POST" class="approve-form">
                                        @csrf
                                        <button type="submit" 
                                            class="approve-btn flex items-center justify-center px-4 py-2 bg-green-600 text-sm font-medium text-white 
                                                rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 
                                                focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 shadow-sm"
                                            data-id="{{ $index }}">
                                            <i class="fas fa-check-circle mr-2"></i> Setujui
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <!-- Empty State -->
                <div class="text-center py-12">
                    <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-inbox text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-700 mb-1">Tidak ada pengembalian tertunda</h3>
                    <p class="text-gray-500">Semua pengembalian telah diproses</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Add animation before approve
            document.querySelectorAll('.approve-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('.approve-btn');
                    if (button) {
                        const id = button.getAttribute('data-id');
                        const item = document.getElementById(`pengembalian-${id}`);
                        if (item) {
                            e.preventDefault();
                            item.classList.add('animate__fadeOut');
                            setTimeout(() => this.submit(), 300);
                        }
                    }
                });
            });
        });
    </script>
</body>

@endsection