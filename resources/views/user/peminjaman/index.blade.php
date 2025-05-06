@extends('home')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<body class="bg-gray-50">
    <div class="w-100 mx-24 mt-6 animate__animated animate__fadeIn">
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-green-400 to-green-500 px-8 py-6">
                <h1 class="text-2xl font-bold text-white text-center">
                    <i class="fas fa-clipboard-list mr-2"></i>Form Peminjaman
                </h1>
            </div>

            @if(session('notification'))
                <div class="mx-6 mt-6">
                    <div class="bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('notification') }}
                    </div>
                </div>
            @endif

            <div class="p-8">
                <form id="peminjamanForm" action="{{ route('peminjaman.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    
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

                    <div class="space-y-4">
                        <div class="relative">
                            <label for="select-type" class="text-sm font-medium text-gray-600 mb-1 block">
                                <i class="fas fa-list-alt mr-2"></i>Jenis Tempat/Barang
                            </label>
                            <select id="select-type" name="jenis" required 
                                    class="border border-gray-300 rounded-lg p-3 w-full bg-white hover:border-green-500 
                                           transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="" disabled selected>Pilih Barang atau Ruang</option>
                                <option value="barang">Barang</option>
                                <option value="ruang">Ruang</option>
                            </select>
                        </div>

                        <!-- Integrated Search Box untuk Barang -->
                        <div id="integratedSearchBarangContainer" class="relative hidden">
                            <label class="text-sm font-medium text-gray-600 mb-1 block">
                                <i class="fas fa-search mr-2"></i>Cari Barang
                            </label>
                            <div class="relative">
                                <input type="text" id="searchBarang" placeholder="Ketik untuk mencari barang..." 
                                       class="border border-gray-300 rounded-lg p-3 w-full bg-white hover:border-green-500 
                                              transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500">
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <i class="fas fa-search text-gray-400"></i>
                                </span>
                            </div>
                            
                            <!-- Dropdown hasil pencarian barang -->
                            <div id="searchBarangResults" class="absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded-lg shadow-lg max-h-60 overflow-y-auto hidden">
                                <!-- Hasil pencarian akan ditampilkan di sini -->
                            </div>
                            
                            <!-- Hidden input untuk menyimpan ID barang yang dipilih -->
                            <input type="hidden" id="selectedBarangId" name="barangtempat">
                            <div id="selectedBarangDisplay" class="mt-2 text-sm text-gray-700 hidden">
                                <span class="font-medium">Barang terpilih:</span> <span id="selectedBarangName"></span>
                            </div>
                        </div>

                        <!-- Integrated Search Box untuk Ruang -->
                        <div id="integratedSearchRuangContainer" class="relative hidden">
                            <label class="text-sm font-medium text-gray-600 mb-1 block">
                                <i class="fas fa-search mr-2"></i>Cari Ruang
                            </label>
                            <div class="relative">
                                <input type="text" id="searchRuang" placeholder="Ketik untuk mencari ruang..." 
                                       class="border border-gray-300 rounded-lg p-3 w-full bg-white hover:border-green-500 
                                              transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500">
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <i class="fas fa-search text-gray-400"></i>
                                </span>
                            </div>
                            
                            <!-- Dropdown hasil pencarian ruang -->
                            <div id="searchRuangResults" class="absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded-lg shadow-lg max-h-60 overflow-y-auto hidden">
                                <!-- Hasil pencarian akan ditampilkan di sini -->
                            </div>
                            
                            <!-- Hidden input untuk menyimpan ID ruang yang dipilih -->
                            <input type="hidden" id="selectedRuangId" name="ruangtempat">
                            <div id="selectedRuangDisplay" class="mt-2 text-sm text-gray-700 hidden">
                                <span class="font-medium">Ruang terpilih:</span> <span id="selectedRuangName"></span>
                            </div>
                            <input type="hidden" id="ruangNama" name="ruang_nama">
                        </div>

                        <div class="relative">
                            <label class="text-sm font-medium text-gray-600 mb-1 block">
                                <i class="fas fa-clock mr-2"></i>Waktu
                            </label>
                            <input type="time" name="jam" required 
                                   class="border border-gray-300 rounded-lg p-3 w-full hover:border-green-500 
                                          transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500" />
                        </div>

                        <div class="relative">
                            <label class="text-sm font-medium text-gray-600 mb-1 block">
                                <i class="fas fa-comment-alt mr-2"></i>Catatan
                            </label>
                            <textarea name="catatan" placeholder="Tambahkan catatan untuk admin (Wajib)" 
                                      class="border border-gray-300 rounded-lg p-3 w-full bg-white hover:border-green-500 
                                             transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500"
                                      rows="3"></textarea>
                        </div>
                    </div>

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
        document.addEventListener('DOMContentLoaded', function() {
            // Elemen-elemen
            const selectType = document.getElementById('select-type');
            const integratedSearchBarangContainer = document.getElementById('integratedSearchBarangContainer');
            const integratedSearchRuangContainer = document.getElementById('integratedSearchRuangContainer');
            const searchBarang = document.getElementById('searchBarang');
            const searchRuang = document.getElementById('searchRuang');
            const searchBarangResults = document.getElementById('searchBarangResults');
            const searchRuangResults = document.getElementById('searchRuangResults');
            const selectedBarangId = document.getElementById('selectedBarangId');
            const selectedRuangId = document.getElementById('selectedRuangId');
            const selectedBarangDisplay = document.getElementById('selectedBarangDisplay');
            const selectedRuangDisplay = document.getElementById('selectedRuangDisplay');
            const selectedBarangName = document.getElementById('selectedBarangName');
            const selectedRuangName = document.getElementById('selectedRuangName');
            const ruangNama = document.getElementById('ruangNama');
            
            // Data barang untuk pencarian
            const barangData = [
                @foreach ($barangs as $barang)
                {
                    id: '{{ $barang->id }}',
                    nama: '{{ $barang->nama_barang }}',
                    kondisi: '{{ $barang->kondisi_barang }}',
                    searchText: '{{ strtolower($barang->nama_barang) }} {{ strtolower($barang->kondisi_barang) }}'
                },
                @endforeach
            ];
            
            // Data ruang untuk pencarian
            const ruangData = [
                @foreach ($ruangs as $ruang)
                {
                    id: '{{ $ruang->id }}',
                    nama: '{{ $ruang->name }}',
                    searchText: '{{ strtolower($ruang->name) }}'
                },
                @endforeach
            ];
            
            // Event listener untuk perubahan jenis
            selectType.addEventListener('change', function() {
                if (this.value === 'barang') {
                    // Tampilkan integrated search barang
                    integratedSearchBarangContainer.classList.remove('hidden');
                    
                    // Sembunyikan integrated search ruang
                    integratedSearchRuangContainer.classList.add('hidden');
                    
                    // Reset value barang
                    searchBarang.value = '';
                    selectedBarangId.value = '';
                    selectedBarangDisplay.classList.add('hidden');
                    
                    // Reset value ruang
                    searchRuang.value = '';
                    selectedRuangId.value = '';
                    selectedRuangDisplay.classList.add('hidden');
                    ruangNama.value = '';
                } else if (this.value === 'ruang') {
                    // Tampilkan integrated search ruang
                    integratedSearchRuangContainer.classList.remove('hidden');
                    
                    // Sembunyikan integrated search barang
                    integratedSearchBarangContainer.classList.add('hidden');
                    
                    // Reset value barang
                    searchBarang.value = '';
                    selectedBarangId.value = '';
                    selectedBarangDisplay.classList.add('hidden');
                    
                    // Reset value ruang
                    searchRuang.value = '';
                    selectedRuangId.value = '';
                    selectedRuangDisplay.classList.add('hidden');
                    ruangNama.value = '';
                }
            });
            
            // Event listener untuk pencarian barang
            searchBarang.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                // Bersihkan hasil pencarian sebelumnya
                searchBarangResults.innerHTML = '';
                
                if (searchTerm.length > 0) {
                    // Filter barang berdasarkan kata kunci pencarian
                    const filteredBarang = barangData.filter(item => 
                        item.searchText.includes(searchTerm)
                    );
                    
                    if (filteredBarang.length > 0) {
                        // Tampilkan dropdown hasil pencarian
                        searchBarangResults.classList.remove('hidden');
                        
                        // Buat elemen untuk setiap hasil
                        filteredBarang.forEach(item => {
                            const resultItem = document.createElement('div');
                            resultItem.className = 'p-3 hover:bg-gray-100 cursor-pointer';
                            resultItem.innerHTML = `${item.nama} - ${item.kondisi}`;
                            
                            // Event saat item dipilih
                            resultItem.addEventListener('click', function() {
                                selectedBarangId.value = item.id;
                                searchBarang.value = `${item.nama} - ${item.kondisi}`;
                                selectedBarangName.textContent = `${item.nama} - ${item.kondisi}`;
                                selectedBarangDisplay.classList.remove('hidden');
                                
                                // Sembunyikan dropdown hasil
                                searchBarangResults.classList.add('hidden');
                            });
                            
                            searchBarangResults.appendChild(resultItem);
                        });
                    } else {
                        // Tidak ada hasil yang ditemukan
                        const noResult = document.createElement('div');
                        noResult.className = 'p-3 text-gray-500';
                        noResult.textContent = 'Tidak ada barang yang ditemukan';
                        searchBarangResults.appendChild(noResult);
                        searchBarangResults.classList.remove('hidden');
                    }
                } else {
                    // Sembunyikan dropdown jika field pencarian kosong
                    searchBarangResults.classList.add('hidden');
                }
            });
            
            // Event listener untuk pencarian ruang
            searchRuang.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                // Bersihkan hasil pencarian sebelumnya
                searchRuangResults.innerHTML = '';
                
                if (searchTerm.length > 0) {
                    // Filter ruang berdasarkan kata kunci pencarian
                    const filteredRuang = ruangData.filter(item => 
                        item.searchText.includes(searchTerm)
                    );
                    
                    if (filteredRuang.length > 0) {
                        // Tampilkan dropdown hasil pencarian
                        searchRuangResults.classList.remove('hidden');
                        
                        // Buat elemen untuk setiap hasil
                        filteredRuang.forEach(item => {
                            const resultItem = document.createElement('div');
                            resultItem.className = 'p-3 hover:bg-gray-100 cursor-pointer';
                            resultItem.innerHTML = `${item.nama}`;
                            
                            // Event saat item dipilih
                            resultItem.addEventListener('click', function() {
                                selectedRuangId.value = item.id;
                                searchRuang.value = item.nama;
                                selectedRuangName.textContent = item.nama;
                                selectedRuangDisplay.classList.remove('hidden');
                                ruangNama.value = item.nama;
                                
                                // Sembunyikan dropdown hasil
                                searchRuangResults.classList.add('hidden');
                            });
                            
                            searchRuangResults.appendChild(resultItem);
                        });
                    } else {
                        // Tidak ada hasil yang ditemukan
                        const noResult = document.createElement('div');
                        noResult.className = 'p-3 text-gray-500';
                        noResult.textContent = 'Tidak ada ruang yang ditemukan';
                        searchRuangResults.appendChild(noResult);
                        searchRuangResults.classList.remove('hidden');
                    }
                } else {
                    // Sembunyikan dropdown jika field pencarian kosong
                    searchRuangResults.classList.add('hidden');
                }
            });
            
            // Sembunyikan hasil pencarian barang saat mengklik di luar
            document.addEventListener('click', function(e) {
                if (!searchBarang.contains(e.target) && !searchBarangResults.contains(e.target)) {
                    searchBarangResults.classList.add('hidden');
                }
                if (!searchRuang.contains(e.target) && !searchRuangResults.contains(e.target)) {
                    searchRuangResults.classList.add('hidden');
                }
            });
        });
    </script>
</body>

@endsection