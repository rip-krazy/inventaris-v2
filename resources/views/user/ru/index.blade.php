@extends('home')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<title>Daftar ruang</title>

<div class="w-100 mx-24 bg-gradient-to-br from-white to-green-50 rounded-xl shadow-2xl p-10 my-10 animate__animated animate__fadeIn">
    <h1 class="text-4xl font-bold mb-8 text-center text-gray-800 border-b pb-4">
        <i class="fas fa-door-open mr-2 text-green-600"></i> Daftar Ruang Sekolah
    </h1>

    <!-- Form Pencarian -->
    <div class="mb-8 flex justify-between items-center gap-4">
        <!-- Form Pencarian -->
        <form action="{{ route('ru.index') }}" method="GET" class="flex items-center space-x-4 flex-1">
            <div class="relative flex-1">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                <input type="text" 
                    name="search" 
                    value="{{ old('search', $search) }}" 
                    placeholder="Cari Ruang..." 
                    class="pl-10 pr-4 py-2 border-2 border-green-200 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" />
            </div>
            <button type="submit" 
                    class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200 flex items-center gap-2">
                <i class="fas fa-search"></i>
                Cari
            </button>
        </form>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 animate__animated animate__fadeIn">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Statistik Total Ruang -->
    <div class="mb-6 bg-white p-4 rounded-lg shadow">
        <div class="flex items-center justify-center">
            <i class="fas fa-door-open mr-2 text-green-600"></i>
            <span class="text-lg font-semibold text-gray-700">Total Ruang: {{ $ruangs->total() }}</span>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-hidden rounded-xl shadow-lg">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-green-600 text-white">
                    <th class="py-4 px-6 text-center font-semibold">No</th>
                    <th class="py-4 px-6 text-center font-semibold">Ruang</th>
                    <th class="py-4 px-6 text-center font-semibold">Keterangan</th>
                    <th class="py-4 px-6 text-center font-semibold">Detail</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ruangs as $index => $ruang)
                    <tr class="hover:bg-green-50 transition duration-150">
                        <td class="py-4 px-6 border-b text-center">{{ $ruangs->firstItem() + $index }}</td>
                        <td class="py-4 px-6 border-b text-center font-medium">{{ $ruang->name }}</td>
                        <td class="py-4 px-6 border-b text-center">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                                {{ $ruang->description }}
                            </span>
                        </td>
                        <td class="py-4 px-6 border-b text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ url('dr') }}" 
                                   class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none transition duration-200 flex items-center gap-2">
                                    <i class="fas fa-info-circle"></i>
                                    Detail
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-8 px-6 text-center text-gray-500">
                            <i class="fas fa-door-closed text-4xl mb-4 text-gray-300"></i>
                            <div>Tidak ada data ruang ditemukan</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Controls -->
    @if($ruangs->hasPages())
    <div class="mt-8 flex justify-between items-center bg-white p-4 rounded-lg shadow">
        @if($ruangs->onFirstPage())
            <span class="px-4 py-2 text-gray-400 cursor-not-allowed">
                <i class="fas fa-chevron-left mr-1"></i>
                Previous
            </span>
        @else
            <a href="{{ $ruangs->previousPageUrl() }}" 
               class="px-4 py-2 text-green-600 hover:text-green-700 transition duration-200">
                <i class="fas fa-chevron-left mr-1"></i>
                Previous
            </a>
        @endif

        <div class="flex items-center">
            <span class="px-4 py-2 bg-green-100 text-green-700 rounded-lg">
                Page {{ $ruangs->currentPage() }} of {{ $ruangs->lastPage() }}
            </span>
        </div>

        @if($ruangs->hasMorePages())
            <a href="{{ $ruangs->nextPageUrl() }}" 
               class="px-4 py-2 text-green-600 hover:text-green-700 transition duration-200">
                Next
                <i class="fas fa-chevron-right ml-1"></i>
            </a>
        @else
            <span class="px-4 py-2 text-gray-400 cursor-not-allowed">
                Next
                <i class="fas fa-chevron-right ml-1"></i>
            </span>
        @endif
    </div>
    @endif
</div>

@endsection