@extends ('home')
@section ('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<title>Daftar ruang</title>

<div class="max-w-6xl mx-auto bg-white rounded-lg shadow-lg p-10 my-10">
    <h1 class="text-2xl font-bold mb-6 text-center">Daftar ruang Sekolah</h1>

      <!-- Form Pencarian dan Tombol Tambah Data -->
      <div class="mb-6 justify-between items-center">
           <!-- Form Pencarian -->
           <form action="{{ route('ru.index') }}" method="GET" class=" items-center space-x-4">
               <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Cari Barang..." class="mt-4 px-4 py-2 border rounded-lg w-80" />
               <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Cari</button>
           </form>

    <table class="min-w-full mt-2 bg-white border border-gray-300">
        <thead>
            <tr class="bg-green-200 text-gray-600">
                <th class="py-4 px-20 border-b text-center">No</th>
                <th class="py-4 px-20 border-b text-center">ruang</th>
                <th class="py-4 px-20 border-b text-center">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruangs as $index => $ruang)
            <tr class="hover:bg-green-100">
                <td class="py-4 px-20 border-b text-center">{{ $index + 1 }}</td>
                <td class="py-4 px-20 border-b text-center">{{ $ruang->name }}</td>
                <td class="py-4 px-20 border-b text-center">{{ $ruang->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination Controls -->
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
