@extends ('home')
@section ('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<title>Data Barang</title>

<div class="max-w-6xl mx-auto bg-white rounded-lg shadow-lg p-10 my-10">
   <h1 class="text-4xl font-bold mb-6 text-center">Data Barang</h1>

   <table class="min-w-full mt-2 bg-white border border-gray-300">
       <thead>
           <tr class="bg-green-200 text-gray-600">
               <th class="py-4 px-6 border-b text-center">Nama Barang</th>
               <th class="py-4 px-6 border-b text-center">Kode Barang</th>
               <th class="py-4 px-6 border-b text-center">Kondisi Barang</th>
               <th class="py-4 px-6 border-b text-center">Jumlah Barang</th>
               <th class="py-4 px-6 border-b text-center">Lokasi</th>
           </tr>
       </thead>
       <tbody>
           @foreach($barangs as $barang)
               <tr class="hover:bg-green-100">
                   <td class="py-4 px-8 border-b text-center">{{ $barang->nama_barang }}</td>
                   <td class="py-4 px-8 border-b text-center">{{ $barang->kode_barang }}</td>
                   <td class="py-4 px-8 border-b text-center">{{ $barang->kondisi_barang }}</td>
                   <td class="py-4 px-8 border-b text-center">{{ $barang->jumlah_barang }}</td>
                   <td class="py-4 px-8 border-b text-center">{{ $barang->lokasi }}</td>
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