@extends('home')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<body class="bg-gray-50">
    <div class="w-full mt-32 ml-72 mr-24 animate__animated animate__fadeIn">
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-green-400 to-green-500 px-8 py-6">
                <h1 class="text-2xl font-bold text-white text-center">
                    <i class="fas fa-clipboard-list mr-2"></i>Form Peminjaman
                </h1>
            </div>

            <!-- Notification Section -->
            @if(session('notification'))
                <div class="mx-6 mt-6">
                    <div class="bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('notification') }}
                    </div>
                </div>
            @endif

            <!-- Form Section -->
            <div class="p-8">
                <form action="{{ route('peminjaman.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- User Info Section -->
                    <div class="space-y-4">
                        <div class="relative">
                            <label class="text-sm font-medium text-gray-600 mb-1 block">
                                <i class="fas fa-user mr-2"></i>Nama
                            </label>
                            <input type="text" name="nama" value="{{ old('nama', $user->name) }}" readonly 
                                   class="border border-gray-300 rounded-lg p-3 w-full bg-gray-50 text-gray-700 focus:outline-none" />
                        </div>

                        <div class="relative">
                            <label class="text-sm font-medium text-gray-600 mb-1 block">
                                <i class="fas fa-book mr-2"></i>Mata Pelajaran
                            </label>
                            <input type="text" name="mapel" value="{{ old('mapel', $user->mapel) }}" readonly 
                                   class="border border-gray-300 rounded-lg p-3 w-full bg-gray-50 text-gray-700 focus:outline-none" />
                        </div>
                    </div>

                    <!-- Selection Section -->
                    <div class="space-y-4">
                        <div class="relative">
                            <label for="select-type" class="text-sm font-medium text-gray-600 mb-1 block">
                                <i class="fas fa-list-alt mr-2"></i>Jenis Tempat
                            </label>
                            <select id="select-type" name="jenis" required 
                                    class="border border-gray-300 rounded-lg p-3 w-full bg-white hover:border-green-500 
                                           transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="" disabled selected>Pilih Barang atau Ruang</option>
                                <option value="barang">Barang</option>
                                <option value="ruang">Ruang</option>
                            </select>
                        </div>

                        <div class="relative">
                            <label class="text-sm font-medium text-gray-600 mb-1 block">
                                <i class="fas fa-box mr-2"></i>Pilihan Tempat
                            </label>
                            <select id="barang" name="barangtempat" 
                                    class="border border-gray-300 rounded-lg p-3 w-full bg-white hover:border-green-500 
                                           transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="" disabled selected>Pilih Barang</option>
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->id }}">
                                        {{ $barang->nama_barang }} - {{ $barang->kondisi_barang }}
                                    </option>
                                @endforeach
                            </select>

                            <select id="ruang" name="ruangtempat" 
                                    class="border border-gray-300 rounded-lg p-3 w-full bg-white hover:border-green-500 
                                           transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 hidden">
                                <option value="" disabled selected>Pilih Ruang</option>
                                @foreach ($ruangs as $ruang)
                                    <option value="{{ $ruang->id }}">{{ $ruang->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="relative">
                            <label class="text-sm font-medium text-gray-600 mb-1 block">
                                <i class="fas fa-clock mr-2"></i>Waktu
                            </label>
                            <input type="time" name="jam" required 
                                   class="border border-gray-300 rounded-lg p-3 w-full hover:border-green-500 
                                          transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500" />
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" 
                                class="w-full bg-green-600 text-white rounded-lg p-3 hover:bg-green-700 
                                       transform hover:-translate-y-0.5 transition duration-200 
                                       focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            <i class="fas fa-paper-plane mr-2"></i>Submit Peminjaman
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('select-type').addEventListener('change', function() {
            var barangSelect = document.getElementById('barang');
            var ruangSelect = document.getElementById('ruang');
            
            if (this.value === 'barang') {
                barangSelect.classList.remove('hidden');
                ruangSelect.classList.add('hidden');
            } else if (this.value === 'ruang') {
                ruangSelect.classList.remove('hidden');
                barangSelect.classList.add('hidden');
            }
        });
    </script>
</body>

@endsection