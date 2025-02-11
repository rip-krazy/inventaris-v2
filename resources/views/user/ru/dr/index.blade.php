@extends('home')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<title>Data Ruang</title>

<div class="max-w-6xl mt-32 mx-auto bg-white rounded-lg shadow-lg p-10 my-10 animate__animated animate__fadeIn">
   <h1 class="text-4xl font-bold mb-6 text-center">Detail Ruang</h1>

   <div class="mb-6 flex justify-between items-center">
       <form action="{{ route('dr.index') }}" method="GET" class="flex items-center space-x-4">
           <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Cari Ruang..." class="mt-4 px-4 py-2 border rounded-lg w-80" />
           <button type="submit" class="mt-4 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Cari</button>
       </form>
   </div>
   

   <table class="min-w-full mt-2 bg-white border border-gray-300">
       <thead>
           <tr class="bg-green-200 text-gray-600">
               <th class="py-4 px-6 border-b text-center">Nama Barang</th>
               <th class="py-4 px-6 border-b text-center">Kode Barang</th>
               <th class="py-4 px-6 border-b text-center">Kondisi Barang</th>
               <th class="py-4 px-6 border-b text-center">QR Kode</th>
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
               </tr>
           @endforeach
       </tbody>
   </table>

   <!-- Pagination Controls -->
   <div class="mt-6 flex justify-between items-center">
       <div>
           @if($detailruangs->onFirstPage())
               <span class="text-gray-500">Previous</span>
           @else
               <a href="{{ $detailruangs->previousPageUrl() }}" class="text-green-600 hover:text-green-700 transition duration-200">Previous</a>
           @endif
       </div>

       <div class="flex items-center">
           <span class="mx-2">Page {{ $detailruangs->currentPage() }} of {{ $detailruangs->lastPage() }}</span>
       </div>

       <div>
           @if($detailruangs->hasMorePages())
               <a href="{{ $detailruangs->nextPageUrl() }}" class="text-green-600 hover:text-green-700 transition duration-200">Next</a>
           @else
               <span class="text-gray-500">Next</span>
           @endif
       </div>
   </div>
</div>

@endsection
