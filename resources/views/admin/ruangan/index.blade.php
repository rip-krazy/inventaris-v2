@extends ('main')
@section ('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<title>Daftar Ruangan</title>

<div class="max-w-6xl mx-auto bg-white rounded-lg shadow-lg p-10 my-10">
    <h1 class="text-2xl font-bold mb-6 text-center">Daftar Ruangan Sekolah</h1>

    <div class="button-container mt-4">
        <a href="{{ route('ruangan.create') }}" class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none">
            Tambah Data
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
                <th class="py-4 px-16 border-b text-center">No</th>
                <th class="py-4 px-16 border-b text-center">Ruangan</th>
                <th class="py-4 px-16 border-b text-center">Keterangan</th>
                <th class="py-4 px-16 border-b text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruangan as $index => $ruangan)
            <tr class="hover:bg-green-100">
                <td class="py-4 px-16 border-b text-center">{{ $index + 1 }}</td>
                <td class="py-4 px-16 border-b text-center">{{ $ruangan->name }}</td>
                <td class="py-4 px-16 border-b text-center">{{ $ruangan->description }}</td>
                <td class="py-4 px-16 border-b text-center">
                    <a href="{{ route('ruangan.edit', $ruangan) }}" class="text-blue-600">Edit</a>
                    <form action="{{ route('ruangan.destroy', $ruangan) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 ml-2">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination Controls -->
   <div class="mt-6 flex justify-between items-center">
       <div>
           @if($ruangan->onFirstPage())
               <span class="text-gray-500">Previous</span>
           @else
               <a href="{{ $ruangan->previousPageUrl() }}" class="text-blue-600">Previous</a>
           @endif
       </div>

       <div class="flex items-center">
           <span class="mx-2">Page {{ $ruangan->currentPage() }} of {{ $ruangan->lastPage() }}</span>
       </div>

       <div>
           @if($ruangan->hasMorePages())
               <a href="{{ $ruangan->nextPageUrl() }}" class="text-blue-600">Next</a>
           @else
               <span class="text-gray-500">Next</span>
           @endif
       </div>
   </div>
</div>

@endsection
