@extends('home')
@section('content')
<div class="w-screen mt-32 ml-72 mr-10 animate_animated animate_fadeIn">
    <!-- Card Container -->
    <div class="bg-white rounded-xl shadow-2xl p-8 transition-all duration-300 hover:shadow-3xl">
        <!-- Title Section -->
        <div class="mb-8 text-center">
            <h2 class="text-4xl font-bold bg-gradient-to-r from-green-600 to-green-400 bg-clip-text text-transparent">
                Riwayat Transaksi
            </h2>
            <p class="text-gray-600 mt-2">Daftar lengkap transaksi Anda</p>
        </div>

        <!-- Search and Filter Section -->
        <div class="mb-6 flex justify-between items-center">
            <div class="relative">
                <input type="text" 
                       placeholder="Cari transaksi..." 
                       class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
            </div>
            <div class="flex gap-3">
                <!-- Time Period Filter -->
                <select class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500">
                    <option value="">Pilih Periode</option>
                    <option value="this_week">Minggu Ini</option>
                    <option value="last_week">Minggu Lalu</option>
                    <option value="this_month">Bulan Ini</option>
                    <option value="last_month">Bulan Lalu</option>
                    <option value="3_months">3 Bulan Terakhir</option>
                    <option value="6_months">6 Bulan Terakhir</option>
                    <option value="custom">Periode Kustom</option>
                </select>
                
                <!-- Custom Date Range (initially hidden, can be shown when 'custom' is selected using JavaScript) -->
                <div class="hidden flex gap-2">
                    <input type="date" class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500" placeholder="Tanggal Mulai">
                    <input type="date" class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500" placeholder="Tanggal Akhir">
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="overflow-hidden rounded-xl border border-gray-100 shadow-sm">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gradient-to-r from-green-600 to-green-500">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white">No</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white">Nama Transaksi</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white">Tanggal</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white">Mapel</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($pengembalianHistory as $index => $history)
                        <tr class="group hover:bg-green-50 transition-all duration-200">
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $history['name'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $history['tanggal_pengembalian'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $history['mapel'] }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-sm font-medium text-green-700 bg-green-100 rounded-full">
                                    Sukses
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Enhanced Pagination -->
        <div class="mt-6 flex items-center justify-between">
            <p class="text-sm text-gray-600">
                Menampilkan 1-10 dari 50 transaksi
            </p>
            <div class="flex gap-2">
                <button class="px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    Previous
                </button>
                <button class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">
                    1
                </button>
                <button class="px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    2
                </button>
                <button class="px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    Next
                </button>
            </div>
        </div>
    </div>
</div>
@endsection