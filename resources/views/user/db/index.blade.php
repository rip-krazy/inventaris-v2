@extends ('home')
@section ('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<title>Data Barang</title>

<div class="w-screen mt-32 ml-72 mr-10 bg-white rounded-lg shadow-lg p-10 my-10 animate__animated animate__fadeIn">
   <h1 class="text-4xl font-bold mb-6 text-center">Data Barang</h1>

<!-- Form Pencarian dan Tombol Tambah Data -->
        <div class="mb-6  justify-between items-center">
           <!-- Form Pencarian -->
           <form action="{{ route('db.index') }}" method="GET" class=" items-center space-x-4">
               <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Cari Barang..." class="mt-4 px-4 py-2 border rounded-lg w-80" />
               <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Cari</button>
           </form>
        </div>

   <table class="min-w-full mt-2 bg-white border border-gray-300">
       <thead>
           <tr class="bg-green-200 text-gray-600">
               <th class="py-4 px-6 border-b text-center">Nama Barang</th>
               <th class="py-4 px-6 border-b text-center">Kode Barang</th>
               <th class="py-4 px-6 border-b text-center">Kondisi Barang</th>
           </tr>
       </thead>
       <tbody>
           @foreach($barangs as $barang)
               <tr class="hover:bg-green-100">
                   <td class="py-4 px-8 border-b text-center">{{ $barang->nama_barang }}</td>
                   <td class="py-4 px-8 border-b text-center">{{ $barang->kode_barang }}</td>
                   <td class="py-4 px-8 border-b text-center">{{ $barang->kondisi_barang }}</td>
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