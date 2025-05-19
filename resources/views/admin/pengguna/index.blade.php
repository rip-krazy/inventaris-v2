@extends('main')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
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
          <a href="{{ route('admin.register') }}" 
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
         </div>
      @endif

      <!-- Tabel Data Pengguna -->
        <div class="overflow-hidden rounded-xl shadow-lg">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-green-600 text-white">
                        <th class="py-4 px-8 text-center font-semibold">No</th>
                        <th class="py-4 px-8 text-center font-semibold">Nama</th>
                        <th class="py-4 px-8 text-center font-semibold">Email</th>
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
                        <td class="py-4 px-8 border-b text-center">{{ $pengguna->email }}</td>
                        <td class="py-4 px-8 border-b text-center">
                          <div class="flex items-center justify-center">
                              @php
                                  // Eager load the plaintextPassword relationship 
                                  $plainPassword = $pengguna->relationLoaded('plaintextPassword') ? 
                                      ($pengguna->plaintextPassword ? $pengguna->plaintextPassword->password : null) : 
                                      App\Models\PlaintextPassword::where('user_id', $pengguna->id)->value('password');
                              @endphp
                              <span class="hidden-password">{{ str_repeat('*', 8) }}</span>
                              <span class="visible-password hidden">{{ $plainPassword ?? "Password tidak tersedia" }}</span>
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
   </div>
</body>

<script>
    function togglePassword(button) {
        const td = button.closest('td');
        const hiddenPassword = td.querySelector('.hidden-password');
        const visiblePassword = td.querySelector('.visible-password');
        const icon = button.querySelector('i');
        
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

@endsection