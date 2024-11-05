@extends ('main')
@section ('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<body class="bg-gray-100 p-10">
   <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-10 my-10">
       <h1 class="text-4xl font-bold mb-6 text-center">Daftar Pengguna</h1>
       <a href="{{ route('pengguna.create') }}" class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Tambah Pengguna</a>
       
       @if(session('success'))
         <div class="mt-4 text-green-600">
            {{ session('success') }}
         </div>
      @endif
   
      <table class="min-w-full mt-2 bg-white border border-gray-300">
       <thead>
           <tr class="bg-green-200 text-gray-600">
               <th class="py-4 px-12 border-b text-center">Nama</th>
               <th class="py-4 px-12 border-b text-center">Username</th>
               <th class="py-4 px-12 border-b text-center">Password </th>
               <th class="py-4 px-12 border-b text-center">Mapel </th>
               <th class="py-4 px-12 border-b text-center">Aksi</th>
           </tr>
       </thead>
       <tbody>
           @foreach($penggunas as $pengguna)
               <tr class="hover:bg-green-100">
                   <td class="py-4 px-12 border-b text-center">{{ $pengguna->name }}</td>
                   <td class="py-4 px-12 border-b text-center">{{ $pengguna->username }}</td>
                   <td class="py-4 px-12 border-b text-center">{{ $pengguna->password }}</td>
                   <td class="py-4 px-12 border-b text-center">{{ $pengguna->mapel }}</td>
                   <td class="py-4 px-12 border-b text-center">
                        <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="text-center text-blue-600">Edit</a>
                            <form action="{{ route('pengguna.destroy', $pengguna->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-center text-red-600">Delete</button>
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
              <a href="{{ $penggunas->previousPageUrl() }}" class="text-blue-600">Previous</a>
          @endif
      </div>

      <div class="flex items-center">
          <span class="mx-2">Page {{ $penggunas->currentPage() }} of {{ $penggunas->lastPage() }}</span>
      </div>

      <div>
          @if($penggunas->hasMorePages())
              <a href="{{ $penggunas->nextPageUrl() }}" class="text-blue-600">Next</a>
          @else
              <span class="text-gray-500">Next</span>
          @endif
      </div>
  </div>
   </div>
</body>
@endsection