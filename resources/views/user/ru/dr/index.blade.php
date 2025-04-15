@extends('home')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<title>Data Ruang</title>

<div class="w-100 mx-24 bg-white rounded-xl shadow-xl p-10 my-10 animate__animated animate__fadeIn">
   <h1 class="text-4xl font-bold mb-8 text-center text-gray-800 border-b pb-4">
       <i class="fas fa-clipboard-list mr-2 text-green-600"></i> Detail Ruang
   </h1>

   <div class="mb-6 flex justify-between items-center">
       <form action="{{ route('dr.index') }}" method="GET" class="flex items-center space-x-4">
           <div class="relative">
               <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
               <input type="text" 
                      name="search" 
                      value="{{ old('search', $search) }}" 
                      placeholder="Cari Ruang..." 
                      class="pl-10 pr-4 py-2 border-2 border-green-200 rounded-lg w-80 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" />
           </div>
           <button type="submit" 
                   class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200 flex items-center gap-2">
               <i class="fas fa-search"></i>
               Cari
           </button>
       </form>
   </div>
   
   <div class="overflow-hidden rounded-xl shadow-lg">
       <table class="min-w-full bg-white">
           <thead>
               <tr class="bg-green-600 text-white">
                   <th class="py-4 px-6 border-b text-center font-semibold">Nama Barang</th>
                   <th class="py-4 px-6 border-b text-center font-semibold">Kode Barang</th>
                   <th class="py-4 px-6 border-b text-center font-semibold">Kondisi Barang</th>
                   <th class="py-4 px-6 border-b text-center font-semibold">QR Kode</th>
               </tr>
           </thead>
           <tbody>
               @foreach($detailruangs as $detailruang)
                   <tr class="hover:bg-green-50 transition duration-150">
                       <td class="py-4 px-8 border-b text-center">{{ $detailruang->nama_barang }}</td>
                       <td class="py-4 px-8 border-b text-center">{{ $detailruang->kode_barang }}</td>
                       <td class="py-4 px-8 border-b text-center">
                           @if($detailruang->kondisi_barang == 'Baik')
                               <span class="px-3 py-1 rounded-full bg-green-100 text-green-800">
                                   <i class="fas fa-check-circle mr-1"></i> {{ $detailruang->kondisi_barang }}
                               </span>
                           @elseif($detailruang->kondisi_barang == 'Rusak')
                               <span class="px-3 py-1 rounded-full bg-red-100 text-red-800">
                                   <i class="fas fa-exclamation-circle mr-1"></i> {{ $detailruang->kondisi_barang }}
                               </span>
                           @else
                               {{ $detailruang->kondisi_barang }}
                           @endif
                       </td>
                       <td class="py-4 px-8 border-b text-center">
                           <!-- Membuat QR Code bisa diklik dengan animasi halus -->
                           <a href="{{ route('dr.show', $detailruang->id) }}" target="_blank">
                               <img src="{{ asset('assets/img/qr-code.svg') }}" alt="QR Code" 
                                   class="transition-transform transform hover:scale-110 hover:opacity-80 duration-300 ease-in-out mx-auto" 
                                   width="50" height="50">
                           </a>
                       </td>
                   </tr>
               @endforeach
           </tbody>
       </table>
   </div>

   <!-- Pagination Controls -->
   <div class="mt-8 flex justify-between items-center bg-white p-4 rounded-lg shadow">
       <div>
           @if($detailruangs->onFirstPage())
               <span class="px-4 py-2 text-gray-400 cursor-not-allowed">
                   <i class="fas fa-chevron-left mr-1"></i> Previous
               </span>
           @else
               <a href="{{ $detailruangs->previousPageUrl() }}" 
                  class="px-4 py-2 text-green-600 hover:text-green-700 transition duration-200 flex items-center">
                   <i class="fas fa-chevron-left mr-1"></i> Previous
               </a>
           @endif
       </div>

       <div class="flex items-center">
           <span class="px-4 py-2 bg-green-100 text-green-700 rounded-lg">
               Page {{ $detailruangs->currentPage() }} of {{ $detailruangs->lastPage() }}
           </span>
       </div>

       <div>
           @if($detailruangs->hasMorePages())
               <a href="{{ $detailruangs->nextPageUrl() }}" 
                  class="px-4 py-2 text-green-600 hover:text-green-700 transition duration-200 flex items-center">
                   Next <i class="fas fa-chevron-right ml-1"></i>
               </a>
           @else
               <span class="px-4 py-2 text-gray-400 cursor-not-allowed">
                   Next <i class="fas fa-chevron-right ml-1"></i>
               </span>
           @endif
       </div>
   </div>
</div>

@endsection