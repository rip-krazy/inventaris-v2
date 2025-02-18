@extends('main')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<<<<<<< HEAD
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<body class="bg-gray-100 p-10">
    <div>
        <div class="fixed w-full h-screen top-0 left-0 bg-red-800 z-50"></div>
    </div>
   <div class="w-screen ml-72 mr-10 bg-white rounded-lg shadow-lg p-10 my-10 animate__animated animate__fadeIn">
       <h1 class="text-4xl font-bold mb-6 text-center text-gray-800">Daftar Pengguna</h1>

      <!-- Form Pencarian dan Tombol Tambah Data -->
      <div class="mb-6 flex justify-between items-center gap-4">
          <form action="{{ route('pengguna.index') }}" method="GET" class="flex items-center space-x-4">
              <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Cari Pengguna..." class="px-4 py-2 border rounded-lg w-96 focus:outline-none focus:ring-2 focus:ring-green-500" />
              <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Cari</button>
          </form>
          <a href="{{ route('pengguna.create') }}" class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
              Tambah Pengguna
          </a>
      </div>

      @if(session('success'))
         <div class="mt-4 text-green-600">
            {{ session('success') }}
=======
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<body class="bg-gradient-to-br from-white to-green-50 p-10">
   <div class="w-100 mx-24 bg-white rounded-xl shadow-2xl p-10 my-10 animate__animated animate__fadeIn">
       <h1 class="text-4xl font-bold mb-8 text-center text-gray-800 border-b pb-4">
           <i class="fas fa-users mr-2 text-green-600"></i>Daftar Pengguna
       </h1>

      <!-- Form Pencarian dan Tombol Tambah Data -->
      <div class="mb-8 flex justify-between items-center gap-4">
          <!-- Form Pencarian -->
          <form action="{{ route('pengguna.index') }}" method="GET" class="flex items-center space-x-4 flex-1">
              <div class="relative flex-1">
                  <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                  <input type="text" 
                         name="search" 
                         value="{{ old('search', $search) }}" 
                         placeholder="Cari Pengguna..." 
                         class="pl-10 pr-4 py-2 border-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" />
              </div>
              <button type="submit" 
                      class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200 flex items-center gap-2">
                  <i class="fas fa-search"></i>
                  Cari
              </button>
          </form>

          <!-- Tombol Tambah Pengguna -->
          <a href="{{ route('pengguna.create') }}" 
             class="px-6 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200 flex items-center gap-2">
              <i class="fas fa-plus"></i>
              Tambah Pengguna
          </a>
      </div>

       @if(session('success'))
         <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 animate__animated animate__fadeIn">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
>>>>>>> bdd74b0de50a3035f35ef556981ad800a85758df
         </div>
      @endif

      <!-- Tabel Data Pengguna -->
<<<<<<< HEAD
      <table class="min-w-full mt-2 bg-white border border-gray-300 rounded-lg shadow-md">
          <thead>
              <tr class="bg-green-200 text-gray-600">
                  <th class="py-4 px-12 border-b text-center">No</th>
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
                    <td class="py-4 px-8 border-b text-center">{{ $loop->iteration }}</td>
                    <td class="py-4 px-12 border-b text-center">{{ $pengguna->name }}</td>
                    <td class="py-4 px-12 border-b text-center">{{ $pengguna->username }}</td>
                    <td class="py-4 px-12 border-b text-center">
                        <div class="flex items-center justify-center">
                            <span id="password-hidden-{{ $pengguna->id }}" class="hidden-password mt-2">{{ str_repeat('*', strlen($pengguna->password)) }}</span>
                            <span id="password-visible-{{ $pengguna->id }}" class="visible-password hidden">{{ $pengguna->password }}</span>
                            <button type="button" id="toggle-button-{{ $pengguna->id }}" class="ml-2 text-gray-500 focus:outline-none" onclick="togglePassword('{{ $pengguna->id }}')">
                                <i id="icon-{{ $pengguna->id }}" class="fas fa-eye"></i>
                            </button>
                        </div>
                    </td>
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
=======
      <div class="overflow-hidden rounded-xl shadow-lg">
          <table class="min-w-full bg-white">
              <thead>
                  <tr class="bg-green-600 text-white">
                      <th class="py-4 px-8 text-center font-semibold">No</th>
                      <th class="py-4 px-8 text-center font-semibold">Nama</th>
                      <th class="py-4 px-8 text-center font-semibold">Username</th>
                      <th class="py-4 px-8 text-center font-semibold">Password</th>
                      <th class="py-4 px-8 text-center font-semibold">Mapel</th>
                      <th class="py-4 px-8 text-center font-semibold">Aksi</th>
                  </tr>
              </thead>
              <tbody>
              @foreach($penggunas as $pengguna)
                  <tr class="hover:bg-green-50 transition duration-150">
                      <td class="py-4 px-8 border-b text-center">{{ $loop->iteration }}</td>
                      <td class="py-4 px-8 border-b text-center">{{ $pengguna->name }}</td>
                      <td class="py-4 px-8 border-b text-center">{{ $pengguna->username }}</td>
                      <td class="py-4 px-8 border-b text-center">
                          <div class="flex items-center justify-center">
                              <span class="hidden-password mt-2">{{ str_repeat('*', strlen($pengguna->password)) }}</span>
                              <span class="visible-password hidden">{{ $pengguna->password }}</span>
                              <button type="button" class="toggle-password ml-2 text-gray-500 hover:text-gray-700 focus:outline-none" onclick="togglePassword(this)">
                                  <i class="fa fa-eye"></i>
                              </button>
                          </div>
                      </td>                
                      <td class="py-4 px-8 border-b text-center">{{ $pengguna->mapel }}</td>
                      <td class="py-4 px-8 border-b text-center">
                          <div class="flex justify-center gap-3">
                              <a href="{{ route('pengguna.edit', $pengguna->id) }}" 
                                 class="text-blue-500 hover:text-blue-700 transition duration-200">
                                  <i class="fas fa-edit"></i>
                              </a>
                              <form action="{{ route('pengguna.destroy', $pengguna->id) }}" 
                                    method="POST" 
                                    onsubmit="return confirm('Apakah Data Akan Dihapus?')" class="inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" 
                                          class="text-red-500 hover:text-red-700 transition duration-200">
                                      <i class="fas fa-trash"></i>
                                  </button>
                              </form>
                          </div>
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
      </div>

      <!-- Pagination Controls -->
    <div class="mt-8 flex justify-between items-center bg-white p-4 rounded-lg shadow">
        <a href="{{ $penggunas->previousPageUrl() }}" 
        class="px-4 py-2 {{ $penggunas->onFirstPage() ? 'text-gray-400 cursor-not-allowed pointer-events-none' : 'text-green-600 hover:text-green-700' }} transition duration-200">
            <i class="fas fa-chevron-left mr-1"></i>
            Previous
        </a>

        <div class="flex items-center">
            <span class="px-4 py-2 bg-green-100 text-green-700 rounded-lg">
                Page {{ $penggunas->currentPage() }} of {{ $penggunas->lastPage() }}
            </span>
        </div>

        <a href="{{ $penggunas->nextPageUrl() }}" 
        class="px-4 py-2 {{ !$penggunas->hasMorePages() ? 'text-gray-400 cursor-not-allowed pointer-events-none' : 'text-green-600 hover:text-green-700' }} transition duration-200">
            Next
            <i class="fas fa-chevron-right ml-1"></i>
        </a>
    </div>
>>>>>>> bdd74b0de50a3035f35ef556981ad800a85758df
   </div>
</body>

<script>
<<<<<<< HEAD
    function togglePassword(userId) {
        const hiddenPassword = document.getElementById(`password-hidden-${userId}`);
        const visiblePassword = document.getElementById(`password-visible-${userId}`);
        const icon = document.getElementById(`icon-${userId}`);

=======
    function togglePassword(button) {
        const td = button.closest('td');
        const hiddenPassword = td.querySelector('.hidden-password');
        const visiblePassword = td.querySelector('.visible-password');
        const icon = button.querySelector('i');
        
>>>>>>> bdd74b0de50a3035f35ef556981ad800a85758df
        if (hiddenPassword.classList.contains('hidden')) {
            hiddenPassword.classList.remove('hidden');
            visiblePassword.classList.add('hidden');
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            hiddenPassword.classList.add('hidden');
            visiblePassword.classList.remove('hidden');
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    }
</script>

<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> bdd74b0de50a3035f35ef556981ad800a85758df
