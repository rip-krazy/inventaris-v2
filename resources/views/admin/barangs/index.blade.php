@extends('main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<title>Data Barang</title>

<div class="w-screen mr-10 ml-72 bg-white rounded-lg shadow-lg p-10 my-10 animate__animated animate__fadeIn">
   <h1 class="text-4xl font-bold mb-6 text-center">Data Barang</h1>

  <!-- Form Pencarian dan Tombol Tambah Data -->
  <div class="mb-6 flex justify-between items-center gap-4">
    <!-- Form Pencarian -->
    <form action="{{ route('barangs.index') }}" method="GET" class="flex items-center space-x-4">
        <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Cari Barang..." class="px-4 py-2 border rounded-lg w-96 focus:outline-none focus:ring-2 focus:ring-green-500" />
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Cari</button>
    </form>

    <!-- Tombol Tambah Barang -->
    <a href="{{ route('barangs.create') }}" class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
        Tambah Barang
    </a>
</div>

   @if(session('success'))
       <div class="mt-4 text-green-600">
           {{ session('success') }}
       </div>
   @endif

   <table class="min-w-full mt-2 bg-white border border-gray-300">
       <thead>
           <tr class="bg-green-200 text-gray-600">
               <th class="py-4 px-6 border-b text-center">No</th>
               <th class="py-4 px-6 border-b text-center">Nama Barang</th>
               <th class="py-4 px-6 border-b text-center">Kode Barang</th>
               <th class="py-4 px-6 border-b text-center">Kondisi Barang</th>
               <th class="py-4 px-6 border-b text-center">Aksi</th>
           </tr>
       </thead>
       <tbody>
        @foreach($barangs as $barang)
        <tr class="hover:bg-green-100">
            <td class="py-4 px-8 border-b text-center">{{ $loop->iteration }}</td>
            <td class="py-4 px-8 border-b text-center">{{ $barang->nama_barang }}</td>
            <td class="py-4 px-8 border-b text-center">{{ $barang->kode_barang }}</td>
            <td class="py-4 px-8 border-b text-center">{{ $barang->kondisi_barang }}</td>
            <td class="py-4 px-8 border-b text-center">
                <a href="{{ route('barangs.edit', $barang) }}" class="text-blue-500 hover:underline">Edit</a>
                <form action="{{ route('barangs.destroy', $barang) }}" method="POST" class="inline" 
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

   <!-- Pagination Controls -->
   <div class="mt-6 flex justify-between items-center">
       <div>
           @if($barangs->onFirstPage())
               <span class="text-gray-500">Previous</span>
           @else
               <a href="{{ $barangs->previousPageUrl() }}" class="text-blue-600">Previous</a>
           @endif
       </div>

       <div class="flex items-center">
           <span class="mx-2">Page {{ $barangs->currentPage() }} of {{ $barangs->lastPage() }}</span>
       </div>

       <div>
           @if($barangs->hasMorePages())
               <a href="{{ $barangs->nextPageUrl() }}" class="text-blue-600">Next</a>
           @else
               <span class="text-gray-500">Next</span>
           @endif
       </div>
   </div>
</div>

@endsection
