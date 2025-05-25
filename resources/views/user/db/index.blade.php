@extends('home')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<title>Data Barang</title>

<div class="w-100 mx-24 bg-gradient-to-br from-white to-green-50 rounded-xl shadow-2xl p-10 my-10 animate__animated animate__fadeIn">
    <h1 class="text-4xl font-bold mb-8 text-center text-gray-800 border-b pb-4">
        <i class="fas fa-box-open mr-2 text-green-600"></i>Data Barang
    </h1>

    <!-- Form Pencarian -->
    <div class="mb-8 flex justify-between items-center gap-4">
        <!-- Form Pencarian -->
        <form action="{{ route('db.index') }}" method="GET" class="flex items-center space-x-4 flex-1">
            <div class="relative flex-1">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                <input type="text" 
                       name="search" 
                       value="{{ old('search', $search) }}" 
                       placeholder="Cari Barang..." 
                       class="pl-10 pr-4 py-2 border-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" />
            </div>
            <button type="submit" 
                    class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200 flex items-center gap-2">
                <i class="fas fa-search"></i>
                Cari
            </button>
        </form>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 animate__animated animate__fadeIn">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Statistik Total Barang -->
    <div class="mb-6 bg-white p-4 rounded-lg shadow">
        <div class="flex items-center justify-center">
            <i class="fas fa-cubes mr-2 text-green-600"></i>
            <span class="text-lg font-semibold text-gray-700">Total Barang: {{ $totalBarang }}</span>
        </div>
    </div>

    <div class="overflow-hidden rounded-xl shadow-lg">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-green-600 text-white">
                    <th class="py-4 px-6 text-center font-semibold">No</th>
                    <th class="py-4 px-6 text-center font-semibold">Nama Barang</th>
                    <th class="py-4 px-6 text-center font-semibold">Total Item</th>
                    <th class="py-4 px-6 text-center font-semibold">Kondisi</th>
                    <th class="py-4 px-6 text-center font-semibold">Detail</th>
                </tr>
            </thead>
            <tbody>
                @forelse($currentItems as $index => $groupedBarang)
                <tr class="hover:bg-green-50 transition duration-150">
                    <td class="py-4 px-6 border-b text-center">{{ (request()->get('page', 1) - 1) * 10 + $loop->iteration }}</td>
                    <td class="py-4 px-6 border-b text-center font-medium">{{ $groupedBarang['nama_barang'] }}</td>
                    <td class="py-4 px-6 border-b text-center">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                            {{ $groupedBarang['total_barang'] }} item
                        </span>
                    </td>
                    <td class="py-4 px-6 border-b text-center">
                        <div class="flex gap-2 justify-center">
                            @if($groupedBarang['baik_count'] > 0)
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm">
                                    Baik: {{ $groupedBarang['baik_count'] }}
                                </span>
                            @endif
                            @if($groupedBarang['rusak_count'] > 0)
                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-sm">
                                    Rusak: {{ $groupedBarang['rusak_count'] }}
                                </span>
                            @endif
                        </div>
                    </td>
                    <td class="py-4 px-6 border-b text-center">
                        <div class="flex justify-center gap-2">
                            <!-- Tombol untuk expand/collapse detail -->
                            <button type="button" 
                                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none transition duration-200 flex items-center gap-2"
                                    onclick="toggleItemDetails('items-{{ $loop->index }}')">
                                <i class="fas fa-eye"></i>
                                <span id="btn-text-{{ $loop->index }}">Lihat Detail</span>
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- Detail Items Row (Hidden by default) -->
                <tr id="items-{{ $loop->index }}" class="hidden bg-gray-50">
                    <td colspan="5" class="py-4 px-6 border-b">
                        <div class="bg-white rounded-lg p-4 shadow-inner">
                            <h4 class="text-lg font-semibold mb-4 text-gray-800 flex items-center">
                                <i class="fas fa-list-ul mr-2 text-green-600"></i>
                                Detail Item untuk "{{ $groupedBarang['nama_barang'] }}"
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($groupedBarang['items'] as $item)
                                    <div class="bg-gradient-to-br from-white to-gray-50 border-2 border-gray-200 rounded-lg p-4 hover:border-green-300 hover:shadow-md transition duration-200">
                                        <div class="flex justify-between items-start mb-3">
                                            <div class="flex-1">
                                                <div class="font-mono text-lg font-bold text-gray-800 mb-1">
                                                    {{ $item->kode_barang }}
                                                </div>
                                                <div class="flex items-center mb-2">
                                                    <i class="fas {{ $item->kondisi_barang === 'Baik' ? 'fa-check-circle text-green-500' : 'fa-times-circle text-red-500' }} mr-2"></i>
                                                    <span class="text-sm font-medium {{ $item->kondisi_barang === 'Baik' ? 'text-green-700' : 'text-red-700' }}">
                                                        {{ $item->kondisi_barang }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <!-- Summary info -->
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <div class="flex justify-between items-center text-sm text-gray-600">
                                    <span>Total: {{ $groupedBarang['total_barang'] }} item</span>
                                    <div class="flex gap-4">
                                        <span class="text-green-600">Baik: {{ $groupedBarang['baik_count'] }}</span>
                                        <span class="text-red-600">Rusak: {{ $groupedBarang['rusak_count'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 px-6 text-center text-gray-500">
                        <i class="fas fa-inbox text-4xl mb-4 text-gray-300"></i>
                        <div>Tidak ada data barang ditemukan</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Manual Pagination Controls -->
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
            <i class="fas fa-chevron-left mr-1"></i>
            Previous
        </a>

        <div class="flex items-center">
            <span class="px-4 py-2 bg-green-100 text-green-700 rounded-lg">
                Page {{ $currentPage }} of {{ $totalPages }}
            </span>
        </div>

        <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage + 1]) }}" 
           class="px-4 py-2 {{ !$hasNextPage ? 'text-gray-400 cursor-not-allowed pointer-events-none' : 'text-green-600 hover:text-green-700' }} transition duration-200">
            Next
            <i class="fas fa-chevron-right ml-1"></i>
        </a>
    </div>
    @endif
</div>

<script>
function toggleItemDetails(itemsId) {
    const detailsRow = document.getElementById(itemsId);
    const btnText = document.getElementById('btn-text-' + itemsId.split('-')[1]);
    
    if (detailsRow.classList.contains('hidden')) {
        // Show details
        detailsRow.classList.remove('hidden');
        detailsRow.classList.add('animate__animated', 'animate__fadeIn');
        btnText.textContent = 'Sembunyikan';
        
        // Change button icon
        const button = btnText.parentElement;
        const icon = button.querySelector('i');
        icon.className = 'fas fa-eye-slash';
    } else {
        // Hide details
        detailsRow.classList.add('hidden');
        btnText.textContent = 'Lihat Detail';
        
        // Change button icon back
        const button = btnText.parentElement;
        const icon = button.querySelector('i');
        icon.className = 'fas fa-eye';
    }
}

// Optional: Close all expanded details when clicking outside
document.addEventListener('click', function(event) {
    // Check if click is outside the table
    if (!event.target.closest('table') && !event.target.closest('button')) {
        document.querySelectorAll('[id^="items-"]').forEach(detailsRow => {
            if (!detailsRow.classList.contains('hidden')) {
                const index = detailsRow.id.split('-')[1];
                const btnText = document.getElementById('btn-text-' + index);
                if (btnText) {
                    detailsRow.classList.add('hidden');
                    btnText.textContent = 'Lihat Detail';
                    const button = btnText.parentElement;
                    const icon = button.querySelector('i');
                    icon.className = 'fas fa-eye';
                }
            }
        });
    }
});
</script>

@endsection