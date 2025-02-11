@extends('home')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<title>Data Barang</title>

<div class="w-screen mt-32 ml-72 mr-10 bg-white rounded-xl shadow-2xl p-12 my-10 animate__animated animate__fadeIn">
    <h1 class="text-4xl font-extrabold mb-8 text-center text-gray-800 border-b pb-4">
        <i class="fas fa-box mr-2 text-green-600"></i>Data Barang
    </h1>

    <!-- Form Pencarian dan Tombol Tambah Data -->
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

    <!-- Table -->
    <div class="overflow-hidden rounded-xl shadow-lg">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-green-600 text-white">
                    <th class="py-4 px-6 text-center font-semibold">Nama Barang</th>
                    <th class="py-4 px-6 text-center font-semibold">Kode Barang</th>
                    <th class="py-4 px-6 text-center font-semibold">Kondisi Barang</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $barang)
                    <tr class="hover:bg-green-50 transition duration-150">
                        <td class="py-4 px-6 border-b text-center">{{ $barang->nama_barang }}</td>
                        <td class="py-4 px-6 border-b text-center">{{ $barang->kode_barang }}</td>
                        <td class="py-4 px-6 border-b text-center">{{ $barang->kondisi_barang }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Controls -->
    <div class="mt-8 flex justify-between items-center bg-white p-4 rounded-lg shadow">
        <button class="px-4 py-2 {{ $barangs->onFirstPage() ? 'text-gray-400 cursor-not-allowed' : 'text-green-600 hover:text-green-700' }} transition duration-200">
            <i class="fas fa-chevron-left mr-1"></i>
            Previous
        </button>

        <div class="flex items-center">
            <span class="px-4 py-2 bg-green-100 text-green-700 rounded-lg">
                Page {{ $barangs->currentPage() }} of {{ $barangs->lastPage() }}
            </span>
        </div>

        <button class="px-4 py-2 {{ !$barangs->hasMorePages() ? 'text-gray-400 cursor-not-allowed' : 'text-green-600 hover:text-green-700' }} transition duration-200">
            Next
            <i class="fas fa-chevron-right ml-1"></i>
        </button>
    </div>
</div>

@endsection
