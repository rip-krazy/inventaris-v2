@extends('main')

@section('content')
<div class="w-100 mx-16 mt-6 animate__animated animate__fadeIn">
    <!-- Page Header with Search and Filters -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Dashboard Pengembalian</h1>
        <p class="text-gray-600 mb-6">Manajemen dan pemantauan pengembalian barang dan tempat</p>
        
        <!-- Search and Filter Bar -->
        <div class="bg-white rounded-xl shadow-md p-4 mb-8">
            <form action="{{ route('pengembalian.history') }}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="searchInput" class="block text-sm font-medium text-gray-700 mb-1">Cari</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input type="text" name="search" id="searchInput" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Nama, barang, atau mapel..." value="{{ $filters['search'] ?? '' }}">
                        </div>
                    </div>
                    <div>
                        <label for="filterTanggal" class="block text-sm font-medium text-gray-700 mb-1">Filter Tanggal</label>
                        <input type="date" name="tanggal" id="filterTanggal" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="{{ $filters['tanggal'] ?? '' }}">
                    </div>
                    <div>
                        <label for="filterStatus" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="filterStatus" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Semua Status</option>
                            <option value="Approved" {{ ($filters['status'] ?? '') == 'Approved' ? 'selected' : '' }}>Approved</option>
                            <option value="Rejected" {{ ($filters['status'] ?? '') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>
                    <div class="md:col-span-3 flex justify-end space-x-2">
                        <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Filter
                        </button>
                        <a href="{{ route('pengembalian.reset-filter') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-md transition duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Reset Filter
                        </a>
                    </div>
                </div>
            </form>
        </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Returns Card -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500 transition duration-300 hover:shadow-lg">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 mr-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Pengembalian</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $pengembalianHistory->count() }}</p>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Perkembangan</span>
                    <span class="text-sm font-medium text-green-600">+12% bulan ini</span>
                </div>
                <div class="w-full h-2 bg-gray-100 rounded-full mt-2">
                    <div class="h-2 bg-green-500 rounded-full" style="width: 75%"></div>
                </div>
            </div>
        </div>
        
        <!-- Monthly Returns Card -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500 transition duration-300 hover:shadow-lg">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 mr-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Bulan Ini</p>
                    <p class="text-2xl font-bold text-gray-800">
                        {{ $pengembalianHistory->filter(function($entry) {
                            return \Carbon\Carbon::parse($entry->tanggal_pengembalian)->isCurrentMonth();
                        })->count() }}
                    </p>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">Minggu Ini</span>
                    <span class="font-medium text-blue-600">
                        {{ $pengembalianHistory->filter(function($entry) {
                            return \Carbon\Carbon::parse($entry->tanggal_pengembalian)->isCurrentWeek();
                        })->count() }}
                    </span>
                </div>
            </div>
        </div>
        
        <!-- Total Users Card -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500 transition duration-300 hover:shadow-lg">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 mr-4">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Pengguna</p>
                    <p class="text-2xl font-bold text-gray-800">
                        {{ $pengembalianHistory->pluck('name')->unique()->count() }}
                    </p>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div class="flex flex-col">
                        <span class="text-gray-500">Aktif Bulan Ini</span>
                        <span class="font-medium text-purple-600">
                            {{ $pengembalianHistory->filter(function($entry) {
                                return \Carbon\Carbon::parse($entry->tanggal_pengembalian)->isCurrentMonth();
                            })->pluck('name')->unique()->count() }}
                        </span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-500">% Return Rate</span>
                        <span class="font-medium text-purple-600">87.5%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Content Section -->
    <div class="bg-white rounded-xl shadow-lg p-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Riwayat Pengembalian</h2>
                <p class="text-gray-600">Daftar lengkap history pengembalian barang dan tempat</p>
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('pengembalian.export-csv') }}" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-md transition duration-200 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Export CSV
                </a>
            </div>
        </div>

        <!-- Table View (Default) -->
        <div id="tableView" class="overflow-hidden rounded-xl border border-gray-200">
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-4 text-left font-semibold text-gray-600">No</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            <div class="flex items-center cursor-pointer sort-column" data-column="name">
                                Nama User
                                <svg class="w-4 h-4 ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                                </svg>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            <div class="flex items-center cursor-pointer sort-column" data-column="tanggal">
                                Tanggal Pengembalian
                                <svg class="w-4 h-4 ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                                </svg>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-600">Nama Barang/Tempat</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-600">Mapel</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-600">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($pengembalianHistory as $index => $entry)
                        <tr class="hover:bg-gray-50 transition duration-150 data-row" 
                            data-tanggal="{{ $entry->tanggal_pengembalian ?? '-' }}"
                            data-status="{{ $entry->status ?? 'Approved' }}">
                            <td class="px-6 py-4 text-center text-gray-800">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-gray-800 font-medium">{{ $entry->name }}</td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ isset($entry->tanggal_pengembalian) ? \Carbon\Carbon::parse($entry->tanggal_pengembalian)->format('d M Y') : '-' }}
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $entry->barang_tempat ?? $entry->ruang_tempat ?? '-' }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                                    {{ $entry->mapel ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if(isset($entry->status) && $entry->status == 'Rejected')
                                    <span class="px-3 py-1 text-sm font-medium text-red-800 bg-red-100 rounded-full">
                                        {{ $entry->status }}
                                    </span>
                                    <div class="mt-1 text-xs text-gray-500 italic">{{ $entry->alasan ?? 'Tidak ada alasan' }}</div>
                                @else
                                    <span class="px-3 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                                        {{ $entry->status ?? 'Approved' }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                    <p class="text-lg font-medium">Tidak ada data riwayat pengembalian</p>
                                    <p class="text-gray-400">Data riwayat pengembalian akan muncul di sini</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Card View (Alternative) -->
        <div id="cardView" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 hidden">
            @forelse ($pengembalianHistory as $index => $entry)
                <div class="bg-white rounded-lg shadow border border-gray-100 p-4 data-card"
                     data-tanggal="{{ $entry->tanggal_pengembalian ?? '-' }}"
                     data-status="{{ $entry->status ?? 'Approved' }}">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-semibold text-gray-900">{{ $entry->name }}</h3>
                        <div>
                            @if(isset($entry->status) && $entry->status == 'Rejected')
                                <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                                    {{ $entry->status }}
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                    {{ $entry->status ?? 'Approved' }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="text-sm text-gray-600 mb-3">
                        <div class="flex items-center mb-1">
                            <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ isset($entry->tanggal_pengembalian) ? \Carbon\Carbon::parse($entry->tanggal_pengembalian)->format('d M Y') : '-' }}
                        </div>
                        <div class="flex items-center mb-1">
                            <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ $entry->mapel ?? '-' }}
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                            </svg>
                            {{ $entry->barang_tempat ?? $entry->ruang_tempat ?? '-' }}
                        </div>
                    </div>
                    <div class="flex justify-end space-x-2 mt-2 pt-2 border-t border-gray-100">
                        <button class="view-details text-blue-600 hover:text-blue-800 p-1" data-id="{{ $entry->id }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                        <button class="print-card text-gray-600 hover:text-gray-800 p-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-3 bg-white rounded-lg shadow border border-gray-100 p-8 text-center">
                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <p class="text-lg font-medium">Tidak ada data riwayat pengembalian</p>
                    <p class="text-gray-400">Data riwayat pengembalian akan muncul di sini</p>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination (Optional) -->
        <div class="mt-6 flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Menampilkan <span class="font-medium">{{ $pengembalianHistory->count() }}</span> dari <span class="font-medium">{{ $pengembalianHistory->count() }}</span> data
            </div>
            <div class="flex space-x-1">
                <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50 disabled:opacity-50" disabled>
                    ‹ Sebelumnya
                </button>
                <button class="px-3 py-1 rounded border border-gray-300 bg-blue-50 text-blue-600 font-medium">1</button>
                <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50 disabled:opacity-50" disabled>
                    Selanjutnya ›
                </button>
            </div>
        </div>
    </div>
    
    <!-- Modal Detail -->
    <div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-xl max-w-lg w-full mx-4 overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b flex justify-between items-center">
                <h3 class="text-lg font-bold text-gray-800">Detail Pengembalian</h3>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="p-6" id="modalContent">
                <!-- Content will be dynamically populated -->
            </div>
            <div class="bg-gray-50 px-6 py-3 border-t flex justify-end">
                <button id="closeModalBtn" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition duration-200">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        // DOM elements
        const searchInput = document.getElementById('searchInput');
        const filterTanggal = document.getElementById('filterTanggal');
        const filterStatus = document.getElementById('filterStatus');
        const resetFilter = document.getElementById('resetFilter');
        const tableRows = document.querySelectorAll('.data-row');
        const cardItems = document.querySelectorAll('.data-card');
        const tableView = document.getElementById('tableView');
        const cardView = document.getElementById('cardView');
        const toggleViewBtn = document.getElementById('toggleView');
        const exportDataBtn = document.getElementById('exportData');
        const detailModal = document.getElementById('detailModal');
        const closeModal = document.getElementById('closeModal');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modalContent = document.getElementById('modalContent');
        const viewDetailsButtons = document.querySelectorAll('.view-details');
        const printRowButtons = document.querySelectorAll('.print-row');
        const printCardButtons = document.querySelectorAll('.print-card');
        const sortColumns = document.querySelectorAll('.sort-column');
        
        // Filter functionality
        function applyFilters() {
            const searchTerm = searchInput.value.toLowerCase();
            const dateFilter = filterTanggal.value;
            const statusFilter = filterStatus.value;
            
            // Filter table rows
            tableRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                const rowDate = row.getAttribute('data-tanggal');
                const rowStatus = row.getAttribute('data-status');
                
                const matchSearch = rowText.includes(searchTerm);
                const matchDate = !dateFilter || (rowDate && rowDate.includes(dateFilter));
                const matchStatus = !statusFilter || (rowStatus === statusFilter);
                
                if (matchSearch && matchDate && matchStatus) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
            
            // Filter card items
            cardItems.forEach(card => {
                const cardText = card.textContent.toLowerCase();
                const cardDate = card.getAttribute('data-tanggal');
                const cardStatus = card.getAttribute('data-status');
                
                const matchSearch = cardText.includes(searchTerm);
                const matchDate = !dateFilter || (cardDate && cardDate.includes(dateFilter));
                const matchStatus = !statusFilter || (cardStatus === statusFilter);
                
                if (matchSearch && matchDate && matchStatus) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }
        
        // Event listeners for filters
        searchInput.addEventListener('input', applyFilters);
        filterTanggal.addEventListener('change', applyFilters);
        filterStatus.addEventListener('change', applyFilters);
        
        // Reset filters
        resetFilter.addEventListener('click', function() {
            searchInput.value = '';
            filterTanggal.value = '';
            filterStatus.value = '';
            applyFilters();
        });
        
        // Toggle view between table and cards
        toggleViewBtn.addEventListener('click', function() {
            if (tableView.classList.contains('hidden')) {
                tableView.classList.remove('hidden');
                cardView.classList.add('hidden');
                this.innerHTML = `
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                    </svg>
                    Card View
                `;
            } else {
                tableView.classList.add('hidden');
                cardView.classList.remove('hidden');
                this.innerHTML = `
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                    Table View
                `;
            }
        });
        
        // View details modal functionality
        function openDetailModal(id) {
            // Get the data row or card
            const historyData = @json($historyData ?? []);
            const entry = historyData[id];
            
            if (!entry) return;
            
            // Populate modal content
            let content = `
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <div>
                            <h4 class="font-medium text-gray-900">Nama User</h4>
                            <p class="text-gray-700">${entry.name || '-'}</p>
                        </div>
                        <div>
                            <span class="px-3 py-1 text-sm font-medium ${entry.status === 'Rejected' ? 'text-red-800 bg-red-100' : 'text-green-800 bg-green-100'} rounded-full">
                                ${entry.status || 'Approved'}
                            </span>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h4 class="font-medium text-gray-900">Tanggal Pengembalian</h4>
                            <p class="text-gray-700">${entry.tanggal_pengembalian ? formatDate(entry.tanggal_pengembalian) : '-'}</p>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Mata Pelajaran</h4>
                            <p class="text-gray-700">${entry.mapel || '-'}</p>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="font-medium text-gray-900">Barang/Tempat</h4>
                        <p class="text-gray-700">${entry.barangTempat || entry.ruangTempat || '-'}</p>
                    </div>
                    
                    ${entry.status === 'Rejected' ? `
                    <div class="bg-red-50 p-3 rounded-lg border border-red-100">
                        <h4 class="font-medium text-red-900">Alasan Penolakan</h4>
                        <p class="text-red-700">${entry.alasan || 'Tidak ada alasan yang diberikan'}</p>
                    </div>
                    ` : ''}
                    
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <h4 class="font-medium text-gray-900">Informasi Tambahan</h4>
                        <div class="grid grid-cols-2 gap-2 mt-2 text-sm">
                            <div>
                                <span class="text-gray-500">Diajukan pada:</span>
                                <span class="font-medium">${entry.tanggal_pengajuan ? formatDate(entry.tanggal_pengajuan) : '-'}</span>
                            </div>
                            <div>
                                <span class="text-gray-500">Kondisi:</span>
                                <span class="font-medium">${entry.kondisi || 'Baik'}</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            modalContent.innerHTML = content;
            detailModal.classList.remove('hidden');
        }
        
        // Close modal functionality
        function closeDetailModal() {
            detailModal.classList.add('hidden');
        }
        
        // Format date helper function
        function formatDate(dateString) {
            const date = new Date(dateString);
            const day = date.getDate().toString().padStart(2, '0');
            const month = new Intl.DateTimeFormat('id-ID', { month: 'short' }).format(date);
            const year = date.getFullYear();
            return `${day} ${month} ${year}`;
        }
        
        // Event listeners for view details buttons
        viewDetailsButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                openDetailModal(id);
            });
        });
        
        // Close modal event listeners
        closeModal.addEventListener('click', closeDetailModal);
        closeModalBtn.addEventListener('click', closeDetailModal);
        detailModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeDetailModal();
            }
        });
        
        // Print functionality
        function printRecord(data) {
            const printWindow = window.open('', '_blank');
            
            // Create print content
            const printContent = `
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Bukti Pengembalian</title>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <style>
                        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
                        .receipt { max-width: 800px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; }
                        .header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px; }
                        .title { font-size: 24px; font-weight: bold; margin: 10px 0; }
                        .subtitle { font-size: 16px; color: #666; margin-bottom: 20px; }
                        .content { margin-bottom: 30px; }
                        .info-row { display: flex; margin-bottom: 10px; }
                        .info-label { width: 200px; font-weight: bold; }
                        .info-value { flex: 1; }
                        .footer { text-align: center; margin-top: 30px; font-size: 14px; color: #666; }
                        .status { display: inline-block; padding: 5px 10px; border-radius: 15px; font-weight: bold; }
                        .approved { background-color: #e6f4ea; color: #137333; }
                        .rejected { background-color: #fce8e6; color: #c5221f; }
                        @media print {
                            body { padding: 0; }
                            .receipt { border: none; }
                            .no-print { display: none; }
                        }
                    </style>
                </head>
                <body>
                    <div class="receipt">
                        <div class="header">
                            <h1 class="title">Bukti Pengembalian</h1>
                            <p class="subtitle">Sistem Manajemen Pengembalian</p>
                        </div>
                        
                        <div class="content">
                            <div class="info-row">
                                <div class="info-label">Nama User:</div>
                                <div class="info-value">${data.name || '-'}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Tanggal Pengembalian:</div>
                                <div class="info-value">${data.tanggal_pengembalian ? formatDate(data.tanggal_pengembalian) : '-'}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Barang/Tempat:</div>
                                <div class="info-value">${data.barangTempat || data.ruangTempat || '-'}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Mata Pelajaran:</div>
                                <div class="info-value">${data.mapel || '-'}</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Status:</div>
                                <div class="info-value">
                                    <span class="status ${data.status === 'Rejected' ? 'rejected' : 'approved'}">
                                        ${data.status || 'Approved'}
                                    </span>
                                </div>
                            </div>
                            ${data.status === 'Rejected' ? `
                            <div class="info-row">
                                <div class="info-label">Alasan Penolakan:</div>
                                <div class="info-value">${data.alasan || 'Tidak ada alasan'}</div>
                            </div>
                            ` : ''}
                            <div class="info-row">
                                <div class="info-label">Kondisi:</div>
                                <div class="info-value">${data.kondisi || 'Baik'}</div>
                            </div>
                        </div>
                        
                        <div class="footer">
                            <p>Dokumen ini dibuat secara otomatis dan tidak memerlukan tanda tangan.</p>
                            <p>Dicetak pada: ${new Date().toLocaleString('id-ID')}</p>
                        </div>
                    </div>
                    
                    <div class="no-print" style="text-align: center; margin-top: 20px;">
                        <button onclick="window.print()" style="padding: 8px 16px; background: #4285f4; color: white; border: none; border-radius: 4px; cursor: pointer;">
                            Cetak Bukti
                        </button>
                    </div>
                </body>
                </html>
            `;
            
            printWindow.document.open();
            printWindow.document.write(printContent);
            printWindow.document.close();
            
            // Wait for resources to load before printing
            printWindow.onload = function() {
                // Auto print or let user print manually through the button
                // printWindow.print();
            };
        }
        
        // Print row event listeners
        printRowButtons.forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const index = Array.from(tableRows).indexOf(row);
                const historyData = @json($historyData ?? []);
                printRecord(historyData[index]);
            });
        });
        
        // Print card event listeners
        printCardButtons.forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.data-card');
                const index = Array.from(cardItems).indexOf(card);
                const historyData = @json($historyData ?? []);
                printRecord(historyData[index]);
            });
        });
        
        // Export functionality
        exportDataBtn.addEventListener('click', function() {
            const historyData = @json($historyData ?? []);
            if (historyData.length === 0) {
                alert('Tidak ada data untuk diekspor');
                return;
            }
            
            // Convert data to CSV
            let csvContent = "data:text/csv;charset=utf-8,";
            csvContent += "No,Nama User,Tanggal Pengembalian,Barang/Tempat,Mapel,Status\n";
            
            historyData.forEach((entry, index) => {
                const formattedDate = entry.tanggal_pengembalian ? formatDate(entry.tanggal_pengembalian) : '-';
                const row = [
                    index + 1,
                    entry.name || '-',
                    formattedDate,
                    entry.barangTempat || entry.ruangTempat || '-',
                    entry.mapel || '-',
                    entry.status || 'Approved'
                ].map(value => `"${value}"`).join(",");
                csvContent += row + "\n";
            });
            
            // Create download link
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", `pengembalian_export_${new Date().toISOString().split('T')[0]}.csv`);
            document.body.appendChild(link);
            
            // Download file
            link.click();
            document.body.removeChild(link);
        });
        
        // Sorting functionality
        sortColumns.forEach(column => {
            column.addEventListener('click', function() {
                const dataColumn = this.getAttribute('data-column');
                const historyData = @json($historyData ?? []);
                
                // Toggle sort direction
                const currentDirection = this.getAttribute('data-direction') || 'asc';
                const newDirection = currentDirection === 'asc' ? 'desc' : 'asc';
                this.setAttribute('data-direction', newDirection);
                
                // Update icons to show sort direction
                sortColumns.forEach(col => {
                    if (col !== this) {
                        col.querySelector('svg').innerHTML = `
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                        `;
                    } else {
                        col.querySelector('svg').innerHTML = newDirection === 'asc' 
                            ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 15l4 4 4-4m0-12l-4-4-4 4"/>`
                            : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>`;
                    }
                });
                
                // TODO: Implement actual sorting based on dataColumn and direction
                // This would require a backend implementation or a page reload with sorting parameters
                // For now, we'll just show an alert
                alert(`Sorting by ${dataColumn} in ${newDirection} order would be implemented with backend support`);
            });
        });
    });
</script>
@endpush
@endsection