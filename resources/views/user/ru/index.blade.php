@extends('home')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<title>Daftar ruang</title>

<div class="w-screen ml-72 mr-10 mt-32 bg-white rounded-lg shadow-lg p-10 my-10 animate__animated animate__fadeIn">
    <h1 class="text-2xl font-bold mb-6 text-center">Daftar ruang Sekolah</h1>

    <!-- Form Pencarian dan Tombol Tambah Data -->
    <div class="mb-6 flex justify-between items-center gap-4">
        <!-- Form Pencarian -->
        <form action="{{ route('ru.index') }}" method="GET" class="flex items-center space-x-4 flex-1">
            <div class="relative flex-1">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                <input type="text" 
                    name="search" 
                    value="{{ old('search', $search) }}" 
                    placeholder="Cari Ruang..." 
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
                    <th class="py-4 px-16 text-center font-semibold">No</th>
                    <th class="py-4 px-16 text-center font-semibold">Ruang</th>
                    <th class="py-4 px-16 text-center font-semibold">Keterangan</th>
                    <th class="py-4 px-16 text-center font-semibold">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ruangs as $index => $ruang)
                    <tr class="hover:bg-green-50 transition duration-150">
                        <td class="py-4 px-16 border-b text-center">{{ $index + 1 }}</td>
                        <td class="py-4 px-16 border-b text-center">{{ $ruang->name }}</td>
                        <td class="py-4 px-16 border-b text-center">{{ $ruang->description }}</td>
                        <td class="py-4 px-10 border-b text-center">
                            <a href="{{ url('dr') }}" class="text-green-600 hover:text-green-700 transition duration-200">Detail</a>
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
