@extends('main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<title>Daftar Ruang Sekolah</title>

<div class="w-100 mx-24 bg-gradient-to-br from-white to-green-50 rounded-xl shadow-2xl p-10 my-10 animate__animated animate__fadeIn">
    <h1 class="text-4xl font-bold mb-8 text-center text-gray-800 border-b pb-4">
        <i class="fas fa-door-open mr-2 text-green-600"></i> Daftar Ruang Sekolah
    </h1>

    <!-- Form Pencarian dan Tombol Tambah Data -->
    <div class="mb-8 flex justify-between items-center gap-4">
        <!-- Form Pencarian -->
        <form action="{{ route('ruang.index') }}" method="GET" class="flex items-center space-x-4 flex-1">
            <div class="relative flex-1">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                <input type="text" 
                       name="search" 
                       value="{{ old('search', $search) }}" 
                       placeholder="Cari Ruangan..." 
                       class="pl-10 pr-4 py-2 border-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" />
            </div>
            <button type="submit" 
                    class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200 flex items-center gap-2">
                <i class="fas fa-search"></i>
                Cari
            </button>
        </form>

        <!-- Tombol Tambah Ruangan -->
        <a href="{{ route('ruang.create') }}" 
           class="px-6 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200 flex items-center gap-2">
            <i class="fas fa-plus"></i>
            Tambah Ruangan
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 animate__animated animate__fadeIn">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Tabel Daftar Ruang -->
    <div class="overflow-hidden rounded-xl shadow-lg">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-green-600 text-white">
                    <th class="py-4 px-12 text-center font-semibold">No</th>
                    <th class="py-4 px-12 text-center font-semibold">Ruang</th>
                    <th class="py-4 px-12 text-center font-semibold">Keterangan</th>
                    <th class="py-4 px-12 text-center font-semibold">Detail</th>
                    <th class="py-4 px-12 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ruangs as $ruang)
                <tr class="hover:bg-green-50 transition duration-150">
                    <td class="py-4 px-12 border-b text-center">{{ $loop->iteration }}</td>
                    <td class="py-4 px-12 border-b text-center">{{ $ruang->name }}</td>
                    <td class="py-4 px-12 border-b text-center">{{ $ruang->description }}</td>
                    <td class="py-4 px-12 border-b text-center">
                        <a href="{{ url('detailruang/' . $ruang->id) }}" 
                           class="text-green-600 hover:text-green-800 transition duration-200">
                            <i class="fas fa-info-circle"></i> Detail
                        </a>
                    </td>
                    <td class="py-4 px-12 border-b text-center">
                        <div class="flex justify-center gap-3">
                            <a href="{{ route('ruang.edit', $ruang) }}" 
                               class="text-blue-500 hover:text-blue-700 transition duration-200">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('ruang.destroy', $ruang) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Apakah Data Akan Dihapus?')" class="inline">
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
        <button class="px-4 py-2 {{ $ruangs->onFirstPage() ? 'text-gray-400 cursor-not-allowed' : 'text-green-600 hover:text-green-700' }} transition duration-200">
            <i class="fas fa-chevron-left mr-1"></i>
            Previous
        </button>

        <div class="flex items-center">
            <span class="px-4 py-2 bg-green-100 text-green-700 rounded-lg">
                Page {{ $ruangs->currentPage() }} of {{ $ruangs->lastPage() }}
            </span>
        </div>

        <button class="px-4 py-2 {{ !$ruangs->hasMorePages() ? 'text-gray-400 cursor-not-allowed' : 'text-green-600 hover:text-green-700' }} transition duration-200">
            Next
            <i class="fas fa-chevron-right ml-1"></i>
        </button>
    </div>
</div>
@endsection