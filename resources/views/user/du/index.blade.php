@extends('home')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

<!-- Main container with modern gradient background -->
<div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-100 py-6 mr-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ml-32">
        <!-- Header Section -->
        <div class="text-center mb-10 transform transition-all duration-500 opacity-100">
            <div class="inline-block p-2 px-4 bg-blue-100 rounded-full mb-3">
                <svg class="w-4 h-4 text-blue-600 inline mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                </svg>
                <span class="text-sm font-medium text-blue-600">Dashboard Pengguna</span>
            </div>
            <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-500 to-indigo-600 mb-3">Dashboard User</h1>
            <p class="text-gray-600 text-lg">Manajemen Peminjaman Barang</p>
            <div class="mt-4 w-32 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
        </div>

        <!-- Welcome Card with Today's Date -->
        <div class="bg-white p-6 rounded-xl shadow-md mb-8 transform transition-all duration-500 opacity-100 border-l-4 border-blue-500">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Selamat Datang, <span class="text-blue-600">User</span>!</h2>
                    <p class="text-gray-600 mt-1">
                        <span id="current-date"></span>
                    </p>
                    <script>
                        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                        document.getElementById('current-date').textContent = new Date().toLocaleDateString('id-ID', options);
                    </script>
                </div>
                <div class="hidden md:block">
                    <div class="flex space-x-3">
                        <button class="flex items-center justify-center p-2 bg-blue-100 text-blue-600 rounded-full hover:bg-blue-200 transition-all">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                            </svg>
                        </button>
                        <button class="flex items-center justify-center p-2 bg-purple-100 text-purple-600 rounded-full hover:bg-purple-200 transition-all">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="flex items-center justify-center p-2 bg-green-100 text-green-600 rounded-full hover:bg-green-200 transition-all">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Summary Bar -->
        <div class="bg-white p-6 rounded-xl shadow-lg mb-8 transform transition-all duration-500 opacity-100 hover:shadow-xl transition-all duration-300">
            <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                <svg class="w-5 h-5 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                </svg>
                Ringkasan Cepat
            </h3>
            <div class="flex flex-wrap justify-around items-center gap-4">
                <div class="text-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-all duration-300 min-w-32">
                    <svg class="w-6 h-6 text-blue-500 mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                    </svg>
                    <span class="block text-sm font-medium text-gray-500">Jumlah Peminjaman</span>
                    <div class="text-2xl font-bold text-blue-600 mt-1">10</div>
                </div>
                <div class="text-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-all duration-300 min-w-32">
                    <svg class="w-6 h-6 text-green-500 mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17A3 3 0 015 5zm10 8a3 3 0 01-5 2.236 3 3 0 01-4.83-2H4a2 2 0 110-4h5v1a1 1 0 102 0V9h5a2 2 0 110 4h-1.17A3 3 0 0115 13z" clip-rule="evenodd" />
                    </svg>
                    <span class="block text-sm font-medium text-gray-500">Barang Dipinjam</span>
                    <div class="text-2xl font-bold text-green-600 mt-1">{{ $totalbarang }}</div>
                </div>
                <div class="text-center p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition-all duration-300 min-w-32">
                    <svg class="w-6 h-6 text-yellow-500 mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                    <span class="block text-sm font-medium text-gray-500">Menunggu Persetujuan</span>
                    <div class="text-2xl font-bold text-yellow-600 mt-1">25</div>
                </div>
                <div class="text-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-all duration-300 min-w-32">
                    <svg class="w-6 h-6 text-purple-500 mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span class="block text-sm font-medium text-gray-500">Total Pengembalian</span>
                    <div class="text-2xl font-bold text-purple-600 mt-1">20</div>
                </div>
            </div>
        </div>

     
        <!-- Stats Grid with improved cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Total Users Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform transition-all duration-500 opacity-100">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500 opacity-10 rounded-full transform translate-x-16 -translate-y-16"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg">
                            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Jumlah Peminjam</h2>
                            <p class="text-3xl font-bold text-blue-600 mt-1">10</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full w-4/5"></div>
                        </div>
                        <div class="flex justify-between mt-1">
                            <span class="text-xs text-gray-500">Dari target 15</span>
                            <span class="text-xs font-medium text-blue-600">70%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Returned Items Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform transition-all duration-500 opacity-100">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-green-500 opacity-10 rounded-full transform translate-x-16 -translate-y-16"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg">
                            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Sudah Dikembalikan</h2>
                            <p class="text-3xl font-bold text-green-600 mt-1">20</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <div class="flex items-center text-green-500">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-medium">Tepat Waktu</span>
                        </div>
                        <span class="text-sm font-medium text-green-500">
                            <svg class="w-4 h-4 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            15%
                        </span>
                    </div>
                </div>
            </div>

            <!-- Borrowed Items Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform transition-all duration-500 opacity-100">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-500 opacity-10 rounded-full transform translate-x-16 -translate-y-16"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl shadow-lg">
                            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Sedang Dipinjam</h2>
                            <p class="text-3xl font-bold text-yellow-600 mt-1">25</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <div class="flex items-center text-yellow-500">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-medium">Aktif</span>
                        </div>
                        <div class="text-sm bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full">
                            Perlu pengembalian: 5
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Items Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform transition-all duration-500 opacity-100">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500 opacity-10 rounded-full transform translate-x-16 -translate-y-16"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg">
                            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Total Barang</h2>
                            <p class="text-3xl font-bold text-purple-600 mt-1">{{ $totalbarang }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between mb-1">
                            <span class="text-xs font-medium text-gray-700">Tersedia (80%)</span>
                            <span class="text-xs font-medium text-gray-700">Dipinjam (20%)</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-purple-600 h-2.5 rounded-l-full w-4/5"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Approvals Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform transition-all duration-500 opacity-100">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-orange-500 opacity-10 rounded-full transform translate-x-16 -translate-y-16"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl shadow-lg">
                            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Menunggu Persetujuan</h2>
                            <p class="text-3xl font-bold text-orange-600 mt-1">5</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-gray-500">
                                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-xs font-medium">Menunggu approval</span>
                            </div>
                            <button class="text-xs bg-orange-100 text-orange-700 px-2 py-1 rounded-full hover:bg-orange-200 transition-all">
                                Lihat Semua
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>

        <!-- Quick Action Buttons -->
        <div class="bg-white p-6 ml-32 rounded-xl shadow-md mb-8 transform transition-all duration-500 opacity-100">
            <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                <svg class="w-5 h-5 text-indigo-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                </svg>
                Aksi Cepat
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ url('peminjaman') }}" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-all">
                    <div class="p-2 bg-blue-200 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-800">Pinjam Barang</h4>
                        <p class="text-xs text-gray-500 mt-1">Buat peminjaman baru</p>
                    </div>
                </a>
                <a href="{{ url('pu') }}" class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-all">
                    <div class="p-2 bg-green-200 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-800">Kembalikan</h4>
                        <p class="text-xs text-gray-500 mt-1">Proses pengembalian</p>
                    </div>
                </a>
                <a href="{{ url('hu') }}" class="flex items-center p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition-all">
                    <div class="p-2 bg-yellow-200 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-800">Riwayat</h4>
                        <p class="text-xs text-gray-500 mt-1">Lihat riwayat peminjaman</p>
                    </div>
                </a>
                <a href="#" class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-all">
                    <div class="p-2 bg-purple-200 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-800">Bantuan</h4>
                        <p class="text-xs text-gray-500 mt-1">Pusat bantuan</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center py-6 ml-20 text-gray-500 text-sm">
            <p>&copy; 2025 - Sistem Peminjaman Barang</p>
        </footer>
    </div>
</div>

<!-- JavaScript -->
<script>
    // Animation for cards on scroll
    document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('translate-y-0', 'opacity-100');
                    entry.target.classList.remove('translate-y-4', 'opacity-0');
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.transform').forEach(el => {
            observer.observe(el);
        });
    });
</script>

@endsection