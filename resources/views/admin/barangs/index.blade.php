@extends('main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<title>Data Barang - Inventory System</title>

<div class="w-100 mx-16 bg-white rounded-xl shadow-2xl p-10 my-10 animate__animated animate__fadeIn">
    <!-- Header Section -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8 animate__animated animate__fadeIn">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">
                <i class="fas fa-box-open text-green-600 mr-3"></i>Data Barang
            </h1>
            
            <!-- Search and Add Button -->
            <div class="mt-4 md:mt-0 flex flex-col sm:flex-row gap-4">
                <form action="{{ route('barangs.index') }}" method="GET" class="flex-1 flex">
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" 
                               name="search" 
                               value="{{ old('search', $search) }}" 
                               placeholder="Cari barang..." 
                               class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200">
                    </div>
                    <button type="submit" 
                            class="ml-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center">
                        <i class="fas fa-search mr-2"></i>Cari
                    </button>
                </form>
                
                <a href="{{ route('barangs.create') }}" 
                   class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center justify-center">
                    <i class="fas fa-plus mr-2"></i>Tambah Barang
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded animate__animated animate__fadeIn">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3"></i>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Summary Card -->
        <div class="bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-lg shadow-inner border border-green-200">
            <div class="flex items-center justify-center space-x-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-200 text-green-700 mr-3">
                        <i class="fas fa-cubes text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Total Barang</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalBarang }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table Section -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden animate__animated animate__fadeInUp">
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Barang</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Total</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Lokasi</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Kondisi</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($currentItems as $index => $groupedBarang)
                    <tr class="hover:bg-green-50 transition-colors duration-150">
                        <!-- Row Number -->
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                            {{ (request()->get('page', 1) - 1) * 10 + $loop->iteration }}
                        </td>
                        
                        <!-- Item Name -->
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-800">
                            {{ $groupedBarang['nama_barang'] }}
                        </td>
                        
                        <!-- Total Items -->
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ $groupedBarang['total_barang'] }} item
                            </span>
                        </td>
                        
                        <!-- Locations -->
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                {{ count($groupedBarang['lokasi_list']) }} lokasi
                            </span>
                        </td>
                        
                        <!-- Condition -->
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <div class="flex justify-center space-x-2">
                                @if($groupedBarang['baik_count'] > 0)
                                    <span class="px-2 py-1 text-xs font-medium rounded bg-green-100 text-green-800">
                                        Baik: {{ $groupedBarang['baik_count'] }}
                                    </span>
                                @endif
                                @if($groupedBarang['rusak_count'] > 0)
                                    <span class="px-2 py-1 text-xs font-medium rounded bg-red-100 text-red-800">
                                        Rusak: {{ $groupedBarang['rusak_count'] }}
                                    </span>
                                @endif
                            </div>
                        </td>
                        
                        <!-- Action Button -->
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <button onclick="toggleItemDetails('items-{{ $loop->index }}')"
                                    class="text-blue-600 hover:text-blue-900 bg-blue-100 hover:bg-blue-200 px-4 py-2 rounded-lg transition-colors duration-200 flex items-center mx-auto">
                                <i class="fas fa-eye mr-2"></i>
                                <span id="btn-text-{{ $loop->index }}">Detail</span>
                            </button>
                        </td>
                    </tr>
                    
                    <!-- Detail Row -->
                    <tr id="items-{{ $loop->index }}" class="hidden bg-gray-50">
                        <td colspan="6" class="px-6 py-4">
                            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                                <!-- Detail Header -->
                                <div class="flex items-center justify-between border-b pb-3 mb-4">
                                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                        <i class="fas fa-list-ul text-green-600 mr-2"></i>
                                        Detail "{{ $groupedBarang['nama_barang'] }}"
                                    </h3>
                                    <div class="text-sm text-gray-500">
                                        Total: {{ $groupedBarang['total_barang'] }} item
                                    </div>
                                </div>
                                
                              <!-- Item Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($groupedBarang['items'] as $item)
    <div class="border border-gray-200 rounded-lg p-4 hover:border-green-300 hover:shadow-md transition-all duration-200">
        <!-- Location -->
        <div class="flex items-center mb-2">
            <i class="fas fa-map-marker-alt text-purple-500 mr-2"></i>
            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                {{ $item->ruang->name ?? $item->lokasi ?? 'Lokasi tidak tersedia' }}
            </span>
        </div>
        
        <!-- Item Code -->
        <div class="font-mono font-bold text-gray-800 text-lg mb-2">
            {{ $item->kode_barang }}
        </div>
        
        <!-- Condition -->
        <div class="flex items-center mb-4">
            <i class="fas {{ $item->kondisi_barang === 'Baik' ? 'fa-check-circle text-green-500' : 'fa-times-circle text-red-500' }} mr-2"></i>
            <span class="text-sm font-medium {{ $item->kondisi_barang === 'Baik' ? 'text-green-700' : 'text-red-700' }}">
                {{ $item->kondisi_barang }}
            </span>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex space-x-2 border-t pt-3">
            <a href="{{ route('barangs.edit', $item) }}" 
               class="flex-1 px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded flex items-center justify-center transition-colors duration-200">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <form action="{{ route('barangs.destroy', $item) }}" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Apakah yakin ingin menghapus {{ $item->kode_barang }}?')"
                        class="w-full px-3 py-2 bg-red-500 hover:bg-red-600 text-white text-sm rounded flex items-center justify-center transition-colors duration-200">
                    <i class="fas fa-trash mr-2"></i>Hapus
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
                                
                                <!-- Summary Footer -->
                                <div class="mt-4 pt-4 border-t border-gray-200 text-sm text-gray-600">
                                    <div class="flex flex-wrap justify-between items-center">
                                        <div class="mb-2 sm:mb-0">
                                            <span class="font-medium">Lokasi:</span>
                                            @foreach($groupedBarang['lokasi_list'] as $lokasi => $count)
                                                <span class="ml-1">{{ $lokasi }} ({{ $count }})</span>{{ !$loop->last ? ',' : '' }}
                                            @endforeach
                                        </div>
                                        <div class="flex space-x-4">
                                            <span class="text-green-600">
                                                <i class="fas fa-check-circle mr-1"></i>Baik: {{ $groupedBarang['baik_count'] }}
                                            </span>
                                            <span class="text-red-600">
                                                <i class="fas fa-times-circle mr-1"></i>Rusak: {{ $groupedBarang['rusak_count'] }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-500">
                                <i class="fas fa-inbox text-4xl mb-4 text-gray-300"></i>
                                <p class="text-lg">Tidak ada data barang ditemukan</p>
                                <a href="{{ route('barangs.create') }}" class="mt-4 text-green-600 hover:text-green-800 flex items-center">
                                    <i class="fas fa-plus-circle mr-2"></i>Tambah Barang Baru
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
    @if($currentItems->count() > 0)
    <div class="mt-8 flex justify-between items-center bg-white p-4 rounded-lg shadow">
        @php
            $currentPage = request()->get('page', 1);
            $totalPages = ceil($barangs->count() / 10);
            $hasNextPage = $currentPage < $totalPages;
            $hasPrevPage = $currentPage > 1;
        @endphp

        <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage - 1]) }}"
           class="px-4 py-2 {{ !$hasPrevPage ? 'text-gray-400 cursor-not-allowed pointer-events-none' : 'text-green-600 hover:text-green-700' }} transition duration-200">
            <i class="fas fa-chevron-left mr-1"></i>Previous
        </a>

        <div class="flex items-center">
            <span class="px-4 py-2 bg-green-100 text-green-700 rounded-lg">
                Page {{ $currentPage }} of {{ $totalPages }}
            </span>
        </div>

        <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage + 1]) }}"
           class="px-4 py-2 {{ !$hasNextPage ? 'text-gray-400 cursor-not-allowed pointer-events-none' : 'text-green-600 hover:text-green-700' }} transition duration-200">
            Next<i class="fas fa-chevron-right ml-1"></i>
        </a>
    </div>
    @endif
    </div>
</div>

<script>
function toggleItemDetails(itemsId) {
    const detailsRow = document.getElementById(itemsId);
    const btnText = document.getElementById('btn-text-' + itemsId.split('-')[1]);
    const buttonIcon = btnText.previousElementSibling;

    if (detailsRow.classList.contains('hidden')) {
        // Show details
        detailsRow.classList.remove('hidden');
        detailsRow.classList.add('animate__animated', 'animate__fadeIn');
        btnText.textContent = 'Tutup';
        buttonIcon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        // Hide details
        detailsRow.classList.add('hidden');
        btnText.textContent = 'Detail';
        buttonIcon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

// Close all details when clicking outside
document.addEventListener('click', function(event) {
    if (!event.target.closest('button[onclick^="toggleItemDetails"]') && !event.target.closest('#items-')) {
        document.querySelectorAll('[id^="items-"]').forEach(row => {
            if (!row.classList.contains('hidden')) {
                const index = row.id.split('-')[1];
                const btnText = document.getElementById('btn-text-' + index);
                if (btnText) {
                    row.classList.add('hidden');
                    btnText.textContent = 'Detail';
                    btnText.previousElementSibling.classList.replace('fa-eye-slash', 'fa-eye');
                }
            }
        });
    }
});
</script>

@endsection