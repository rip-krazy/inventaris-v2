@extends('main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<body class="bg-gradient-to-br from-white to-green-50 p-10">
    <div class="w-100 mx-24 bg-white rounded-xl shadow-2xl p-10 my-10 animate__animated animate__fadeIn">
        <h1 class="text-4xl font-bold mb-8 text-center text-gray-800 border-b pb-4">
            <i class="fas fa-box mr-2 text-green-600"></i> Detail Ruang: {{ $ruang->name }}
        </h1>

        <!-- Search and Add Button Section -->
        <div class="mb-8 flex justify-between items-center gap-4">
            <!-- Search Form -->
            <form action="{{ route('detailruang.index', $ruang->id) }}" method="GET" class="flex items-center space-x-4 flex-1">
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

            <!-- Add Button -->
            <a href="{{ route('detailruang.create', ['id' => $ruang->id]) }}" 
               class="px-6 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200 flex items-center gap-2">
                <i class="fas fa-plus"></i>
                Tambah Barang
            </a>
        </div>

        <!-- Search Results Message -->
        <div class="mb-4 text-gray-600">
            @if($search)
                <div class="flex items-center gap-2">
                    <i class="fas fa-filter"></i>
                    <span>Hasil pencarian untuk: <strong>{{ $search }}</strong></span>
                </div>
            @else
                <div class="flex items-center gap-2">
                    <i class="fas fa-list"></i>
                    <span>Menampilkan semua data barang</span>
                </div>
            @endif
        </div>

        <!-- Table Section -->
        <div class="overflow-hidden rounded-xl shadow-lg">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-green-600 text-white">
                        <th class="py-4 px-6 text-center font-semibold">Nama Barang</th>
                        <th class="py-4 px-6 text-center font-semibold">Kode Barang</th>
                        <th class="py-4 px-6 text-center font-semibold">Kondisi Barang</th>
                        <th class="py-4 px-6 text-center font-semibold">QR Code</th>
                        <th class="py-4 px-6 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detailruangs as $detailruang)
                        <tr class="hover:bg-green-50 transition duration-150">
                            <td class="py-4 px-6 border-b text-center">{{ $detailruang->nama_barang }}</td>
                            <td class="py-4 px-6 border-b text-center">{{ $detailruang->kode_barang }}</td>
                            <td class="py-4 px-6 border-b text-center">
                                <span class="px-3 py-1 rounded-full text-sm {{ $detailruang->kondisi_barang === 'Baik' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $detailruang->kondisi_barang }}
                                </span>
                            </td>
                          <!-- Di dalam file index.blade.php, bagian QR Code -->
                            <td class="py-4 px-6 border-b text-center">
                                <a href="{{ route('detailruang.showItem', $detailruang->id) }}" target="_blank">
                                    <img src="{{ asset('assets/img/qr-code.svg') }}" alt="QR Code" 
                                        class="transition-transform transform hover:scale-110 hover:opacity-80 duration-300 ease-in-out mx-auto" 
                                        width="40" height="40">
                                </a>
                            </td>
                            <td class="py-4 px-6 border-b text-center">
                                <div class="flex justify-center gap-3">
                                    <a href="{{ route('detailruang.edit', $detailruang) }}" 
                                       class="text-blue-500 hover:text-blue-700 transition duration-200">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('detailruang.destroy', $detailruang) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('Apakah Data Akan Dihapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-500 hover:text-red-700 transition duration-200">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Controls -->
        <div class="mt-8 flex justify-between items-center bg-white p-4 rounded-lg shadow">
            <button class="px-4 py-2 {{ $detailruangs->onFirstPage() ? 'text-gray-400 cursor-not-allowed' : 'text-green-600 hover:text-green-700' }} transition duration-200">
                <i class="fas fa-chevron-left mr-1"></i>
                Previous
            </button>

            <div class="flex items-center">
                <span class="px-4 py-2 bg-green-100 text-green-700 rounded-lg">
                    Page {{ $detailruangs->currentPage() }} of {{ $detailruangs->lastPage() }}
                </span>
            </div>

            <button class="px-4 py-2 {{ !$detailruangs->hasMorePages() ? 'text-gray-400 cursor-not-allowed' : 'text-green-600 hover:text-green-700' }} transition duration-200">
                Next
                <i class="fas fa-chevron-right ml-1"></i>
            </button>
        </div>

        <!-- Back Button -->
        <div class="mt-6">
            <a href="{{ route('ruang.index') }}" 
               class="inline-flex items-center px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-200">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>
</body>
@endsection