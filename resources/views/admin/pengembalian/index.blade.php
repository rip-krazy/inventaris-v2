@extends('main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<body class="bg-gray-100 font-sans">
    <div class="w-100 mx-16 bg-gradient-to-br from-white to-green-50 rounded-xl shadow-2xl p-10 my-6 animate__animated animate__fadeIn">
        <!-- Header Section with Enhanced Design -->
        <div class="mb-8 text-center animate__animated animate__fadeIn">
            <div class="inline-block p-2 bg-green-50 rounded-full mb-4">
                <div class="bg-green-500 w-16 h-16 rounded-full flex items-center justify-center shadow-lg">
                    <i class="fas fa-undo text-white text-2xl"></i>
                </div>
            </div>
            <h1 class="text-4xl font-bold text-gray-800 mb-3">Pengembalian yang Tertunda</h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Tinjau dan kelola semua permintaan pengembalian yang membutuhkan persetujuan Anda</p>
        </div>

        <!-- Main Content Card with Enhanced Shadow -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-50 overflow-hidden animate__animated animate__fadeInUp">
            <!-- Card Header with Gradient -->
            <div class="bg-green-500 px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-2 rounded-lg mr-4">
                        <i class="fas fa-clock text-white text-xl"></i>
                    </div>
                    <h2 class="text-2xl font-semibold text-white">Menunggu Persetujuan Pengembalian</h2>
                </div>
                <span class="bg-white bg-opacity-25 px-4 py-2 rounded-full text-white font-medium flex items-center">
                    <i class="fas fa-list-check mr-2"></i>
                    <span>{{ count($pengembalianTertunda) }} permintaan</span>
                </span>
            </div>

            <!-- Requests List with Improved Spacing -->
            <div class="p-6">
                @if(count($pengembalianTertunda) > 0)
                <div class="space-y-4">
                    @foreach ($pengembalianTertunda as $index => $entry)
                    <div id="pengembalian-{{ $index }}" class="bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 ease-in-out transform hover:scale-[1.01]">
                        <div class="p-5">
                            <div class="flex flex-col lg:flex-row gap-6">
                                <!-- Left side: Request Details with Icons -->
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 flex-grow">
                                    <div class="flex flex-col space-y-2">
                                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider flex items-center">
                                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>Nama
                                        </p>
                                        <div class="flex items-center bg-green-50 rounded-lg p-3">
                                            <div class="bg-green-100 rounded-full p-2 mr-3">
                                                <i class="fas fa-user text-green-600"></i>
                                            </div>
                                            <p class="text-gray-800 font-medium">{{ $entry['name'] }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-col space-y-2">
                                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider flex items-center">
                                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>Mata Pelajaran
                                        </p>
                                        <div class="flex items-center bg-blue-50 rounded-lg p-3">
                                            <div class="bg-blue-100 rounded-full p-2 mr-3">
                                                <i class="fas fa-book text-blue-600"></i>
                                            </div>
                                            <p class="text-gray-800 font-medium">{{ $entry['mapel'] }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-col space-y-2">
                                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider flex items-center">
                                            <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                            @if (!empty($entry['barangTempat'])) Barang 
                                            @elseif (!empty($entry['ruangTempat'])) Ruang 
                                            @else Lokasi @endif
                                        </p>
                                        <div class="flex items-center bg-purple-50 rounded-lg p-3">
                                            <div class="bg-purple-100 rounded-full p-2 mr-3">
                                                <i class="fas fa-map-marker-alt text-purple-600"></i>
                                            </div>
                                            <p class="text-gray-800 font-medium">
                                                @if (!empty($entry['ruangTempat']) && $entry['ruangTempat'] !== '-')
                                                    {{ $entry['ruangTempat'] }}
                                                @elseif (!empty($entry['barangTempat']) && $entry['barangTempat'] !== '-')
                                                    {{ $entry['barangTempat'] }}
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-col space-y-2">
                                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider flex items-center">
                                            <span class="w-2 h-2 bg-amber-500 rounded-full mr-2"></span>Waktu
                                        </p>
                                        <div class="flex items-center bg-amber-50 rounded-lg p-3">
                                            <div class="bg-amber-100 rounded-full p-2 mr-3">
                                                <i class="far fa-clock text-amber-600"></i>
                                            </div>
                                            <p class="text-gray-800 font-medium">{{ $entry['jam'] }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right side: Status and Action Buttons with Improved Design -->
                                <div class="flex flex-col justify-center space-y-3 lg:w-56">
                                    <!-- Date Badge -->
                                    <div class="bg-gray-50 text-gray-700 px-4 py-2 rounded-lg text-sm flex items-center justify-center mb-1">
                                        <i class="far fa-calendar-alt mr-2 text-gray-500"></i>
                                        <span>{{ date('d M Y') }}</span>
                                    </div>
                                    
                                    <!-- Status Badge -->
                                    <div class="flex justify-center mb-2">
                                        @if ($entry['status'] == 'Pending')
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-yellow-50 text-yellow-700 border border-yellow-200">
                                                <i class="fas fa-clock mr-2"></i>Pending
                                            </span>
                                        @elseif ($entry['status'] == 'Approved')
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-50 text-green-700 border border-green-200">
                                                <i class="fas fa-check mr-2"></i>Approved
                                            </span>
                                        @elseif ($entry['status'] == 'Rejected')
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-red-50 text-red-700 border border-red-200">
                                                <i class="fas fa-times mr-2"></i>Rejected
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Action Button -->
                                    <form action="{{ route('pengembalian.approve', $index) }}" method="POST" class="approve-form">
                                        @csrf
                                        <button type="submit" 
                                            class="approve-btn w-full flex items-center justify-center px-4 py-3 bg-green-500 text-sm font-medium text-white 
                                                   rounded-lg hover:bg-green-600 transition-all duration-300 shadow-sm"
                                            data-id="{{ $index }}">
                                            <i class="fas fa-check-circle mr-2"></i> Setujui Pengembalian
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <!-- Enhanced Empty State -->
                <div class="text-center py-16 animate__animated animate__fadeIn">
                    <div class="mx-auto w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mb-6 border border-gray-100">
                        <i class="fas fa-inbox text-green-400 text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-medium text-gray-700 mb-2">Tidak ada pengembalian tertunda</h3>
                    <p class="text-gray-500 mb-6">Semua pengembalian telah diproses</p>
                    <button class="px-5 py-3 bg-gray-50 hover:bg-gray-100 transition-colors rounded-lg text-gray-600 font-medium flex items-center mx-auto">
                        <i class="fas fa-sync-alt mr-2"></i> Muat Ulang
                    </button>
                </div>
                @endif
            </div>
        </div>
        
        <!-- Bottom Information Card -->
        <div class="mt-6 bg-blue-50 rounded-xl p-4 border border-blue-100 flex items-center shadow-sm animate__animated animate__fadeIn animate__delay-1s">
            <div class="bg-blue-100 rounded-full p-3 mr-4">
                <i class="fas fa-info-circle text-blue-600 text-xl"></i>
            </div>
            <div>
                <h4 class="font-medium text-blue-800">Petunjuk Pengembalian</h4>
                <p class="text-blue-600 text-sm">Pengembalian yang disetujui akan langsung diproses dan item akan dikembalikan ke sistem inventaris.</p>
            </div>
        </div>
    </div>

    <!-- JavaScript with Enhanced Animations -->
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
                            item.classList.add('animate__animated', 'animate__fadeOutRight');
                            setTimeout(() => this.submit(), 500);
                        }
                    }
                });
            });
            
            // Add hover animation to cards
            document.querySelectorAll('[id^="pengembalian-"]').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.classList.add('shadow-md');
                });
                
                card.addEventListener('mouseleave', function() {
                    this.classList.remove('shadow-md');
                });
            });
        });
    </script>
</body>

@endsection