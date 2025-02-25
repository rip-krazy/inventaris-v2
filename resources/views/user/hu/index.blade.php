@extends('home')

@section('content')
<div class="w-100 mx-24 mt-12 animate__animated animate__fadeIn">
    <!-- Header Section with Stats -->
    <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 mr-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Pengembalian</p>
                    <p class="text-xl font-semibold text-gray-800">{{ count($pengembalianHistory) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 mr-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Bulan Ini</p>
                    <p class="text-xl font-semibold text-gray-800">{{ count(array_filter($pengembalianHistory, function($entry) {
                        return \Carbon\Carbon::parse($entry['tanggal_pengembalian'])->isCurrentMonth();
                    })) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 mr-4">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Pengguna</p>
                    <p class="text-xl font-semibold text-gray-800">{{ count(array_unique(array_column($pengembalianHistory, 'name'))) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white rounded-xl shadow-lg p-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Riwayat Pengembalian</h2>
            <p class="text-gray-600">Daftar lengkap history pengembalian barang dan tempat</p>
        </div>

        <!-- Search and Filter -->
        <div class="mb-6 flex flex-wrap gap-4 items-center justify-between">
            <div class="relative flex-1 max-w-md">
                <input type="text" 
                       placeholder="Cari riwayat..." 
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            
            <input type="date" id="filterTanggal" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
        </div>

        <!-- Table -->
        <div class="overflow-hidden rounded-xl border border-gray-200">
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-4 text-left font-semibold text-gray-600">No</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-600">Nama User</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-600">Tanggal Pengembalian</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-600">Nama Barang/Tempat</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-600">Mapel</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-600">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200" id="tableBody">
                    @forelse ($pengembalianHistory as $index => $entry)
                    <tr class="hover:bg-gray-50 transition duration-150" data-tanggal="{{ $entry['tanggal_pengembalian'] }}">
                        <td class="px-6 py-4 text-center text-gray-800">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-gray-800">{{ $entry['name'] }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ \Carbon\Carbon::parse($entry['tanggal_pengembalian'])->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-gray-600"> {{ $entry['barangTempat'] ?? $entry['ruangTempat'] ?? '-' }}</td>
                        <td class="px-6 py-4 text-green-800">{{ $entry['mapel'] }}</td>
                        <td class="px-6 py-4 text-blue-800">Selesai</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"/>
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
    </div>
</div>
@endsection
