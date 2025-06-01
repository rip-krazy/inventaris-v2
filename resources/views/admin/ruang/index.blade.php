@extends('main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<title>Daftar Ruang Sekolah</title>

<div class="w-100 mx-16 bg-white rounded-xl shadow-2xl p-10 my-10 animate__animated animate__fadeIn">
    <!-- Header Section -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8 animate__animated animate__fadeIn">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">
                <i class="fas fa-door-open text-green-600 mr-3"></i>Daftar Ruang Sekolah
            </h1>
            
            <!-- Search and Add Button -->
            <div class="mt-4 md:mt-0 flex flex-col sm:flex-row gap-4">
                <form action="{{ route('ruang.index') }}" method="GET" class="flex-1 flex">
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" 
                               name="search" 
                               value="{{ old('search', $search) }}" 
                               placeholder="Cari ruangan..." 
                               class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200">
                    </div>
                    <button type="submit" 
                            class="ml-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center">
                        <i class="fas fa-search mr-2"></i>Cari
                    </button>
                </form>
                
                <a href="{{ route('ruang.create') }}" 
                   class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center justify-center">
                    <i class="fas fa-plus mr-2"></i>Tambah Ruangan
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

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded animate__animated animate__fadeIn">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-3"></i>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <!-- Search Results Info -->
        @if($search)
            <div class="mb-6 p-4 bg-blue-100 border-l-4 border-blue-500 text-blue-700 rounded">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fas fa-search mr-2"></i>
                        <span>
                            Menampilkan hasil pencarian untuk: <strong>"{{ $search }}"</strong> 
                            ({{ $ruangs->total() }} dari {{ $totalRuangs }} ruangan)
                        </span>
                    </div>
                    <a href="{{ route('ruang.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
                        <i class="fas fa-times-circle mr-1"></i>Hapus Filter
                    </a>
                </div>
            </div>
        @endif

        <!-- Summary Cards -->
        <div class="bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-lg shadow-inner border border-green-200">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="flex items-center justify-center">
                    <div class="p-3 rounded-full bg-green-200 text-green-700 mr-3">
                        <i class="fas fa-door-open text-xl"></i>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-gray-600">Total Ruangan</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalRuangs }}</p>
                    </div>
                </div>
                
                <div class="flex items-center justify-center">
                    <div class="p-3 rounded-full bg-blue-200 text-blue-700 mr-3">
                        <i class="fas fa-clipboard-list text-xl"></i>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-gray-600">Dengan Keterangan</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $ruangsWithDescription }}</p>
                    </div>
                </div>
                
                <div class="flex items-center justify-center">
                    <div class="p-3 rounded-full bg-yellow-200 text-yellow-700 mr-3">
                        <i class="fas fa-exclamation-triangle text-xl"></i>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-gray-600">Tanpa Keterangan</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $ruangsWithoutDescription }}</p>
                    </div>
                </div>
                
                <div class="flex items-center justify-center">
                    <div class="p-3 rounded-full bg-purple-200 text-purple-700 mr-3">
                        <i class="fas fa-eye text-xl"></i>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-gray-600">Ditampilkan</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $ruangs->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Empty State -->
    @if($ruangs->count() == 0)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden animate__animated animate__fadeInUp">
            <div class="px-6 py-8 text-center">
                <div class="flex flex-col items-center justify-center text-gray-500">
                    <i class="fas fa-door-open text-4xl mb-4 text-gray-300"></i>
                    <p class="text-lg">
                        @if($search)
                            Tidak ada ruangan yang ditemukan
                        @else
                            Belum ada data ruangan
                        @endif
                    </p>
                    <p class="text-gray-500 mb-6">
                        @if($search)
                            Coba gunakan kata kunci pencarian yang berbeda
                        @else
                            Mulai dengan menambahkan ruangan pertama Anda
                        @endif
                    </p>
                    @if(!$search)
                        <a href="{{ route('ruang.create') }}" class="mt-4 text-green-600 hover:text-green-800 flex items-center">
                            <i class="fas fa-plus-circle mr-2"></i>Tambah Ruangan Pertama
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @else
        <!-- Main Table Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden animate__animated animate__fadeInUp">
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-green-600 text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Ruang</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Keterangan</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Detail</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($ruangs as $ruang)
                        <tr class="hover:bg-green-50 transition-colors duration-150">
                            <!-- Row Number -->
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                                {{ ($ruangs->currentPage() - 1) * $ruangs->perPage() + $loop->iteration }}
                            </td>
                            
                            <!-- Room Name -->
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-800">
                                <div class="flex items-center justify-left">
                                    <div class="p-2 rounded-full bg-green-100 text-green-600 mr-3">
                                        <i class="fas fa-door-open"></i>
                                    </div>
                                    {{ $ruang->name }}
                                </div>
                            </td>
                            
                            <!-- Di bagian Description -->
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @if(str_contains($ruang->description, 'Dipinjam'))
                                    @php
                                        // Ekstrak informasi peminjaman dari description
                                        $descParts = explode('(', $ruang->description);
                                        $peminjamInfo = trim($descParts[0] ?? '');
                                        $waktuInfo = isset($descParts[1]) ? '('.trim($descParts[1]) : '';
                                    @endphp
                                    <div class="flex flex-col items-center space-y-1">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            <i class="fas fa-door-closed mr-1"></i>
                                            Sedang Dipinjam
                                        </span>
                                        <span class="text-xs text-gray-600">{{ Str::limit($peminjamInfo, 25) }}</span>
                                        <span class="text-xs text-gray-500">{{ $waktuInfo }}</span>
                                    </div>
                                @elseif(str_contains($ruang->description, 'Tersedia'))
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        <i class="fas fa-door-open mr-1"></i>
                                        Tersedia
                                    </span>
                                @elseif($ruang->description && $ruang->description != '')
                                    <div class="flex flex-col items-center space-y-1">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            <i class="fas fa-info-circle mr-1"></i>
                                            Keterangan
                                        </span>
                                        <span class="text-xs text-gray-600">{{ Str::limit($ruang->description, 30) }}</span>
                                    </div>
                                @else
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-exclamation-triangle mr-1"></i>
                                        Belum ada keterangan
                                    </span>
                                @endif
                            </td>
                            
                            <!-- Detail Button -->
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <a href="{{ url('detailruang/' . $ruang->id) }}" 
                                   class="text-blue-600 hover:text-blue-900 bg-blue-100 hover:bg-blue-200 px-4 py-2 rounded-lg transition-colors duration-200 flex items-center mx-auto justify-center">
                                    <i class="fas fa-eye mr-2"></i>
                                    Detail
                                </a>
                            </td>
                            
                            <!-- Action Buttons -->
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('ruang.edit', $ruang) }}" 
                                       class="px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded flex items-center justify-center transition-colors duration-200"
                                       title="Edit Ruangan">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>
                                    <form action="{{ route('ruang.destroy', $ruang) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus ruangan {{ $ruang->name }}? Data ini tidak dapat dikembalikan.')" 
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white text-sm rounded flex items-center justify-center transition-colors duration-200"
                                                title="Hapus Ruangan">
                                            <i class="fas fa-trash mr-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($ruangs->count() > 0)
            <div class="mt-8 flex justify-between items-center bg-white p-4 rounded-lg shadow">
                <a href="{{ $ruangs->appends(request()->query())->previousPageUrl() }}"
                   class="px-4 py-2 {{ $ruangs->onFirstPage() ? 'text-gray-400 cursor-not-allowed pointer-events-none' : 'text-green-600 hover:text-green-700' }} transition duration-200">
                    <i class="fas fa-chevron-left mr-1"></i>Previous
                </a>

                <div class="flex items-center">
                    <span class="px-4 py-2 bg-green-100 text-green-700 rounded-lg">
                        Page {{ $ruangs->currentPage() }} of {{ $ruangs->lastPage() }}
                    </span>
                </div>

                <a href="{{ $ruangs->appends(request()->query())->nextPageUrl() }}"
                   class="px-4 py-2 {{ !$ruangs->hasMorePages() ? 'text-gray-400 cursor-not-allowed pointer-events-none' : 'text-green-600 hover:text-green-700' }} transition duration-200">
                    Next<i class="fas fa-chevron-right ml-1"></i>
                </a>
            </div>
            @endif
        </div>
    @endif

    <!-- Footer Info -->
    <div class="mt-8 text-center text-gray-500 text-sm">
        <i class="fas fa-info-circle mr-1"></i>
        Sistem Manajemen Ruang Sekolah - Diperbarui {{ now()->format('d M Y H:i') }}
    </div>
</div>

@endsection