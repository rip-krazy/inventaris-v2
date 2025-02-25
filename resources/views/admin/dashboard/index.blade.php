@extends('main')
@section('content')

<!-- Improved CSS Libraries -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Chart.js untuk visualisasi data -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<!-- ApexCharts untuk grafik yang lebih menarik -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.0/apexcharts.min.js"></script>
<!-- SweetAlert2 untuk notifikasi yang lebih menarik -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.3.0/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.3.0/sweetalert2.min.css">

<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
    }
    
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .notification-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #ff4d4d;
        color: white;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .gradient-text {
        background: linear-gradient(45deg, #3b82f6, #8b5cf6, #ec4899);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        background-size: 300% 300%;
        animation: gradient-shift 8s ease infinite;
    }
    
    @keyframes gradient-shift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    .pulse {
        animation: pulse-animation 2s infinite;
    }
    
    @keyframes pulse-animation {
        0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); }
        70% { box-shadow: 0 0 0 10px rgba(239, 68, 68, 0); }
        100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
    }
    
    /* Loader untuk efek loading */
    .loader {
        border-top-color: #3498db;
        -webkit-animation: spinner 1.5s linear infinite;
        animation: spinner 1.5s linear infinite;
    }
    
    @-webkit-keyframes spinner {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }
    
    @keyframes spinner {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-6 mr-24 relative">
    <!-- Particle Effect Background -->
    <div id="particles-js" class="absolute inset-0 z-0"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ml-32 relative z-10"> <!-- Added ml-32 for right offset -->
        <!-- Header Section with enhanced styling -->
        <div class="text-center mb-12 animate__animated animate__fadeIn">
            <h1 class="text-5xl font-bold gradient-text mb-3">Dashboard Admin</h1>
            <p class="text-gray-600 text-lg">Sistem Manajemen Inventaris</p>
            <div class="mt-4 w-40 h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 mx-auto rounded-full"></div>
        </div>
        
        <!-- Notification Banner - New Feature -->
        <div id="notification-banner" class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-lg mb-8 shadow-md flex justify-between animate__animated animate__fadeIn hidden">
            <div class="flex items-center">
                <i class="fas fa-info-circle text-blue-500 mr-3 text-xl"></i>
                <span>Selamat datang di dashboard baru! Lihat fitur-fitur baru kami.</span>
            </div>
            <button id="close-notification" class="text-blue-500 hover:text-blue-700">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Date & Time - New Feature -->
        <div class="flex justify-between items-center mb-8">
            <div class="glass-card p-4 rounded-xl flex items-center space-x-3 card-hover transition-all duration-300">
                <i class="fas fa-calendar-alt text-purple-600 text-xl"></i>
                <div>
                    <h3 class="text-gray-700 font-medium" id="current-date">Loading...</h3>
                    <p class="text-gray-500 text-sm" id="current-time">Loading...</p>
                </div>
            </div>
            
            <!-- Quick Actions - New Feature -->
            <div class="flex space-x-4">
                <button id="refresh-btn" class="px-4 py-2 bg-white shadow-md rounded-lg flex items-center space-x-2 hover:bg-gray-50 transition-all card-hover">
                    <i class="fas fa-sync-alt text-blue-600"></i>
                    <span class="text-gray-700">Refresh</span>
                </button>
                <button id="notification-btn" class="px-4 py-2 bg-white shadow-md rounded-lg flex items-center space-x-2 hover:bg-gray-50 transition-all card-hover relative">
                    <i class="fas fa-bell text-yellow-500"></i>
                    <span class="text-gray-700">Notifikasi</span>
                    <span class="notification-badge">3</span>
                </button>
                <button onclick="window.location.href='{{ url('profile') }}'" 
                        class="px-4 py-2 bg-white shadow-md rounded-lg flex items-center space-x-2 hover:bg-gray-50 transition-all card-hover">
                    <i class="fas fa-cog text-gray-600"></i>
                    <span class="text-gray-700">Pengaturan</span>
                </button>
            </div>
        </div>

        <!-- Quick Summary Bar - Improved with hover effect -->
        <div class="glass-card p-5 rounded-xl shadow-lg mb-8 animate__animated animate__fadeIn transition-all duration-300 card-hover">
            <div class="flex justify-around items-center">
                <div class="text-center hover:scale-110 transition-transform duration-300 cursor-pointer" onclick="showUserDetails()">
                    <div class="text-blue-600 mb-2"><i class="fas fa-users text-3xl"></i></div>
                    <span class="text-sm font-medium text-gray-500">Total Pengguna</span>
                    <div class="text-2xl font-bold text-blue-600 counter" data-target="{{ $jumlahPengguna }}">0</div>
                </div>
                <div class="h-16 w-px bg-gray-200"></div>
                <div class="text-center hover:scale-110 transition-transform duration-300 cursor-pointer" onclick="showItemDetails()">
                    <div class="text-green-600 mb-2"><i class="fas fa-box-open text-3xl"></i></div>
                    <span class="text-sm font-medium text-gray-500">Barang Aktif</span>
                    <div class="text-2xl font-bold text-green-600 counter" data-target="{{ $totalbarang }}">0</div>
                </div>
                <div class="h-16 w-px bg-gray-200"></div>
                <div class="text-center hover:scale-110 transition-transform duration-300 cursor-pointer pulse" onclick="showPendingReturns()">
                    <div class="text-red-600 mb-2"><i class="fas fa-exclamation-circle text-3xl"></i></div>
                    <span class="text-sm font-medium text-gray-500">Pengembalian Tertunda</span>
                    <div class="text-2xl font-bold text-red-600 counter" data-target="5">0</div>
                </div>
                <div class="h-16 w-px bg-gray-200"></div>
                <div class="text-center hover:scale-110 transition-transform duration-300 cursor-pointer">
                    <div class="text-yellow-600 mb-2"><i class="fas fa-hourglass-half text-3xl"></i></div>
                    <span class="text-sm font-medium text-gray-500">Menunggu Persetujuan</span>
                    <div class="text-2xl font-bold text-yellow-600 counter" data-target="25">0</div>
                </div>
            </div>
        </div>
        
        <!-- Weather & System Status - New Feature -->
        <div class="flex mb-8 space-x-4">
            <div class="glass-card rounded-xl shadow-lg p-4 flex items-center space-x-4 w-1/2 card-hover transition-all duration-300">
                <div id="weather-icon" class="text-4xl text-yellow-500">
                    <i class="fas fa-sun"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Cuaca Hari Ini</h3>
                    <p class="text-gray-600">Jakarta, 32°C, Cerah</p>
                    <p class="text-xs text-gray-500">Diperbarui: <span id="weather-update-time">Hari ini, 08:15</span></p>
                </div>
            </div>
            <div class="glass-card rounded-xl shadow-lg p-4 flex items-center space-x-4 w-1/2 card-hover transition-all duration-300">
                <div class="text-4xl text-green-500">
                    <i class="fas fa-server"></i>
                </div>
                <div class="w-full">
                    <h3 class="text-lg font-semibold text-gray-800">Status Sistem</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Server Load:</span>
                        <div class="w-32 bg-gray-200 rounded-full h-2.5">
                            <div class="bg-green-500 h-2.5 rounded-full" style="width: 35%"></div>
                        </div>
                        <span class="text-sm text-gray-600">35%</span>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-gray-600">Database:</span>
                        <div class="w-32 bg-gray-200 rounded-full h-2.5">
                            <div class="bg-green-500 h-2.5 rounded-full" style="width: 28%"></div>
                        </div>
                        <span class="text-sm text-gray-600">28%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Row - New Feature -->
        <div class="flex space-x-6 mb-8">
            <div class="glass-card p-5 rounded-xl shadow-lg w-1/2 card-hover transition-all duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Peminjaman Barang (Bulan Ini)</h2>
                <div id="borrowing-chart" class="h-64"></div>
            </div>
            <div class="glass-card p-5 rounded-xl shadow-lg w-1/2 card-hover transition-all duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Kondisi Barang</h2>
                <div id="item-condition-chart" class="h-64"></div>
            </div>
        </div>

        <!-- Stats Grid with enhanced styling -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- User Card with glass morphism effect -->
            <div class="glass-card rounded-xl shadow-lg overflow-hidden card-hover transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-blue-500 opacity-10 rounded-full transform translate-x-20 -translate-y-20"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg">
                            <i class="fas fa-users text-2xl text-white"></i>
                        </div>
                        <div class="ml-4">
        <h2 class="text-xl font-semibold text-gray-800">Total Pengguna</h2>
        <p class="text-3xl font-bold text-blue-600 mt-1 counter">{{ $jumlahPengguna }}</p>
    </div>

                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-sm font-medium text-gray-700">Aktivitas Bulan Ini</span>
                            <span class="text-sm font-medium text-blue-600">87%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 87%"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-blue-500 cursor-pointer hover:underline" onclick="showUserList()">
                        <i class="fas fa-chart-line mr-2"></i>
                        <span class="text-sm font-medium">Lihat Semua Pengguna</span>
                    </div>
                </div>
            </div>

            <!-- Returned Items Card -->
            <div class="glass-card rounded-xl shadow-lg overflow-hidden card-hover transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-green-500 opacity-10 rounded-full transform translate-x-20 -translate-y-20"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 576 512">
                                <path d="M248 0L208 0c-26.5 0-48 21.5-48 48l0 112c0 35.3 28.7 64 64 64l128 0c35.3 0 64-28.7 64-64l0-112c0-26.5-21.5-48-48-48L328 0l0 80c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-80z"/>
                        </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Barang Kembali</h2>
                            <p class="text-3xl font-bold text-green-600 mt-1 counter" data-target="20">0</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">Kondisi Baik</span>
                            <span class="text-sm font-medium text-green-600">95%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-600 h-2 rounded-full" style="width: 95%"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-green-500 cursor-pointer hover:underline" onclick="showReturnedItems()">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span class="text-sm font-medium">Lihat Riwayat Pengembalian</span>
                    </div>
                </div>
            </div>

            <!-- Unreturned Items Card with new design -->
            <div class="glass-card rounded-xl shadow-lg overflow-hidden card-hover transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-red-500 opacity-10 rounded-full transform translate-x-20 -translate-y-20"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg">
                            <i class="fas fa-exclamation-triangle text-2xl text-white"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Belum Kembali</h2>
                            <p class="text-3xl font-bold text-red-600 mt-1 counter" data-target="5">0</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">Telat Pengembalian</span>
                            <span class="text-sm font-medium text-red-600">3</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-red-600 h-2 rounded-full" style="width: 60%"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-red-500 cursor-pointer hover:underline" onclick="showOverdueItems()">
                        <i class="fas fa-clock mr-2"></i>
                        <span class="text-sm font-medium">Lihat Item Telat</span>
                    </div>
                </div>
            </div>

            <!-- Total Items Card with 3D effect -->
            <div class="glass-card rounded-xl shadow-lg overflow-hidden card-hover transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-purple-500 opacity-10 rounded-full transform translate-x-20 -translate-y-20"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg">
                            <i class="fas fa-box text-2xl text-white"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Total Barang</h2>
                            <p class="text-3xl font-bold text-purple-600 mt-1 counter" data-target="{{ $totalbarang }}">0</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">Tersedia</span>
                            <span class="text-sm font-medium text-purple-600">75%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-purple-600 h-2 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-purple-500 cursor-pointer hover:underline" onclick="showInventory()">
                        <i class="fas fa-database mr-2"></i>
                        <span class="text-sm font-medium">Lihat Inventaris</span>
                    </div>
                </div>
            </div>

            <!-- Approval Status Card -->
            <div class="glass-card rounded-xl shadow-lg overflow-hidden card-hover transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-yellow-500 opacity-10 rounded-full transform translate-x-20 -translate-y-20"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl shadow-lg">
                            <i class="fas fa-clipboard-check text-2xl text-white"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Persetujuan</h2>
                            <p class="text-3xl font-bold text-yellow-600 mt-1 counter" data-target="25">0</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">Dalam Proses</span>
                            <span class="text-sm font-medium text-yellow-600">12</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-yellow-600 h-2 rounded-full" style="width: 48%"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-yellow-500 cursor-pointer hover:underline" onclick="showApprovals()">
                        <i class="fas fa-hourglass-half mr-2"></i>
                        <span class="text-sm font-medium">Tinjau Permintaan</span>
                    </div>
                </div>
            </div>

            <!-- Item Condition Summary Card -->
            <div class="glass-card rounded-xl shadow-lg overflow-hidden card-hover transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-indigo-500 opacity-10 rounded-full transform translate-x-20 -translate-y-20"></div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">Kondisi Barang</h2>
                            <div class="mt-4 space-y-2">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                    <span class="text-sm font-medium text-gray-600">Baik: <span class="counter" data-target="{{ $jumlahBarangBaik }}">0</span></span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                                    <span class="text-sm font-medium text-gray-600">Rusak: <span class="counter" data-target="{{ $jumlahBarangRusak }}">0</span></span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                                    <span class="text-sm font-medium text-gray-600">Maintenance: <span class="counter" data-target="5">0</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl shadow-lg">
                            <i class="fas fa-tasks text-2xl text-white"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-indigo-500 cursor-pointer hover:underline" onclick="showItemConditionReport()">
                        <i class="fas fa-chart-pie mr-2"></i>
                        <span class="text-sm font-medium">Lihat Laporan Lengkap</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Activity - New Feature -->
        <div class="glass-card rounded-xl shadow-lg p-6 mb-8 animate__animated animate__fadeIn">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Aktivitas Terkini</h2>
                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center" onclick="showAllActivities()">
                    Lihat Semua <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
            <div class="space-y-4" id="recent-activities">
                <div class="flex items-start p-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="p-2 bg-blue-100 rounded-full text-blue-600 mr-4">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="flex-grow">
                        <p class="text-gray-800 font-medium">Pengguna Baru</p>
                        <p class="text-gray-600 text-sm">Ahmad Rizky telah mendaftar sebagai pengguna baru</p>
                        <p class="text-gray-400 text-xs mt-1">Baru saja</p>
                    </div>
                </div>
                <div class="flex items-start p-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="p-2 bg-green-100 rounded-full text-green-600 mr-4">
                    <i class="fas fa-box-open text-xl"></i>
                    </div>
                    <div class="flex-grow">
                        <p class="text-gray-800 font-medium">Pengembalian Barang</p>
                        <p class="text-gray-600 text-sm">Budi Santoso mengembalikan 3 item</p>
                        <p class="text-gray-400 text-xs mt-1">15 menit yang lalu</p>
                    </div>
                </div>
                <div class="flex items-start p-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="p-2 bg-yellow-100 rounded-full text-yellow-600 mr-4">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="flex-grow">
                        <p class="text-gray-800 font-medium">Permintaan Baru</p>
                        <p class="text-gray-600 text-sm">Siti Nurhayati meminta peminjaman 2 laptop</p>
                        <p class="text-gray-400 text-xs mt-1">1 jam yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Stats - New Feature -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Top Items -->
            <div class="glass-card rounded-xl shadow-lg p-6 animate__animated animate__fadeIn card-hover transition-all duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Paling Sering Dipinjam</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                <i class="fas fa-laptop text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">p5</p>
                                <p class="text-xs text-gray-500">Ruangan</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-blue-600">32</p>
                            <p class="text-xs text-gray-500">peminjaman</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="p-2 bg-green-100 rounded-lg mr-3">
                                <i class="fas fa-camera text-green-600"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">Kamera DSLR Canon</p>
                                <p class="text-xs text-gray-500">Fotografi</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-green-600">28</p>
                            <p class="text-xs text-gray-500">peminjaman</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="p-2 bg-purple-100 rounded-lg mr-3">
                                <img src="\assets\img\projector.png" class="w-5">
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">Proyektor Epson</p>
                                <p class="text-xs text-gray-500">Elektronik</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-purple-600">24</p>
                            <p class="text-xs text-gray-500">peminjaman</p>
                        </div>
                    </div>
                </div>
                <button class="mt-4 text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center" onclick="showAllTopItems()">
                    Lihat Semua <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
            
            <!-- Top Users -->
            <div class="glass-card rounded-xl shadow-lg p-6 animate_animated animate_fadeIn card-hover transition-all duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Pengguna Paling Aktif</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="h-10 w-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">BS</div>
                            <div class="ml-3">
                                <p class="font-medium text-gray-800">Budi Santoso</p>
                                <p class="text-xs text-gray-500">Departemen IT</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-blue-600">18</p>
                            <p class="text-xs text-gray-500">peminjaman</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="h-10 w-10 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">SN</div>
                            <div class="ml-3">
                                <p class="font-medium text-gray-800">Siti Nurhayati</p>
                                <p class="text-xs text-gray-500">Departemen Marketing</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-green-600">15</p>
                            <p class="text-xs text-gray-500">peminjaman</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="h-10 w-10 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold">AR</div>
                            <div class="ml-3">
                                <p class="font-medium text-gray-800">Ahmad Rizky</p>
                                <p class="text-xs text-gray-500">Departemen Keuangan</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-purple-600">12</p>
                            <p class="text-xs text-gray-500">peminjaman</p>
                        </div>
                    </div>
                </div>
                <button class="mt-4 text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center" onclick="showAllTopUsers()">
                    Lihat Semua <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </div>
        
        <!-- Footer - New Feature -->
        <div class="mt-12 text-center text-gray-500 text-sm mb-6">
            <p>© 2025 Sistem Manajemen Inventaris. Semua hak dilindungi.</p>
        </div>
    </div>
</div>

<!-- ParticleJS for background effects -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>

<script>
    // Show notification banner
    setTimeout(() => {
        document.getElementById('notification-banner').classList.remove('hidden');
    }, 1000);
    
    // Close notification
    document.getElementById('close-notification').addEventListener('click', function() {
        document.getElementById('notification-banner').classList.add('hidden');
    });
    
    // Initialize Particles.js
    particlesJS("particles-js", {
        particles: {
            number: { value: 80, density: { enable: true, value_area: 800 } },
            color: { value: "#3b82f6" },
            shape: { type: "circle" },
            opacity: { value: 0.1, random: false },
            size: { value: 3, random: true },
            line_linked: {
                enable: true,
                distance: 150,
                color: "#3b82f6",
                opacity: 0.1,
                width: 1
            },
            move: {
                enable: true,
                speed: 2,
                direction: "none",
                random: false,
                straight: false,
                out_mode: "out",
                bounce: false
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: { enable: true, mode: "grab" },
                onclick: { enable: true, mode: "push" },
                resize: true
            },
            modes: {
                grab: { distance: 140, line_linked: { opacity: 0.3 } },
                push: { particles_nb: 4 }
            }
        },
        retina_detect: true
    });
    
    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    const speed = 200;
    
    counters.forEach(counter => {
        const animate = () => {
            const value = +counter.getAttribute('data-target');
            const data = +counter.innerText;
            const time = value / speed;
            
            if (data < value) {
                counter.innerText = Math.ceil(data + time);
                setTimeout(animate, 1);
            } else {
                counter.innerText = value;
            }
        }
        animate();
    });
    
    // Current Date & Time
    function updateDateTime() {
        const now = new Date();
        const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
        
        document.getElementById('current-date').textContent = now.toLocaleDateString('id-ID', dateOptions);
        document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID', timeOptions);
    }
    
    updateDateTime();
    setInterval(updateDateTime, 1000);
    
    // Refresh button functionality
    document.getElementById('refresh-btn').addEventListener('click', function() {
        // Show spinner
        this.innerHTML = '<i class="fas fa-circle-notch fa-spin text-blue-600"></i><span class="text-gray-700 ml-2">Memuat...</span>';
        
        // Simulate reload after 1 second
        setTimeout(() => {
            location.reload();
        }, 1000);
    });
    
    // Borrowing Chart
    var borrowingOptions = {
        series: [{
            name: 'Peminjaman',
            data: [31, 40, 35, 51, 49, 60, 70, 91, 125, 150, 170, 185]
        }],
        chart: {
            height: 250,
            type: 'line',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            },
            fontFamily: 'Inter, sans-serif'
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 3,
            colors: ['#3b82f6']
        },
        grid: {
            row: {
                colors: ['#f3f4f6', 'transparent'],
                opacity: 0.5
            }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        },
        tooltip: {
            theme: 'light',
            y: {
                formatter: function (val) {
                    return val + " peminjaman"
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.4,
                opacityFrom: 0.7,
                opacityTo: 0.2,
                stops: [0, 100]
            }
        }
    };

    var borrowingChart = new ApexCharts(document.querySelector("#borrowing-chart"), borrowingOptions);
    borrowingChart.render();
    
    // Item Condition Chart
    var itemConditionOptions = {
        series: [75, 20, 5],
        chart: {
            type: 'donut',
            height: 250,
            fontFamily: 'Inter, sans-serif'
        },
        labels: ['Baik', 'Perlu Maintenance', 'Rusak'],
        colors: ['#10b981', '#f59e0b', '#ef4444'],
        legend: {
            position: 'bottom'
        },
        dataLabels: {
            enabled: false
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '55%',
                    labels: {
                        show: true,
                        name: {
                            show: true
                        },
                        value: {
                            show: true,
                            formatter: function(val) {
                                return val + '%';
                            }
                        },
                        total: {
                            show: true,
                            label: 'Total',
                            formatter: function (w) {
                                return '100%';
                            }
                        }
                    }
                }
            }
        }
    };

    var itemConditionChart = new ApexCharts(document.querySelector("#item-condition-chart"), itemConditionOptions);
    itemConditionChart.render();
    
    // Notifications Button Action
    document.getElementById('notification-btn').addEventListener('click', function() {
        Swal.fire({
            title: 'Notifikasi',
            html: `
                <div class="text-left mb-4">
                    <div class="p-3 border-b flex items-start">
                        <div class="p-2 bg-blue-100 rounded-full text-blue-600 mr-3">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Peminjaman Disetujui</p>
                            <p class="text-sm text-gray-600">Permintaan peminjaman projector untuk meeting telah disetujui</p>
                            <p class="text-xs text-gray-400 mt-1">10 menit yang lalu</p>
                        </div>
                    </div>
                    <div class="p-3 border-b flex items-start">
                        <div class="p-2 bg-red-100 rounded-full text-red-600 mr-3">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Pengembalian Tertunda</p>
                            <p class="text-sm text-gray-600">Ahmad Rizky belum mengembalikan 2 laptop dalam tenggat waktu</p>
                            <p class="text-xs text-gray-400 mt-1">1 jam yang lalu</p>
                        </div>
                    </div>
                    <div class="p-3 flex items-start">
                        <div class="p-2 bg-green-100 rounded-full text-green-600 mr-3">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Barang Baru Ditambahkan</p>
                            <p class="text-sm text-gray-600">10 laptop baru telah ditambahkan ke inventaris</p>
                            <p class="text-xs text-gray-400 mt-1">3 jam yang lalu</p>
                        </div>
                    </div>
                </div>
            `,
            showConfirmButton: true,
            confirmButtonText: 'Lihat Semua',
            confirmButtonColor: '#3b82f6'
        });
    });
    
    // Settings Button Action
    document.getElementById('settings-btn').addEventListener('click', function() {
        Swal.fire({
            title: 'Pengaturan',
            html: `
                <div class="text-left">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mode Tampilan</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Light Mode</option>
                            <option>Dark Mode</option>
                            <option>System Default</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Notifikasi</label>
                        <div class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded mr-2" checked>
                            <span class="text-sm text-gray-700">Aktivasi notifikasi email</span>
                        </div>
                        <div class="flex items-center mt-2">
                            <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded mr-2" checked>
                            <span class="text-sm text-gray-700">Notifikasi dalam aplikasi</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Bahasa</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Indonesia</option>
                            <option>English</option>
                        </select>
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#3b82f6'
        });
    });
    
    // Simple function placeholders for demonstration
    function showUserDetails() {
        Swal.fire('Detail Pengguna', 'Fitur ini akan menampilkan detail informasi pengguna.', 'info');
    }
    
    function showItemDetails() {
        Swal.fire('Detail Barang', 'Fitur ini akan menampilkan detail informasi barang.', 'info');
    }
    
    function showPendingReturns() {
        Swal.fire('Pengembalian Tertunda', 'Fitur ini akan menampilkan daftar pengembalian tertunda.', 'info');
    }
    
    function showUserList() {
        Swal.fire('Daftar Pengguna', 'Fitur ini akan menampilkan daftar semua pengguna.', 'info');
    }
    
    function showReturnedItems() {
        Swal.fire('Riwayat Pengembalian', 'Fitur ini akan menampilkan riwayat pengembalian barang.', 'info');
    }
    
    function showOverdueItems() {
        Swal.fire('Item Telat', 'Fitur ini akan menampilkan daftar barang yang telat dikembalikan.', 'info');
    }
    
    function showInventory() {
        Swal.fire('Inventaris', 'Fitur ini akan menampilkan daftar lengkap inventaris.', 'info');
    }
    
    function showApprovals() {
        Swal.fire('Permintaan Persetujuan', 'Fitur ini akan menampilkan daftar permintaan yang perlu persetujuan.', 'info');
    }
    
    function showItemConditionReport() {
        Swal.fire('Laporan Kondisi Barang', 'Fitur ini akan menampilkan laporan lengkap kondisi barang.', 'info');
    }
    
    function showAllActivities() {
        Swal.fire('Semua Aktivitas', 'Fitur ini akan menampilkan semua aktivitas dalam sistem.', 'info');
    }
    
    function showAllTopItems() {
        Swal.fire('Item Populer', 'Fitur ini akan menampilkan daftar lengkap item yang paling sering dipinjam.', 'info');
    }
    
    function showAllTopUsers() {
        Swal.fire('Pengguna Aktif', 'Fitur ini akan menampilkan daftar lengkap pengguna paling aktif.', 'info');
    }
</script>
@endsection