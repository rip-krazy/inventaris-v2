@extends('home')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --emerald-50: #ecfdf5; --emerald-100: #d1fae5; --emerald-200: #a7f3d0; --emerald-300: #6ee7b7;
        --emerald-400: #34d399; --emerald-500: #10b981; --emerald-600: #059669; --emerald-700: #047857;
        --emerald-800: #065f46; --emerald-900: #064e3b;
    }
    
    body { font-family: 'Plus Jakarta Sans', sans-serif; background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); min-height: 100vh; }
    
    .form-container {
        background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3); box-shadow: 0 25px 50px -12px rgba(16, 185, 129, 0.15);
        transition: all 0.3s ease;
    }
    .form-container:hover { box-shadow: 0 30px 60px -10px rgba(16, 185, 129, 0.2); }
    
    .form-header { background: linear-gradient(135deg, var(--emerald-500) 0%, var(--emerald-700) 100%); }
    
    .floating-label {
        position: absolute; top: -10px; left: 12px; font-size: 12px; background: white; padding: 0 8px;
        color: var(--emerald-700); font-weight: 600; border-radius: 9999px;
        box-shadow: 0 2px 4px rgba(5, 150, 105, 0.1); z-index: 10;
    }
    
    .input-field {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid var(--emerald-100);
    }
    .input-field:focus { box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2); border-color: var(--emerald-300); }
    
    .search-result-item { transition: all 0.2s ease; }
    .search-result-item:hover { background-color: var(--emerald-50); transform: translateX(3px); }
    
    .submit-btn {
        position: relative; overflow: hidden; box-shadow: 0 4px 15px rgba(5, 150, 105, 0.3);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        background: linear-gradient(135deg, var(--emerald-500) 0%, var(--emerald-600) 100%); border: none;
    }
    .submit-btn:hover {
        transform: translateY(-3px); box-shadow: 0 8px 25px rgba(5, 150, 105, 0.4);
        background: linear-gradient(135deg, var(--emerald-600) 0%, var(--emerald-700) 100%);
    }
    .submit-btn:active { transform: translateY(0); box-shadow: 0 4px 15px rgba(5, 150, 105, 0.3); }
    .submit-btn::after {
        content: ''; position: absolute; top: -50%; left: -60%; width: 200%; height: 200%;
        background: linear-gradient(to right, rgba(255, 255, 255, 0.13) 0%, rgba(255, 255, 255, 0.13) 77%, rgba(255, 255, 255, 0.5) 92%, rgba(255, 255, 255, 0.0) 100%);
        transform: rotate(30deg); transition: all 0.7s ease;
    }
    .submit-btn:hover::after { left: 100%; }
    
    .divider {
        display: flex; align-items: center; text-align: center; color: var(--emerald-400); margin: 1.5rem 0;
    }
    .divider::before, .divider::after { content: ''; flex: 1; border-bottom: 1px dashed var(--emerald-200); }
    .divider::before { margin-right: 1.5rem; }
    .divider::after { margin-left: 1.5rem; }
    
    .selected-item-card {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.05) 0%, rgba(6, 95, 70, 0.03) 100%);
        border: 1px dashed var(--emerald-300); border-radius: 12px;
    }
    
    .type-selector {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23059669' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 1rem center; background-repeat: no-repeat; background-size: 1.5em 1.5em; padding-right: 2.5rem;
    }
    
    .notification { animation: slideIn 0.5s ease-out forwards; }
    @keyframes slideIn { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
    
    .loading-spin { animation: spin 1s linear infinite; }
    @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
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
                    <h1 class="text-3xl font-bold text-white mb-2">Formulir Peminjaman</h1>
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
                        <div class="relative">
                            <div class="relative">
                                <input type="text" name="nama" value="{{ old('nama', $user->name) }}" readonly 
                                       class="input-field rounded-xl px-4 py-3 w-full bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                                <label class="floating-label"><i class="fas fa-user mr-1 text-xs"></i>Nama Lengkap</label>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="relative">
                                <input type="text" name="mapel" value="{{ old('mapel', $user->mapel) }}" readonly 
                                       class="input-field rounded-xl px-4 py-3 w-full bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                                <label class="floating-label"><i class="fas fa-book-open mr-1 text-xs"></i>Mata Pelajaran</label>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="divider text-sm font-medium"><i class="fas fa-ellipsis-h"></i></div>

                    <!-- Form Fields -->
                    <div class="space-y-6">
                        <!-- Type Selection -->
                        <div class="relative">
                            <div class="relative">
                                <select id="select-type" name="jenis" required 
                                        class="type-selector appearance-none input-field rounded-xl px-4 py-3 w-full bg-white hover:border-emerald-300 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                    <option value="" disabled selected>Pilih Jenis Peminjaman</option>
                                    <option value="barang">Barang</option>
                                    <option value="ruang">Ruang</option>
                                </select>
                                <label class="floating-label"><i class="fas fa-tags mr-1 text-xs"></i>Jenis Peminjaman</label>
                            </div>
                        </div>

                        <!-- Integrated Search Containers -->
                        <div id="integratedSearchBarangContainer" class="relative hidden">
                            <div class="relative">
                                <input type="text" id="searchBarang" placeholder=" " 
                                       class="input-field rounded-xl px-4 py-3 w-full bg-white hover:border-emerald-300 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                                <label class="floating-label"><i class="fas fa-search mr-1 text-xs"></i>Cari Barang</label>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="fas fa-boxes text-emerald-300"></i>
                                </div>
                            </div>
                            <div id="searchBarangResults" class="absolute z-20 mt-2 w-full bg-white border border-emerald-100 rounded-xl shadow-xl max-h-60 overflow-y-auto hidden"></div>
                            <input type="hidden" id="selectedBarangId" name="barangtempat">
                            <div id="selectedBarangDisplay" class="mt-4 hidden animate__animated animate__fadeIn">
                                <div class="selected-item-card flex items-center rounded-xl p-4">
                                    <div class="bg-emerald-100 p-3 rounded-full mr-4"><i class="fas fa-check-circle text-emerald-600"></i></div>
                                    <div>
                                        <p class="text-xs font-medium text-gray-500">BARANG DIPILIH</p>
                                        <p id="selectedBarangName" class="text-emerald-700 font-semibold"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="integratedSearchRuangContainer" class="relative hidden">
                            <div class="relative">
                                <input type="text" id="searchRuang" placeholder=" " 
                                       class="input-field rounded-xl px-4 py-3 w-full bg-white hover:border-emerald-300 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                                <label class="floating-label"><i class="fas fa-search mr-1 text-xs"></i>Cari Ruang</label>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="fas fa-door-open text-emerald-300"></i>
                                </div>
                            </div>
                            <div id="searchRuangResults" class="absolute z-20 mt-2 w-full bg-white border border-emerald-100 rounded-xl shadow-xl max-h-60 overflow-y-auto hidden"></div>
                            <input type="hidden" id="selectedRuangId" name="ruangtempat">
                            <div id="selectedRuangDisplay" class="mt-4 hidden animate__animated animate__fadeIn">
                                <div class="selected-item-card flex items-center rounded-xl p-4">
                                    <div class="bg-emerald-100 p-3 rounded-full mr-4"><i class="fas fa-check-circle text-emerald-600"></i></div>
                                    <div>
                                        <p class="text-xs font-medium text-gray-500">RUANG DIPILIH</p>
                                        <p id="selectedRuangName" class="text-emerald-700 font-semibold"></p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="ruangNama" name="ruang_nama">
                        </div>

                        <!-- Time Fields -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="relative">
                                <div class="relative">
                                    <select name="jam_dari" required 
                                            class="type-selector appearance-none input-field rounded-xl px-4 py-3 w-full bg-white hover:border-emerald-300 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                        <option value="" disabled selected>Pilih</option>
                                        @for($i = 1; $i <= 10; $i++)<option value="{{$i}}">{{$i}}</option>@endfor
                                    </select>
                                    <label class="floating-label"><i class="far fa-clock mr-1 text-xs"></i>Dari Jam</label>
                                </div>
                            </div>
                            
                            <div class="relative">
                                <div class="relative">
                                    <select name="jam_sampai" required 
                                            class="type-selector appearance-none input-field rounded-xl px-4 py-3 w-full bg-white hover:border-emerald-300 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                        <option value="" disabled selected>Pilih</option>
                                        @for($i = 1; $i <= 10; $i++)<option value="{{$i}}">{{$i}}</option>@endfor
                                    </select>
                                    <label class="floating-label"><i class="far fa-clock mr-1 text-xs"></i>Sampai Jam</label>
                                </div>
                            </div>
                        </div>

                        <!-- Notes Field -->
                        <div class="relative">
                            <div class="relative">
                                <textarea name="catatan" placeholder=" " 
                                          class="input-field rounded-xl px-4 py-3 w-full bg-white hover:border-emerald-300 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                          rows="3"></textarea>
                                <label class="floating-label"><i class="far fa-sticky-note mr-1 text-xs"></i>Catatan</label>
                            </div>
                            <p class="mt-2 text-xs text-emerald-600 font-medium">
                                <i class="fas fa-info-circle mr-1"></i>Berikan catatan detail untuk admin
                            </p>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" 
                                class="submit-btn w-full text-white rounded-xl px-6 py-4 flex items-center justify-center font-semibold tracking-wide text-lg">
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
            const elements = {
                selectType: document.getElementById('select-type'),
                barangContainer: document.getElementById('integratedSearchBarangContainer'),
                ruangContainer: document.getElementById('integratedSearchRuangContainer'),
                searchBarang: document.getElementById('searchBarang'),
                searchRuang: document.getElementById('searchRuang'),
                barangResults: document.getElementById('searchBarangResults'),
                ruangResults: document.getElementById('searchRuangResults'),
                selectedBarangId: document.getElementById('selectedBarangId'),
                selectedRuangId: document.getElementById('selectedRuangId'),
                barangDisplay: document.getElementById('selectedBarangDisplay'),
                ruangDisplay: document.getElementById('selectedRuangDisplay'),
                barangName: document.getElementById('selectedBarangName'),
                ruangName: document.getElementById('selectedRuangName'),
                ruangNama: document.getElementById('ruangNama'),
                jamDari: document.querySelector('select[name="jam_dari"]'),
                jamSampai: document.querySelector('select[name="jam_sampai"]'),
                form: document.getElementById('peminjamanForm')
            };
            
            // Data - Updated to include kode_barang for display
            const barangData = [@foreach ($barangs as $barang)
                @if($barang->kondisi_barang === 'Baik')
                    {
                        id: '{{ $barang->id }}', 
                        nama: '{{ $barang->nama_barang }}', 
                        kode: '{{ $barang->kode_barang ?? "N/A" }}',
                        kondisi: '{{ $barang->kondisi_barang }}', 
                        searchText: '{{ strtolower($barang->nama_barang) }} {{ strtolower($barang->kode_barang ?? "") }} {{ strtolower($barang->kondisi_barang) }}'
                    },
                @endif
            @endforeach];
            const ruangData = [@foreach ($ruangs as $ruang)
                {
                    id: '{{ $ruang->id }}',
                    nama: '{{ $ruang->name }}',
                    tersedia: {{ str_contains($ruang->description, 'Dipinjam') ? 'false' : 'true' }},
                    searchText: '{{ strtolower($ruang->name) }}'
                },
            @endforeach];
            
            // Helper functions
            function toggleContainer(show, hide) {
                show.classList.remove('hidden');
                show.classList.add('animate__animated', 'animate__fadeIn');
                hide.classList.add('hidden');
                setTimeout(() => show.classList.remove('animate__animated', 'animate__fadeIn'), 1000);
            }
            
            function resetFields(fields) {
                fields.forEach(field => {
                    if (field.type === 'text') field.value = '';
                    else field.classList.add('hidden');
                });
            }
            
            function createSearchResult(item, type) {
            if (type === 'barang') {
                // Tampilan untuk barang (tetap sama seperti sebelumnya)
                const icon = 'fa-box';
                const kondisiHtml = `<p class="text-xs text-emerald-600 mt-1"><span class="bg-emerald-50 px-2 py-1 rounded-md">${item.kondisi}</span></p>`;
                const kodeHtml = `<p class="text-xs text-gray-500 mt-0.5">Kode: ${item.kode}</p>`;
                
                const resultItem = document.createElement('div');
                resultItem.className = 'search-result-item p-4 hover:bg-emerald-50 cursor-pointer border-b border-emerald-50 last:border-0';
                resultItem.innerHTML = `
                    <div class="flex items-center">
                        <div class="bg-emerald-100 p-2 rounded-lg mr-3"><i class="fas ${icon} text-emerald-600"></i></div>
                        <div class="flex-1">
                            <p class="font-medium text-gray-800">${item.nama}</p>
                            ${kodeHtml}
                            ${kondisiHtml}
                        </div>
                        <div class="text-emerald-400"><i class="fas fa-chevron-right"></i></div>
                    </div>
                `;
                return resultItem;
            } else {
                // Tampilan untuk ruangan dengan status ketersediaan
                const isAvailable = !item.description || !item.description.includes('Dipinjam');
                const icon = isAvailable ? 'fa-door-open text-emerald-600' : 'fa-door-closed text-gray-400';
                const statusHtml = isAvailable 
                    ? '<p class="text-xs text-emerald-600 mt-1"><span class="bg-emerald-50 px-2 py-1 rounded-md">Tersedia</span></p>'
                    : '<p class="text-xs text-gray-500 mt-1"><span class="bg-gray-50 px-2 py-1 rounded-md">Sedang Dipinjam</span></p>';
                
                const resultItem = document.createElement('div');
                resultItem.className = `search-result-item p-4 ${isAvailable ? 'hover:bg-emerald-50 cursor-pointer' : 'cursor-not-allowed opacity-70'} border-b border-gray-100 last:border-0`;
                resultItem.innerHTML = `
                    <div class="flex items-center">
                        <div class="${isAvailable ? 'bg-emerald-100' : 'bg-gray-100'} p-2 rounded-lg mr-3">
                            <i class="fas ${icon}"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium ${isAvailable ? 'text-gray-800' : 'text-gray-500'}">${item.nama}</p>
                            ${statusHtml}
                        </div>
                        <div class="${isAvailable ? 'text-emerald-400' : 'text-gray-400'}">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                `;
                
                if (isAvailable) {
                    resultItem.addEventListener('click', () => selectItem(item, type));
                } else {
                    resultItem.addEventListener('click', (e) => {
                        e.preventDefault();
                        alert('Ruangan ini sedang tidak tersedia untuk dipinjam');
                    });
                }
                
                return resultItem;
            }
        }
            
            function createNoResult(type) {
                const noResult = document.createElement('div');
                noResult.className = 'p-6 text-center text-gray-500';
                noResult.innerHTML = `
                    <div class="bg-emerald-50 inline-flex p-3 rounded-full mb-3">
                        <i class="fas fa-search-minus text-emerald-400 text-xl"></i>
                    </div>
                    <p class="font-medium">${type} tidak ditemukan</p>
                    <p class="text-xs mt-1">Coba dengan kata kunci lain</p>
                `;
                return noResult;
            }
            
            function handleSearch(searchEl, data, resultsEl, type) {
                searchEl.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    resultsEl.innerHTML = '';
                    
                    if (searchTerm.length > 0) {
                        // Untuk barang, filter hanya yang kondisi baik
                        const filtered = type === 'barang' 
                            ? data.filter(item => item.kondisi === 'Baik' && item.searchText.includes(searchTerm))
                            : data.filter(item => item.searchText.includes(searchTerm));
                        
                        if (filtered.length > 0) {
                            resultsEl.classList.remove('hidden');
                            filtered.forEach(item => {
                                const resultItem = createSearchResult(item, type);
                                resultItem.addEventListener('click', () => selectItem(item, type));
                                resultsEl.appendChild(resultItem);
                            });
                        } else {
                            resultsEl.appendChild(createNoResult(type === 'barang' ? 'Barang' : 'Ruangan'));
                            resultsEl.classList.remove('hidden');
                            
                            // Tambahkan pesan khusus jika mencari barang rusak
                            if (type === 'barang' && data.some(item => item.kondisi === 'Rusak' && item.searchText.includes(searchTerm))) {
                                const warning = document.createElement('div');
                                warning.className = 'p-4 bg-yellow-50 text-yellow-700 border-t border-yellow-100 text-sm';
                                warning.innerHTML = `
                                    <div class="flex items-center">
                                        <i class="fas fa-exclamation-triangle mr-2"></i>
                                        <span>Barang dalam kondisi rusak tidak dapat dipinjam</span>
                                    </div>
                                `;
                                resultsEl.appendChild(warning);
                            }
                        }
                    } else {
                        resultsEl.classList.add('hidden');
                    }
                });
            }
            
            function selectItem(item, type) {
                if (type === 'barang') {
                    elements.selectedBarangId.value = item.id;
                    elements.searchBarang.value = item.nama;
                    // Changed to show nama and kode instead of nama and ID
                    elements.barangName.textContent = `${item.nama} (${item.kode})`;
                    elements.barangDisplay.classList.remove('hidden');
                    elements.barangDisplay.classList.add('animate__animated', 'animate__fadeIn');
                    elements.barangResults.classList.add('hidden');
                } else {
                    elements.selectedRuangId.value = item.id;
                    elements.searchRuang.value = item.nama;
                    elements.ruangName.textContent = item.nama;
                    elements.ruangDisplay.classList.remove('hidden');
                    elements.ruangDisplay.classList.add('animate__animated', 'animate__fadeIn');
                    elements.ruangNama.value = item.nama;
                    elements.ruangResults.classList.add('hidden');
                }
                
                setTimeout(() => {
                    if (type === 'barang') {
                        elements.barangDisplay.classList.remove('animate__animated', 'animate__fadeIn');
                    } else {
                        elements.ruangDisplay.classList.remove('animate__animated', 'animate__fadeIn');
                    }
                }, 1000);
            }
            
            // Event Listeners
            elements.selectType.addEventListener('change', function() {
                if (this.value === 'barang') {
                    toggleContainer(elements.barangContainer, elements.ruangContainer);
                    resetFields([elements.searchBarang, elements.selectedBarangId, elements.barangDisplay, elements.searchRuang, elements.selectedRuangId, elements.ruangDisplay, elements.ruangNama]);
                } else if (this.value === 'ruang') {
                    toggleContainer(elements.ruangContainer, elements.barangContainer);
                    resetFields([elements.searchBarang, elements.selectedBarangId, elements.barangDisplay, elements.searchRuang, elements.selectedRuangId, elements.ruangDisplay, elements.ruangNama]);
                }
            });
            
            // Form submission validation
            elements.form.addEventListener('submit', function(e) {
                // Validasi waktu
                const fromTime = parseInt(elements.jamDari.value);
                const toTime = parseInt(elements.jamSampai.value);
                
                if (fromTime >= toTime) {
                    e.preventDefault();
                    alert('Waktu "Sampai Jam" harus lebih besar dari "Dari Jam"');
                    return false;
                }
                
                // Validasi jenis peminjaman
                const jenis = elements.selectType.value;
                if (jenis === 'barang' && !elements.selectedBarangId.value) {
                    e.preventDefault();
                    alert('Silakan pilih barang yang akan dipinjam');
                    return false;
                } else if (jenis === 'ruang' && !elements.selectedRuangId.value) {
                    e.preventDefault();
                    alert('Silakan pilih ruang yang akan dipinjam');
                    return false;
                }
                
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.innerHTML = '<i class="fas fa-circle-notch loading-spin mr-2"></i>Mengajukan Permohonan...';
                submitBtn.disabled = true;
            });
            
            // Setup search functionality
            handleSearch(elements.searchBarang, barangData, elements.barangResults, 'barang');
            handleSearch(elements.searchRuang, ruangData, elements.ruangResults, 'ruang');
            
            // Close search results when clicking outside
            document.addEventListener('click', function(e) {
                if (!elements.searchBarang.contains(e.target) && !elements.barangResults.contains(e.target)) {
                    elements.barangResults.classList.add('hidden');
                }
                if (!elements.searchRuang.contains(e.target) && !elements.ruangResults.contains(e.target)) {
                    elements.ruangResults.classList.add('hidden');
                }
            });
            
            // Notification handling
            const notification = document.querySelector('.notification');
            if (notification) {
                const closeBtn = notification.querySelector('button');
                closeBtn.addEventListener('click', () => {
                    notification.classList.add('animate__animated', 'animate__fadeOut');
                    setTimeout(() => notification.remove(), 500);
                });
                setTimeout(() => {
                    notification.classList.add('animate__animated', 'animate__fadeOut');
                    setTimeout(() => notification.remove(), 500);
                }, 5000);
            }
        });
    </script>
</body>
@endsection