@extends('home')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --emerald-50: #ecfdf5;
        --emerald-100: #d1fae5;
        --emerald-200: #a7f3d0;
        --emerald-300: #6ee7b7;
        --emerald-400: #34d399;
        --emerald-500: #10b981;
        --emerald-600: #059669;
        --emerald-700: #047857;
        --emerald-800: #065f46;
        --emerald-900: #064e3b;
    }
    
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
        min-height: 100vh;
    }
    
    .form-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 25px 50px -12px rgba(16, 185, 129, 0.15);
        transition: all 0.3s ease;
    }
    
    .form-container:hover {
        box-shadow: 0 30px 60px -10px rgba(16, 185, 129, 0.2);
    }
    
    .form-header {
        background: linear-gradient(135deg, var(--emerald-500) 0%, var(--emerald-700) 100%);
    }
    
    .floating-label {
        position: absolute;
        top: -10px;
        left: 12px;
        font-size: 12px;
        background: white;
        padding: 0 8px;
        color: var(--emerald-700);
        font-weight: 600;
        border-radius: 9999px;
        box-shadow: 0 2px 4px rgba(5, 150, 105, 0.1);
        z-index: 10;
    }
    
    .input-field {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid var(--emerald-100);
    }
    
    .input-field:focus {
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        border-color: var(--emerald-300);
    }
    
    .search-result-item {
        transition: all 0.2s ease;
    }
    
    .search-result-item:hover {
        background-color: var(--emerald-50);
        transform: translateX(3px);
    }
    
    .submit-btn {
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(5, 150, 105, 0.3);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        background: linear-gradient(135deg, var(--emerald-500) 0%, var(--emerald-600) 100%);
        border: none;
    }
    
    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(5, 150, 105, 0.4);
        background: linear-gradient(135deg, var(--emerald-600) 0%, var(--emerald-700) 100%);
    }
    
    .submit-btn:active {
        transform: translateY(0);
        box-shadow: 0 4px 15px rgba(5, 150, 105, 0.3);
    }
    
    .submit-btn::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -60%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            to right,
            rgba(255, 255, 255, 0.13) 0%,
            rgba(255, 255, 255, 0.13) 77%,
            rgba(255, 255, 255, 0.5) 92%,
            rgba(255, 255, 255, 0.0) 100%
        );
        transform: rotate(30deg);
        transition: all 0.7s ease;
    }
    
    .submit-btn:hover::after {
        left: 100%;
    }
    
    .divider {
        display: flex;
        align-items: center;
        text-align: center;
        color: var(--emerald-400);
        margin: 1.5rem 0;
    }
    
    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px dashed var(--emerald-200);
    }
    
    .divider::before {
        margin-right: 1.5rem;
    }
    
    .divider::after {
        margin-left: 1.5rem;
    }
    
    .selected-item-card {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.05) 0%, rgba(6, 95, 70, 0.03) 100%);
        border: 1px dashed var(--emerald-300);
        border-radius: 12px;
    }
    
    .type-selector {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23059669' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 1rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
    }
    
    .notification {
        animation: slideIn 0.5s ease-out forwards;
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .loading-spin {
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<body class="bg-emerald-50">
    <div class="w-full px-4 md:px-0 md:max-w-4xl mx-auto py-8 animate__animated animate__fadeIn">
        <div class="form-container rounded-2xl overflow-hidden">
            <!-- Premium Header -->
            <div class="form-header px-8 py-6 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-400/10 to-emerald-600/10"></div>
                <div class="relative">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full backdrop-blur-sm mb-4">
                        <i class="fas fa-clipboard-check text-white text-2xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-white mb-2">
                        Formulir Peminjaman
                    </h1>
                    <p class="text-white/90 font-light">Lengkapi formulir untuk meminjam barang atau ruangan</p>
                </div>
            </div>

            <!-- Notification -->
            @if(session('notification'))
                <div class="mx-6 mt-6 notification">
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl flex items-center justify-between shadow-sm">
                        <div class="flex items-center">
                            <div class="bg-emerald-100 p-2 rounded-full mr-3">
                                <i class="fas fa-check-circle text-emerald-600"></i>
                            </div>
                            <span>{{ session('notification') }}</span>
                        </div>
                        <button class="text-emerald-700 hover:text-emerald-900 transition-colors">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Form Content -->
            <div class="p-8">
                <form id="peminjamanForm" action="{{ route('peminjaman.submit') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <!-- User Info Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name Field -->
                        <div class="relative">
                            <div class="relative">
                                <input type="text" name="nama" value="{{ old('nama', $user->name) }}" readonly 
                                       class="input-field rounded-xl px-4 py-3 w-full bg-white text-gray-700 
                                              focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                                <label class="floating-label">
                                    <i class="fas fa-user mr-1 text-xs"></i>Nama Lengkap
                                </label>
                            </div>
                        </div>

                        <!-- Subject Field -->
                        <div class="relative">
                            <div class="relative">
                                <input type="text" name="mapel" value="{{ old('mapel', $user->mapel) }}" readonly 
                                       class="input-field rounded-xl px-4 py-3 w-full bg-white text-gray-700 
                                              focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                                <label class="floating-label">
                                    <i class="fas fa-book-open mr-1 text-xs"></i>Mata Pelajaran
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="divider text-sm font-medium">
                        <i class="fas fa-ellipsis-h"></i>
                    </div>

                    <!-- Form Fields -->
                    <div class="space-y-6">
                        <!-- Type Selection -->
                        <div class="relative">
                            <div class="relative">
                                <select id="select-type" name="jenis" required 
                                        class="type-selector appearance-none input-field rounded-xl px-4 py-3 w-full bg-white 
                                               hover:border-emerald-300 transition-colors duration-200 
                                               focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                    <option value="" disabled selected>Pilih Jenis Peminjaman</option>
                                    <option value="barang">Barang</option>
                                    <option value="ruang">Ruang</option>
                                </select>
                                <label class="floating-label">
                                    <i class="fas fa-tags mr-1 text-xs"></i>Jenis Peminjaman
                                </label>
                            </div>
                        </div>

                        <!-- Integrated Search Box untuk Barang -->
                        <div id="integratedSearchBarangContainer" class="relative hidden">
                            <div class="relative">
                                <input type="text" id="searchBarang" placeholder=" " 
                                       class="input-field rounded-xl px-4 py-3 w-full bg-white 
                                              hover:border-emerald-300 transition-colors duration-200 
                                              focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                                <label class="floating-label">
                                    <i class="fas fa-search mr-1 text-xs"></i>Cari Barang
                                </label>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="fas fa-boxes text-emerald-300"></i>
                                </div>
                            </div>
                            
                            <!-- Dropdown hasil pencarian barang -->
                            <div id="searchBarangResults" class="absolute z-20 mt-2 w-full bg-white border border-emerald-100 rounded-xl shadow-xl max-h-60 overflow-y-auto hidden">
                                <!-- Results will appear here -->
                            </div>
                            
                            <!-- Selected Item Display -->
                            <input type="hidden" id="selectedBarangId" name="barangtempat">
                            <div id="selectedBarangDisplay" class="mt-4 hidden animate__animated animate__fadeIn">
                                <div class="selected-item-card flex items-center rounded-xl p-4">
                                    <div class="bg-emerald-100 p-3 rounded-full mr-4">
                                        <i class="fas fa-check-circle text-emerald-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs font-medium text-gray-500">BARANG DIPILIH</p>
                                        <p id="selectedBarangName" class="text-emerald-700 font-semibold"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Integrated Search Box untuk Ruang -->
                        <div id="integratedSearchRuangContainer" class="relative hidden">
                            <div class="relative">
                                <input type="text" id="searchRuang" placeholder=" " 
                                       class="input-field rounded-xl px-4 py-3 w-full bg-white 
                                              hover:border-emerald-300 transition-colors duration-200 
                                              focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                                <label class="floating-label">
                                    <i class="fas fa-search mr-1 text-xs"></i>Cari Ruang
                                </label>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="fas fa-door-open text-emerald-300"></i>
                                </div>
                            </div>
                            
                            <!-- Dropdown hasil pencarian ruang -->
                            <div id="searchRuangResults" class="absolute z-20 mt-2 w-full bg-white border border-emerald-100 rounded-xl shadow-xl max-h-60 overflow-y-auto hidden">
                                <!-- Results will appear here -->
                            </div>
                            
                            <!-- Selected Item Display -->
                            <input type="hidden" id="selectedRuangId" name="ruangtempat">
                            <div id="selectedRuangDisplay" class="mt-4 hidden animate__animated animate__fadeIn">
                                <div class="selected-item-card flex items-center rounded-xl p-4">
                                    <div class="bg-emerald-100 p-3 rounded-full mr-4">
                                        <i class="fas fa-check-circle text-emerald-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs font-medium text-gray-500">RUANG DIPILIH</p>
                                        <p id="selectedRuangName" class="text-emerald-700 font-semibold"></p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="ruangNama" name="ruang_nama">
                        </div>

                        <!-- Time Field - MODIFIED TO USE DROPDOWNS -->
                        <div class="grid grid-cols-2 gap-4">
                            <!-- From Time Dropdown -->
                            <div class="relative">
                                <div class="relative">
                                    <select name="jam_dari" required 
                                            class="type-selector appearance-none input-field rounded-xl px-4 py-3 w-full bg-white 
                                                hover:border-emerald-300 transition-colors duration-200
                                                focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                        <option value="" disabled selected>Pilih</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <label class="floating-label">
                                        <i class="far fa-clock mr-1 text-xs"></i>Dari Jam
                                    </label>
                                </div>
                            </div>
                            
                            <!-- To Time Dropdown -->
                            <div class="relative">
                                <div class="relative">
                                    <select name="jam_sampai" required 
                                            class="type-selector appearance-none input-field rounded-xl px-4 py-3 w-full bg-white 
                                                hover:border-emerald-300 transition-colors duration-200
                                                focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                        <option value="" disabled selected>Pilih</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <label class="floating-label">
                                        <i class="far fa-clock mr-1 text-xs"></i>Sampai Jam
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Notes Field -->
                        <div class="relative">
                            <div class="relative">
                                <textarea name="catatan" placeholder=" " 
                                          class="input-field rounded-xl px-4 py-3 w-full bg-white 
                                                 hover:border-emerald-300 transition-colors duration-200 
                                                 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                          rows="3"></textarea>
                                <label class="floating-label">
                                    <i class="far fa-sticky-note mr-1 text-xs"></i>Catatan
                                </label>
                            </div>
                            <p class="mt-2 text-xs text-emerald-600 font-medium">
                                <i class="fas fa-info-circle mr-1"></i>Berikan catatan detail untuk admin
                            </p>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" 
                                class="submit-btn w-full text-white rounded-xl px-6 py-4 
                                       flex items-center justify-center font-semibold tracking-wide text-lg">
                            <i class="fas fa-paper-plane mr-3"></i>Ajukan Permohonan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
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
            
            // Added time range validation
            const jamDari = document.querySelector('select[name="jam_dari"]');
            const jamSampai = document.querySelector('select[name="jam_sampai"]');
            
            // Time range validation on form submit
            const form = document.getElementById('peminjamanForm');
            form.addEventListener('submit', function(e) {
                const fromTime = parseInt(jamDari.value);
                const toTime = parseInt(jamSampai.value);
                
                if (fromTime >= toTime) {
                    e.preventDefault();
                    alert('Waktu "Sampai Jam" harus lebih besar dari "Dari Jam"');
                    return false;
                }
                
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.innerHTML = '<i class="fas fa-circle-notch loading-spin mr-2"></i>Mengajukan Permohonan...';
                submitBtn.disabled = true;
            });
            
            // Barang data
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
            
            // Ruang data
            const ruangData = [
                @foreach ($ruangs as $ruang)
                {
                    id: '{{ $ruang->id }}',
                    nama: '{{ $ruang->name }}',
                    searchText: '{{ strtolower($ruang->name) }}'
                },
                @endforeach
            ];
            
            // Type selection change handler
            selectType.addEventListener('change', function() {
                if (this.value === 'barang') {
                    integratedSearchBarangContainer.classList.remove('hidden');
                    integratedSearchBarangContainer.classList.add('animate__animated', 'animate__fadeIn');
                    integratedSearchRuangContainer.classList.add('hidden');
                    
                    // Reset values
                    searchBarang.value = '';
                    selectedBarangId.value = '';
                    selectedBarangDisplay.classList.add('hidden');
                    
                    searchRuang.value = '';
                    selectedRuangId.value = '';
                    selectedRuangDisplay.classList.add('hidden');
                    ruangNama.value = '';
                } else if (this.value === 'ruang') {
                    integratedSearchRuangContainer.classList.remove('hidden');
                    integratedSearchRuangContainer.classList.add('animate__animated', 'animate__fadeIn');
                    integratedSearchBarangContainer.classList.add('hidden');
                    
                    // Reset values
                    searchBarang.value = '';
                    selectedBarangId.value = '';
                    selectedBarangDisplay.classList.add('hidden');
                    
                    searchRuang.value = '';
                    selectedRuangId.value = '';
                    selectedRuangDisplay.classList.add('hidden');
                    ruangNama.value = '';
                }
                
                // Remove animation classes after animation completes
                setTimeout(() => {
                    integratedSearchBarangContainer.classList.remove('animate__animated', 'animate__fadeIn');
                    integratedSearchRuangContainer.classList.remove('animate__animated', 'animate__fadeIn');
                }, 1000);
            });
            
            // Barang search functionality
            searchBarang.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                searchBarangResults.innerHTML = '';
                
                if (searchTerm.length > 0) {
                    const filteredBarang = barangData.filter(item => 
                        item.searchText.includes(searchTerm)
                    );
                    
                    if (filteredBarang.length > 0) {
                        searchBarangResults.classList.remove('hidden');
                        
                        filteredBarang.forEach(item => {
                            const resultItem = document.createElement('div');
                            resultItem.className = 'search-result-item p-4 hover:bg-emerald-50 cursor-pointer border-b border-emerald-50 last:border-0';
                            resultItem.innerHTML = `
                                <div class="flex items-center">
                                    <div class="bg-emerald-100 p-2 rounded-lg mr-3">
                                        <i class="fas fa-box text-emerald-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-medium text-gray-800">${item.nama}</p>
                                        <p class="text-xs text-emerald-600 mt-1">
                                            <span class="bg-emerald-50 px-2 py-1 rounded-md">${item.kondisi}</span>
                                        </p>
                                    </div>
                                    <div class="text-emerald-400">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            `;
                            
                            resultItem.addEventListener('click', function() {
                                selectedBarangId.value = item.id;
                                searchBarang.value = `${item.nama}`;
                                selectedBarangName.textContent = `${item.nama} (${item.kondisi})`;
                                selectedBarangDisplay.classList.remove('hidden');
                                selectedBarangDisplay.classList.add('animate__animated', 'animate__fadeIn');
                                searchBarangResults.classList.add('hidden');
                                
                                setTimeout(() => {
                                    selectedBarangDisplay.classList.remove('animate__animated', 'animate__fadeIn');
                                }, 1000);
                            });
                            
                            searchBarangResults.appendChild(resultItem);
                        });
                    } else {
                        const noResult = document.createElement('div');
                        noResult.className = 'p-6 text-center text-gray-500';
                        noResult.innerHTML = `
                            <div class="bg-emerald-50 inline-flex p-3 rounded-full mb-3">
                                <i class="fas fa-search-minus text-emerald-400 text-xl"></i>
                            </div>
                            <p class="font-medium">Barang tidak ditemukan</p>
                            <p class="text-xs mt-1">Coba dengan kata kunci lain</p>
                        `;
                        searchBarangResults.appendChild(noResult);
                        searchBarangResults.classList.remove('hidden');
                    }
                } else {
                    searchBarangResults.classList.add('hidden');
                }
            });
            
            // Ruang search functionality
            searchRuang.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                searchRuangResults.innerHTML = '';
                
                if (searchTerm.length > 0) {
                    const filteredRuang = ruangData.filter(item => 
                        item.searchText.includes(searchTerm)
                    );
                    
                    if (filteredRuang.length > 0) {
                        searchRuangResults.classList.remove('hidden');
                        
                        filteredRuang.forEach(item => {
                            const resultItem = document.createElement('div');
                            resultItem.className = 'search-result-item p-4 hover:bg-emerald-50 cursor-pointer border-b border-emerald-50 last:border-0';
                            resultItem.innerHTML = `
                                <div class="flex items-center">
                                    <div class="bg-emerald-100 p-2 rounded-lg mr-3">
                                        <i class="fas fa-door-open text-emerald-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-medium text-gray-800">${item.nama}</p>
                                    </div>
                                    <div class="text-emerald-400">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            `;
                            
                            resultItem.addEventListener('click', function() {
                                selectedRuangId.value = item.id;
                                searchRuang.value = item.nama;
                                selectedRuangName.textContent = item.nama;
                                selectedRuangDisplay.classList.remove('hidden');
                                selectedRuangDisplay.classList.add('animate__animated', 'animate__fadeIn');
                                ruangNama.value = item.nama;
                                searchRuangResults.classList.add('hidden');
                                
                                setTimeout(() => {
                                    selectedRuangDisplay.classList.remove('animate__animated', 'animate__fadeIn');
                                }, 1000);
                            });
                            
                            searchRuangResults.appendChild(resultItem);
                        });
                    } else {
                        const noResult = document.createElement('div');
                        noResult.className = 'p-6 text-center text-gray-500';
                        noResult.innerHTML = `
                            <div class="bg-emerald-50 inline-flex p-3 rounded-full mb-3">
                                <i class="fas fa-search-minus text-emerald-400 text-xl"></i>
                            </div>
                            <p class="font-medium">Ruangan tidak ditemukan</p>
                            <p class="text-xs mt-1">Coba dengan kata kunci lain</p>
                        `;
                        searchRuangResults.appendChild(noResult);
                        searchRuangResults.classList.remove('hidden');
                    }
                } else {
                    searchRuangResults.classList.add('hidden');
                }
            });
            
            // Close search results when clicking outside
            document.addEventListener('click', function(e) {
                if (!searchBarang.contains(e.target) && !searchBarangResults.contains(e.target)) {
                    searchBarangResults.classList.add('hidden');
                }
                
                if (!searchRuang.contains(e.target) && !searchRuangResults.contains(e.target)) {
                    searchRuangResults.classList.add('hidden');
                }
            });
            
            // Close notification if present
            const notification = document.querySelector('.notification');
            if (notification) {
                const closeBtn = notification.querySelector('button');
                closeBtn.addEventListener('click', function() {
                    notification.classList.add('animate__animated', 'animate__fadeOut');
                    setTimeout(() => {
                        notification.remove();
                    }, 500);
                });
                
                // Auto close after 5 seconds
                setTimeout(() => {
                    notification.classList.add('animate__animated', 'animate__fadeOut');
                    setTimeout(() => {
                        notification.remove();
                    }, 500);
                }, 5000);
            }
        });
    </script>
</body>
@endsection