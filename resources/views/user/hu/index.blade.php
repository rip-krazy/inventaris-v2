@extends('home')

@section('content')
<div class="w-100 mx-16 mt-6 animate__animated animate__fadeIn">
    <!-- Dashboard Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard Pengembalian</h1>
        <p class="text-gray-600 mt-2">Pantau dan kelola riwayat pengembalian barang dan tempat</p>
    </div>

    <!-- Stat Cards -->
    <div class="mb-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @php
            $statsData = [
                ['title' => 'Total Pengembalian', 'value' => $pengembalianHistory->count(), 'color' => 'green', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['title' => 'Bulan Ini', 'value' => $pengembalianHistory->filter(fn($entry) => \Carbon\Carbon::parse($entry->tanggal_pengembalian)->isCurrentMonth())->count(), 'color' => 'blue', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                ['title' => 'Total Pengguna', 'value' => 1, 'color' => 'purple', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z']
            ];
        @endphp
        
        @foreach($statsData as $stat)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all p-6 border-l-4 border-{{ $stat['color'] }}-500 overflow-hidden relative group">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-{{ $stat['color'] }}-100 mr-4 group-hover:bg-{{ $stat['color'] }}-200 transition-all">
                    <svg class="w-7 h-7 text-{{ $stat['color'] }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">{{ $stat['title'] }}</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stat['value'] }}</p>
                </div>
            </div>
            <div class="absolute -right-2 -bottom-3 opacity-5 group-hover:opacity-10 transition-opacity">
                <svg class="w-24 h-24 text-{{ $stat['color'] }}-800" fill="currentColor" viewBox="0 0 24 24">
                    <path d="{{ $stat['icon'] }}"/>
                </svg>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Main Content -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Header with Delete History Button -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 px-8 py-6 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-white">Riwayat Pengembalian</h2>
                <p class="text-green-100 mt-1">Daftar lengkap history pengembalian barang dan tempat</p>
            </div>
            
            <!-- Dropdown Delete History -->
            <div class="relative">
                <button id="deleteHistoryDropdownButton" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="toggleDeleteDropdown()">
                    Hapus Riwayat
                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div id="deleteHistoryDropdown" class="hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 z-30">
                    <div class="py-1">
                        @php
                            $deleteOptions = [
                                ['key' => '24jam', 'label' => 'Hapus riwayat 24 jam terakhir', 'class' => 'text-gray-700 hover:bg-gray-100'],
                                ['key' => '7hari', 'label' => 'Hapus riwayat 7 hari terakhir', 'class' => 'text-gray-700 hover:bg-gray-100'],
                                ['key' => '30hari', 'label' => 'Hapus riwayat 30 hari terakhir', 'class' => 'text-gray-700 hover:bg-gray-100'],
                                ['key' => 'semua', 'label' => 'Hapus semua riwayat', 'class' => 'text-red-600 hover:bg-red-50']
                            ];
                        @endphp
                        @foreach($deleteOptions as $option)
                        <button onclick="openDeleteModal('{{ $option['key'] }}')" class="block w-full text-left px-4 py-2 text-sm {{ $option['class'] }}">{{ $option['label'] }}</button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="p-6 border-b border-gray-100">
            <form action="{{ route('hu.filter') }}" method="GET" class="flex flex-col md:flex-row flex-wrap gap-4 items-start md:items-center">
                <div class="relative flex-1 min-w-[250px]">
                    <svg class="absolute left-3 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="search" placeholder="Cari nama barang, tempat, atau mapel..." value="{{ $filters['search'] ?? '' }}" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
                
                <div class="flex flex-wrap gap-3 items-center">
                    <div class="relative">
                        <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <input type="date" name="tanggal" value="{{ $filters['tanggal'] ?? '' }}" class="pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    
                    <div class="relative">
                        <select name="status" class="pl-4 pr-10 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent appearance-none bg-white">
                            <option value="">Semua Status</option>
                            <option value="Approved" {{ isset($filters['status']) && $filters['status'] == 'Approved' ? 'selected' : '' }}>Selesai</option>
                            <option value="Rejected" {{ isset($filters['status']) && $filters['status'] == 'Rejected' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        <svg class="pointer-events-none absolute right-2 top-3 w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    
                    <button type="submit" class="px-5 py-2.5 bg-green-500 text-white rounded-lg hover:bg-green-600 transition flex items-center justify-center min-w-[80px] font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                        </svg>
                        Filter
                    </button>
                    
                    <a href="{{ route('hu.reset') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition flex items-center justify-center min-w-[80px] font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-50">
                        @php
                            $headers = ['No', 'Tanggal Pengembalian', 'Nama Barang/Tempat', 'Mapel', 'Status', 'Alasan (jika ditolak)'];
                        @endphp
                        @foreach($headers as $header)
                        <th class="px-6 py-4 text-left font-semibold text-gray-600 uppercase text-xs tracking-wider">{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="tableBody">
                    @forelse ($pengembalianHistory as $index => $entry)
                    <tr class="hover:bg-gray-50 transition-colors animate__animated animate__fadeIn" data-tanggal="{{ $entry->tanggal_pengembalian }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ \Carbon\Carbon::parse($entry->tanggal_pengembalian)->format('d M Y') }}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $entry->barang_tempat ?? $entry->ruang_tempat ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <span class="px-2.5 py-1 bg-green-50 text-green-700 rounded-full text-xs font-medium">
                                {{ $entry->mapel ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            @if($entry->status == 'Rejected')
                                <span class="px-2.5 py-1 bg-red-50 text-red-700 rounded-full text-xs font-medium flex items-center w-fit">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                    Ditolak
                                </span>
                            @else
                                <span class="px-2.5 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium flex items-center w-fit">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Selesai
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-red-600">
                            @if($entry->status == 'Rejected' && $entry->alasan)
                                <button type="button" class="text-red-500 underline decoration-dotted hover:text-red-700 focus:outline-none text-sm" onclick="openAlasanModal('{{ $entry->id }}', '{{ htmlspecialchars($entry->alasan) }}')">
                                    Lihat alasan
                                </button>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center animate__animated animate__fadeIn">
                                <div class="rounded-full bg-gray-100 p-4 mb-4">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"/>
                                    </svg>
                                </div>
                                <p class="text-xl font-medium text-gray-800 mb-1">Tidak ada data</p>
                                <p class="text-gray-500">Riwayat pengembalian akan muncul di sini</p>
                                <button class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition text-sm">
                                    Buat Pengembalian Baru
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
            <p class="text-sm text-gray-600">Menampilkan {{ $pengembalianHistory->count() }} data</p>
        </div>
    </div>
</div>

<!-- Modal for "Lihat alasan" -->
<div id="alasanModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" onclick="closeAlasanModal()">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Alasan Penolakan</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500" id="modal-content"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeAlasanModal()">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Delete History Confirmation -->
<div id="deleteHistoryModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" onclick="closeDeleteModal()">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="delete-modal-title">Konfirmasi Hapus Riwayat</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500" id="delete-modal-content"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <form id="deleteHistoryForm" action="{{ route('hu.deleteHistory') }}" method="POST" class="inline">
                    @csrf
                    <input type="hidden" name="time_range" id="deleteTimeRange" value="">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Hapus
                    </button>
                </form>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeDeleteModal()">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    const modalFunctions = {
        openAlasanModal(id, alasan) {
            document.getElementById('modal-content').innerText = alasan;
            document.getElementById('alasanModal').classList.remove('hidden');
        },
        closeAlasanModal() {
            document.getElementById('alasanModal').classList.add('hidden');
        },
        toggleDeleteDropdown() {
            document.getElementById('deleteHistoryDropdown').classList.toggle('hidden');
        },
        openDeleteModal(timeRange) {
            const modalTitle = document.getElementById('delete-modal-title');
            const modalContent = document.getElementById('delete-modal-content');
            const deleteTimeRange = document.getElementById('deleteTimeRange');
            
            deleteTimeRange.value = timeRange;
            
            const messages = {
                '24jam': 'Apakah Anda yakin ingin menghapus semua riwayat pengembalian dari 24 jam terakhir? Tindakan ini tidak dapat dibatalkan.',
                '7hari': 'Apakah Anda yakin ingin menghapus semua riwayat pengembalian dari 7 hari terakhir? Tindakan ini tidak dapat dibatalkan.',
                '30hari': 'Apakah Anda yakin ingin menghapus semua riwayat pengembalian dari 30 hari terakhir? Tindakan ini tidak dapat dibatalkan.',
                'semua': 'Apakah Anda yakin ingin menghapus SEMUA riwayat pengembalian? Tindakan ini tidak dapat dibatalkan dan akan menghapus seluruh data pengembalian.'
            };
            
            modalTitle.innerText = timeRange === 'semua' ? 'Hapus Semua Riwayat?' : 'Konfirmasi Hapus Riwayat';
            modalContent.innerText = messages[timeRange];
            document.getElementById('deleteHistoryModal').classList.remove('hidden');
            document.getElementById('deleteHistoryDropdown').classList.add('hidden');
        },
        closeDeleteModal() {
            document.getElementById('deleteHistoryModal').classList.add('hidden');
        }
    };

    // Assign functions to window
    Object.assign(window, modalFunctions);

    // Event listeners
    document.addEventListener('DOMContentLoaded', function() {
        // Close dropdown when clicking outside
        window.addEventListener('click', function(event) {
            const dropdown = document.getElementById('deleteHistoryDropdown');
            const dropdownButton = document.getElementById('deleteHistoryDropdownButton');
            
            if (!dropdown.contains(event.target) && !dropdownButton.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });

        // Escape key handler for modals
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                modalFunctions.closeAlasanModal();
                modalFunctions.closeDeleteModal();
            }
        });
    });
</script>
@endsection