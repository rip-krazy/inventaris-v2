@extends('main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<title>Detail Ruang</title>

<div class="w-screen ml-72 mr-10 bg-white rounded-xl shadow-xl p-12 my-10 animate__animated animate__fadeIn">
    <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-8">Detail Ruang: {{ $ruang->name }}</h1>

    <!-- Form Pencarian dan Tombol Tambah Data -->
    <div class="mb-6 flex justify-between items-center gap-4">
        <!-- Tombol Tambah Item -->
        <a href="{{ route('item.create', $ruang->id) }}" class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            Tambah Item
        </a>
    </div>

    @if(session('success'))
        <div class="mt-4 mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-green-200 text-gray-600">
                <th class="py-4 px-8 border-b text-center">No</th>
                <th class="py-4 px-8 border-b text-center">Nama Barang</th>
                <th class="py-4 px-8 border-b text-center">Kode Barang</th>
                <th class="py-4 px-8 border-b text-center">Kondisi</th>
                <th class="py-4 px-8 border-b text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruang->items as $index => $item)
            <tr class="hover:bg-green-100">
                <td class="py-4 px-8 border-b text-center">{{ $index + 1 }}</td>
                <td class="py-4 px-8 border-b text-center">{{ $item->name }}</td>
                <td class="py-4 px-8 border-b text-center">{{ $item->code }}</td>
                <td class="py-4 px-8 border-b text-center">
                    <span class="{{ $item->condition == 'Baik' ? 'text-green-600' : 'text-red-600' }}">
                        {{ $item->condition }}
                    </span>
                </td>
                <td class="py-4 px-8 border-b text-center">
                    <a href="{{ route('item.edit', $item->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                    <form action="{{ route('item.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Barang Akan Dihapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 ml-2 hover:text-red-800">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-6">
        <a href="{{ route('ruang.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali
        </a>
    </div>
</div>
@endsection