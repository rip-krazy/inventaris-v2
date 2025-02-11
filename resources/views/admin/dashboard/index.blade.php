@extends('main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-6 ml-32 mt-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ml-32"> <!-- Added ml-32 for right offset -->
        <!-- Header Section with enhanced styling -->
        <div class="text-center mb-12 animate__animated animate__fadeIn">
            <h1 class="text-5xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-3">Dashboard Admin</h1>
            <p class="text-gray-600 text-lg">Sistem Manajemen Inventaris</p>
            <div class="mt-4 w-32 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
        </div>

        <!-- Quick Summary Bar -->
        <div class="bg-white p-4 rounded-xl shadow-md mb-8 animate__animated animate__fadeIn">
            <div class="flex justify-around items-center">
                <div class="text-center">
                    <span class="text-sm font-medium text-gray-500">Today's Users</span>
                    <div class="text-2xl font-bold text-blue-600">{{ $jumlahPengguna }}</div>
                </div>
                <div class="h-12 w-px bg-gray-200"></div>
                <div class="text-center">
                    <span class="text-sm font-medium text-gray-500">Active Items</span>
                    <div class="text-2xl font-bold text-green-600">{{ $totalbarang }}</div>
                </div>
                <div class="h-12 w-px bg-gray-200"></div>
                <div class="text-center">
                    <span class="text-sm font-medium text-gray-500">Pending Returns</span>
                    <div class="text-2xl font-bold text-red-600">5</div>
                </div>
            </div>
        </div>

        <!-- Stats Grid with enhanced styling -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- User Card with glass morphism effect -->
            <div class="bg-white bg-opacity-60 backdrop-filter backdrop-blur-lg rounded-xl shadow-xl overflow-hidden hover:transform hover:scale-105 transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500 opacity-10 rounded-full transform translate-x-16 -translate-y-16"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg">
                            <i class="fas fa-users text-2xl text-white"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Total Users</h2>
                            <p class="text-3xl font-bold text-blue-600 mt-1">{{ $jumlahPengguna }}</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-blue-500">
                        <i class="fas fa-chart-line mr-2"></i>
                        <span class="text-sm font-medium">Active Members</span>
                    </div>
                </div>
            </div>

            <!-- Returned Items Card -->
            <div class="bg-white bg-opacity-60 backdrop-filter backdrop-blur-lg rounded-xl shadow-xl overflow-hidden hover:transform hover:scale-105 transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-green-500 opacity-10 rounded-full transform translate-x-16 -translate-y-16"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 576 512">
                                <path d="M248 0L208 0c-26.5 0-48 21.5-48 48l0 112c0 35.3 28.7 64 64 64l128 0c35.3 0 64-28.7 64-64l0-112c0-26.5-21.5-48-48-48L328 0l0 80c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-80z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Barang Kembali</h2>
                            <p class="text-3xl font-bold text-green-600 mt-1">20</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-green-500">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span class="text-sm font-medium">On Time Returns</span>
                    </div>
                </div>
            </div>

            <!-- Unreturned Items Card with new design -->
            <div class="bg-white bg-opacity-60 backdrop-filter backdrop-blur-lg rounded-xl shadow-xl overflow-hidden hover:transform hover:scale-105 transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-red-500 opacity-10 rounded-full transform translate-x-16 -translate-y-16"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg">
                            <i class="fas fa-exclamation-triangle text-2xl text-white"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Belum Kembali</h2>
                            <p class="text-3xl font-bold text-red-600 mt-1">5</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-red-500">
                        <i class="fas fa-clock mr-2"></i>
                        <span class="text-sm font-medium">Needs Attention</span>
                    </div>
                </div>
            </div>

            <!-- Total Items Card with 3D effect -->
            <div class="bg-white bg-opacity-60 backdrop-filter backdrop-blur-lg rounded-xl shadow-xl overflow-hidden hover:transform hover:scale-105 transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500 opacity-10 rounded-full transform translate-x-16 -translate-y-16"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg">
                            <i class="fas fa-box text-2xl text-white"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Total Barang</h2>
                            <p class="text-3xl font-bold text-purple-600 mt-1">{{ $totalbarang }}</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-purple-500">
                        <i class="fas fa-database mr-2"></i>
                        <span class="text-sm font-medium">In Inventory</span>
                    </div>
                </div>
            </div>

            <!-- Approval Status Card -->
            <div class="bg-white bg-opacity-60 backdrop-filter backdrop-blur-lg rounded-xl shadow-xl overflow-hidden hover:transform hover:scale-105 transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-500 opacity-10 rounded-full transform translate-x-16 -translate-y-16"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl shadow-lg">
                            <i class="fas fa-clipboard-check text-2xl text-white"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Persetujuan</h2>
                            <p class="text-3xl font-bold text-yellow-600 mt-1">25</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-yellow-500">
                        <i class="fas fa-hourglass-half mr-2"></i>
                        <span class="text-sm font-medium">Pending Review</span>
                    </div>
                </div>
            </div>

            <!-- Item Condition Summary Card -->
            <div class="bg-white bg-opacity-60 backdrop-filter backdrop-blur-lg rounded-xl shadow-xl overflow-hidden hover:transform hover:scale-105 transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-500 opacity-10 rounded-full transform translate-x-16 -translate-y-16"></div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">Kondisi Barang</h2>
                            <div class="mt-4 space-y-2">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                    <span class="text-sm font-medium text-gray-600">Baik: {{ $jumlahBarangBaik }}</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-red-500 rounded-full mr-2"></div>
                                    <span class="text-sm font-medium text-gray-600">Rusak: {{ $jumlahBarangRusak }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl shadow-lg">
                            <i class="fas fa-tasks text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection