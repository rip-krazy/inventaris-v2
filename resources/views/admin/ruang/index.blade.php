@extends ('main')
@section ('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<title>Daftar ruang</title>

<div class="max-w-6xl mx-auto mt-32 bg-white rounded-lg shadow-lg p-10 my-10 animate__animated animate__fadeIn">
    <h1 class="text-2xl font-bold mb-6 text-center">Daftar ruang Sekolah</h1>

     <!-- Form Pencarian dan Tombol Tambah Data -->
     <div class="mb-6 flex justify-between items-center">
           <!-- Form Pencarian -->
           <form action="{{ route('ruang.index') }}" method="GET" class="flex items-center space-x-4">
               <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Cari Ruangan..." class="mt-4 px-4 py-2 border rounded-lg w-80" />
               <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Cari</button>
           </form>

           <!-- Tombol Tambah Pengguna -->
           <a href="{{ route('ruang.create') }}" class="mt-4 px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
               Tambah Ruangan
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
                <th class="py-4 px-10 border-b text-center">No</th>
                <th class="py-4 px-10 border-b text-center">ruang</th>
                <th class="py-4 px-10 border-b text-center">Keterangan</th>
                <th class="py-4 px-10 border-b text-center">Detail</th>
                <th class="py-4 px-10 border-b text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruangs as $index => $ruang)
            <tr class="hover:bg-green-100">
                <td class="py-4 px-10 border-b text-center">{{ $index + 1 }}</td>
                <td class="py-4 px-10 border-b text-center">{{ $ruang->name }}</td>
                <td class="py-4 px-10 border-b text-center">{{ $ruang->description }}</td>
                <td class="py-4 px-10 border-b text-center">
                    <a href="{{ url('detailruang') }}" class="text-green-600">Detail</a>
                </td>
                <td class="py-4 px-10 border-b text-center">
                    <a href="{{ route('ruang.edit', $ruang) }}" class="text-blue-600">Edit</a>
                    <form action="{{ route('ruang.destroy', $ruang) }}" method="POST" class="inline" 
                    onsubmit="return confirm('Apakah Data Akan Dihapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 ml-2">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6 flex justify-between items-center">
        <div>
            @if($ruangs->onFirstPage())
                <span class="text-gray-500">Previous</span>
            @else
                <a href="{{ $ruangs->previousPageUrl() }}" class="text-blue-600">Previous</a>
            @endif
        </div>
 
        <div class="flex items-center">
            <span class="mx-2">Page {{ $ruangs->currentPage() }} of {{ $ruangs->lastPage() }}</span>
        </div>
 
        <div>
            @if($ruangs->hasMorePages())
                <a href="{{ $ruangs->nextPageUrl() }}" class="text-blue-600">Next</a>
            @else
                <span class="text-gray-500">Next</span>
            @endif
        </div>
    </div>
</div>
@endsection
