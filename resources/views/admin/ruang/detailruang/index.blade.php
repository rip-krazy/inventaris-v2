@extends('main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<title>Detail Ruang</title>

<div class="w-screen ml-72 mr-10 bg-white rounded-xl shadow-xl p-12 my-10 animate__animated animate__fadeIn">
    <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-8">{{ $ruang->name }}</h1>

    <!-- Search and Add Button Section -->
    <div class="mb-6 flex justify-between items-center">
        <form action="{{ route('detailruang.index') }}" method="GET" class="flex items-center space-x-4">
            <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Cari Ruang..." class="mt-4 px-4 py-2 border rounded-lg w-80"/>
            <button type="submit" class="mt-4 px-4 py-2 bg-green-600 text-white rounded-lg bg-green-600 focus:outline-none focus:ring-2 bg-green-600">Cari</button>
        </form>

        <a href="{{ route('detailruang.create') }}" class="mt-4 px-4 py-2 text-white bg-green-600 bg-green-600 rounded-lg focus:outline-none focus:ring-2 bg-green-600">
            Tambah Data
        </a>
    </div>

   <table class="min-w-full mt-2 bg-white border border-gray-300">
       <thead>
           <tr class="bg-green-200 text-gray-600">
               <th class="py-4 px-6 border-b text-center">Nama barang</th>
               <th class="py-4 px-6 border-b text-center">Kode barang</th>
               <th class="py-4 px-6 border-b text-center">Kondisi barang</th>
               <th class="py-4 px-6 border-b text-center">QR Code</th>
               <th class="py-4 px-6 border-b text-center">Aksi</th>
           </tr>
       </thead>
       <tbody>
           @foreach($detailruangs as $detailruang)
               <tr class="hover:bg-green-100">
                   <td class="py-4 px-8 border-b text-center">{{ $detailruang->nama_barang }}</td>
                   <td class="py-4 px-8 border-b text-center">{{ $detailruang->kode_barang }}</td>
                   <td class="py-4 px-8 border-b text-center">{{ $detailruang->kondisi_barang }}</td>
                   <td class="py-4 px-8 border-b text-center">
                       <!-- Membuat QR Code bisa diklik dengan animasi halus -->
                       <a href="{{ route('detailruang.show', $detailruang->id) }}" target="_blank">
                           <img src="{{ asset('assets/img/qr-code.svg') }}" alt="QR Code" 
                               class="transition-transform transform hover:scale-105 hover:opacity-80 duration-300 ease-in-out mx-auto" width="50" height="50">
                       </a>
                   </td>
                   <td class="py-4 px-8 border-b text-center">
                       <a href="{{ route('detailruang.edit', $detailruang) }}" class="text-blue-500 hover:underline">Edit</a>
                       <form action="{{ route('detailruang.destroy', $detailruang) }}" method="POST" class="inline" 
                           onsubmit="return confirm('Apakah Data Akan Dihapus?')">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="text-red-500 hover:underline ml-2">Hapus</button>
                       </form>
                   </td>
               </tr>
           @endforeach
       </tbody>
   </table>
    <!-- Pagination -->
    <div class="mt-6 flex justify-between items-center">
        <div>
            @if($detailruangs->onFirstPage())
                <span class="text-gray-500">Previous</span>
            @else
                <a href="{{ $detailruangs->previousPageUrl() }}" class="text-blue-600">Previous</a>
            @endif
        </div>

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