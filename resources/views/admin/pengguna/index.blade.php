@extends('main')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<body class="bg-gray-100 p-10">
   <div class="w-screen ml-72 mr-10 bg-white rounded-lg shadow-lg p-10 my-10 animate__animated animate__fadeIn mr-16">
       <h1 class="text-4xl font-bold mb-6 text-center text-gray-800">Daftar Pengguna</h1>

      <!-- Form Pencarian dan Tombol Tambah Data -->
<div class="mb-6 flex justify-between items-center gap-4">
    <!-- Form Pencarian -->
    <form action="{{ route('pengguna.index') }}" method="GET" class="flex items-center space-x-4">
        <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Cari Pengguna..." class="px-4 py-2 border rounded-lg w-96 focus:outline-none focus:ring-2 focus:ring-green-500" />
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Cari</button>
    </form>

    <!-- Tombol Tambah Pengguna -->
    <a href="{{ route('pengguna.create') }}" class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
        Tambah Pengguna
    </a>
</div>

       @if(session('success'))
         <div class="mt-4 text-green-600">
            {{ session('success') }}
         </div>
      @endif

      <!-- Tabel Data Pengguna -->
      <table class="min-w-full mt-2 bg-white border border-gray-300 rounded-lg shadow-md">
       <thead>
           <tr class="bg-green-200 text-gray-600">
               <th class="py-4 px-12 border-b text-center">Nama</th>
               <th class="py-4 px-12 border-b text-center">Username</th>
               <th class="py-4 px-12 border-b text-center">Password</th>
               <th class="py-4 px-12 border-b text-center">Mapel</th>
               <th class="py-4 px-12 border-b text-center">Aksi</th>
           </tr>
       </thead>
       <tbody>
           @foreach($penggunas as $pengguna)
               <tr class="hover:bg-green-100 transition-all duration-300">
                   <td class="py-4 px-12 border-b text-center">{{ $pengguna->name }}</td>
                   <td class="py-4 px-12 border-b text-center">{{ $pengguna->username }}</td>
                   <td class="py-4 px-12 border-b text-center">{{ $pengguna->password }}</td>
                   <td class="py-4 px-12 border-b text-center">{{ $pengguna->mapel }}</td>
                   <td class="py-4 px-12 border-b text-center space-x-4">
                        <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('pengguna.destroy', $pengguna->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Data Akan Dihapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                   </td>
               </tr>
           @endforeach
       </tbody>
   </table>

   <!-- Pagination Controls -->
   <div class="mt-6 flex justify-between items-center">
      <div>
          @if($penggunas->onFirstPage())
              <span class="text-gray-500">Previous</span>
          @else
              <a href="{{ $penggunas->previousPageUrl() }}" class="text-blue-600 hover:text-blue-700">Previous</a>
          @endif
      </div>

      <div class="flex items-center">
          <span class="mx-2 text-gray-700">Page {{ $penggunas->currentPage() }} of {{ $penggunas->lastPage() }}</span>
      </div>

      <div>
          @if($penggunas->hasMorePages())
              <a href="{{ $penggunas->nextPageUrl() }}" class="text-blue-600 hover:text-blue-700">Next</a>
          @else
              <span class="text-gray-500">Next</span>
          @endif
      </div>
   </div>
   </div>
</body>

@endsection
