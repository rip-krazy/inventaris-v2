@extends('main')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<div class="max-w-2xl mt-10 mx-auto">
    <div class="bg-gradient-to-br from-white to-green-50 rounded-2xl shadow-2xl p-12 my-10 animate__animated animate__fadeIn">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <i class="fas fa-edit text-5xl text-green-600 mb-4"></i>
            <h1 class="text-4xl font-extrabold text-gray-800">Edit Data Barang</h1>
            <p class="text-gray-600 mt-2">Perbarui informasi barang di bawah ini</p>
        </div>

        @if ($errors->any())
        <div class="mb-8 p-4 bg-red-100 border-l-4 border-red-500 rounded-lg">
            <ul class="list-disc list-inside text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('barangs.update', $barang) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')
            
            <!-- Current Code Display -->
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg mb-6">
                <div class="flex items-center">
                    <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                    <span class="text-blue-700">Kode barang saat ini: <strong>{{ $barang->kode_barang }}</strong></span>
                </div>
            </div>
            
            <!-- Form Container -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <!-- Nama Barang Field -->
                <div class="space-y-3">
                    <label class="block text-lg font-semibold text-gray-700">
                        <i class="fas fa-tag mr-2 text-green-600"></i>Nama Barang
                    </label>
                    <div class="relative">
                        <input type="text" 
                               name="nama_barang" 
                               id="nama_barang"
                               value="{{ old('nama_barang', $barang->nama_barang) }}"
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400"
                               placeholder="Masukkan nama barang"
                               required>
                        <i class="fas fa-box absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Nomor Urut Field -->
                <div class="space-y-3">
                    <label class="block text-lg font-semibold text-gray-700">
                        <i class="fas fa-sort-numeric-up mr-2 text-green-600"></i>Nomor Urut
                    </label>
                    <div class="relative">
                        <input type="number" 
                               name="nomor_urut" 
                               id="nomor_urut"
                               value="{{ old('nomor_urut', $nomor_urut ?? '') }}"
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400"
                               placeholder="0-999"
                               min="0"
                               max="999"
                               required>
                        <i class="fas fa-hashtag absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <p class="text-sm text-gray-500 mt-1" id="preview-text">
                        <i class="fas fa-info-circle mr-1"></i>
                        Kode barang akan diperbarui otomatis berdasarkan nama dan nomor urut
                    </p>
                </div>
            </div>

            <!-- Lokasi Ruang Field -->
            <div class="space-y-3">
                <label class="block text-lg font-semibold text-gray-700">
                    <i class="fas fa-map-marker-alt mr-2 text-green-600"></i>Lokasi Ruang
                </label>
                <select name="ruang_id" id="ruang_id" 
                        class="w-full border-2 border-gray-300 rounded-xl p-4 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" required>
                    <option value="">-- Pilih Ruang --</option>
                    @foreach($ruangs as $ruang)
                        <option value="{{ $ruang->id }}" {{ old('ruang_id', $barang->ruang_id) == $ruang->id ? 'selected' : '' }}>
                            {{ $ruang->name }} - {{ $ruang->description }}
                        </option>
                    @endforeach
                </select>
                @error('ruang_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                <div class="flex items-center mt-2">
                    <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                    <span class="text-sm text-blue-600">
                        Ruang saat ini: <strong>{{ $barang->ruang ? $barang->ruang->name . ' - ' . $barang->ruang->description : 'Belum diset' }}</strong>
                    </span>
                </div>
            </div>

            <!-- Kondisi Barang Field -->
            <div class="space-y-3">
                <label class="block text-lg font-semibold text-gray-700">
                    <i class="fas fa-clipboard-check mr-2 text-green-600"></i>Kondisi Barang
                </label>
                <div class="grid grid-cols-2 gap-4 mt-2">
                    <label class="relative flex items-center justify-center p-4 border-2 {{ old('kondisi_barang', $barang->kondisi_barang) == 'Baik' ? 'border-green-500' : 'border-gray-300' }} rounded-xl cursor-pointer hover:border-green-500 transition-all duration-300">
                        <input type="radio" 
                               name="kondisi_barang" 
                               value="Baik" 
                               class="absolute opacity-0"
                               {{ old('kondisi_barang', $barang->kondisi_barang) == 'Baik' ? 'checked' : '' }}
                               required>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-2xl text-green-600"></i>
                            <span class="text-lg font-medium">Baik</span>
                        </div>
                    </label>
                    <label class="relative flex items-center justify-center p-4 border-2 {{ old('kondisi_barang', $barang->kondisi_barang) == 'Rusak' ? 'border-red-500' : 'border-gray-300' }} rounded-xl cursor-pointer hover:border-red-500 transition-all duration-300">
                        <input type="radio" 
                               name="kondisi_barang" 
                               value="Rusak" 
                               class="absolute opacity-0"
                               {{ old('kondisi_barang', $barang->kondisi_barang) == 'Rusak' ? 'checked' : '' }}
                               required>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-times-circle text-2xl text-red-600"></i>
                            <span class="text-lg font-medium">Rusak</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-center space-x-4 mt-12">
                <a href="{{ route('barangs.index') }}" 
                   class="px-8 py-4 text-lg text-green-600 bg-white border-2 border-green-600 rounded-xl hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <button type="submit" 
                        class="px-8 py-4 text-lg text-white bg-green-600 rounded-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300">
                    <i class="fas fa-save mr-2"></i>Update
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Add this script at the bottom of your form -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const namaBarangInput = document.getElementById('nama_barang');
    const nomorUrutInput = document.getElementById('nomor_urut');
    const ruangSelect = document.getElementById('ruang_id');
    const previewText = document.getElementById('preview-text');

    // Add active states to radio buttons
    const radioButtons = document.querySelectorAll('input[type="radio"]');
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            // Remove active state from all labels
            document.querySelectorAll('input[type="radio"]').forEach(r => {
                r.parentElement.classList.remove('border-green-500', 'border-red-500');
                r.parentElement.classList.add('border-gray-300');
            });
            
            // Add active state to selected label
            if (this.checked) {
                this.parentElement.classList.remove('border-gray-300');
                this.parentElement.classList.add(
                    this.value === 'Baik' ? 'border-green-500' : 'border-red-500'
                );
            }
        });
    });

    // Preview kode barang
    function updatePreview() {
        const namaBarang = namaBarangInput.value;
        const nomorUrut = nomorUrutInput.value;
        
        if (namaBarang && nomorUrut) {
            // Ambil 3 huruf depan nama barang (huruf saja)
            const prefix = namaBarang.replace(/[^a-zA-Z]/g, '').toLowerCase().substring(0, 3);
            // Format nomor urut dengan leading zero
            const nomorFormatted = nomorUrut.toString().padStart(3, '0');
            const kodePreview = prefix + '-' + nomorFormatted;
            
            // Update info text
            if (prefix.length >= 3) {
                previewText.innerHTML = '<i class="fas fa-sync mr-1"></i>Kode barang baru: <strong>' + kodePreview + '</strong>';
                previewText.className = 'text-sm text-green-600 mt-1';
            } else {
                previewText.innerHTML = '<i class="fas fa-info-circle mr-1"></i>Kode barang akan diperbarui otomatis berdasarkan nama dan nomor urut';
                previewText.className = 'text-sm text-gray-500 mt-1';
            }
        }
    }

    // Function to validate inputs
    function validateInputs() {
        const namaBarang = namaBarangInput.value.trim();
        const nomorUrut = nomorUrutInput.value.trim();
        const ruangId = ruangSelect.value.trim();
        
        // Validate nama barang
        if (namaBarang) {
            const alphabeticChars = namaBarang.replace(/[^a-zA-Z]/g, '');
            if (alphabeticChars.length < 3) {
                namaBarangInput.classList.add('border-yellow-400');
                namaBarangInput.classList.remove('border-green-500');
            } else {
                namaBarangInput.classList.add('border-green-500');
                namaBarangInput.classList.remove('border-yellow-400');
            }
        } else {
            namaBarangInput.classList.remove('border-green-500', 'border-yellow-400');
        }
        
        // Validate nomor urut
        if (nomorUrut) {
            const num = parseInt(nomorUrut);
            if (num >= 0 && num <= 999) {
                nomorUrutInput.classList.add('border-green-500');
                nomorUrutInput.classList.remove('border-red-500');
            } else {
                nomorUrutInput.classList.add('border-red-500');
                nomorUrutInput.classList.remove('border-green-500');
            }
        } else {
            nomorUrutInput.classList.remove('border-green-500', 'border-red-500');
        }
        
        // Validate ruang selection
        if (ruangId) {
            ruangSelect.classList.add('border-green-500');
            ruangSelect.classList.remove('border-red-500');
        } else {
            ruangSelect.classList.remove('border-green-500', 'border-red-500');
        }
    }

    // Event listeners for real-time validation and preview
    namaBarangInput.addEventListener('input', function() {
        updatePreview();
        validateInputs();
    });

    nomorUrutInput.addEventListener('input', function() {
        updatePreview();
        validateInputs();
    });

    ruangSelect.addEventListener('change', function() {
        validateInputs();
    });

    // Form submission validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const namaBarang = namaBarangInput.value.trim();
        const nomorUrut = nomorUrutInput.value.trim();
        const ruangId = ruangSelect.value.trim();
        
        let hasError = false;
        let errorMessages = [];
        
        // Validate nama barang
        if (!namaBarang) {
            hasError = true;
            errorMessages.push('Nama barang harus diisi');
            namaBarangInput.classList.add('border-red-500');
        } else {
            const alphabeticChars = namaBarang.replace(/[^a-zA-Z]/g, '');
            if (alphabeticChars.length < 3) {
                hasError = true;
                errorMessages.push('Nama barang harus mengandung minimal 3 huruf');
                namaBarangInput.classList.add('border-red-500');
            }
        }
        
        // Validate nomor urut
        if (!nomorUrut) {
            hasError = true;
            errorMessages.push('Nomor urut harus diisi');
            nomorUrutInput.classList.add('border-red-500');
        } else {
            const num = parseInt(nomorUrut);
            if (isNaN(num) || num < 0 || num > 999) {
                hasError = true;
                errorMessages.push('Nomor urut harus berupa angka antara 0-999');
                nomorUrutInput.classList.add('border-red-500');
            }
        }
        
        // Validate ruang selection
        if (!ruangId) {
            hasError = true;
            errorMessages.push('Lokasi ruang harus dipilih');
            ruangSelect.classList.add('border-red-500');
        }
        
        // Validate kondisi barang
        const kondisiBarang = document.querySelector('input[name="kondisi_barang"]:checked');
        if (!kondisiBarang) {
            hasError = true;
            errorMessages.push('Kondisi barang harus dipilih');
        }
        
        if (hasError) {
            e.preventDefault();
            
            // Create or update error message display
            let errorDiv = document.querySelector('.client-side-errors');
            if (!errorDiv) {
                errorDiv = document.createElement('div');
                errorDiv.className = 'client-side-errors mb-8 p-4 bg-red-100 border-l-4 border-red-500 rounded-lg';
                form.insertBefore(errorDiv, form.firstChild);
            }
            
            errorDiv.innerHTML = `
                <ul class="list-disc list-inside text-red-600">
                    ${errorMessages.map(msg => `<li>${msg}</li>`).join('')}
                </ul>
            `;
            
            // Scroll to error
            errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
        } else {
            // Remove client-side error display if validation passes
            const errorDiv = document.querySelector('.client-side-errors');
            if (errorDiv) {
                errorDiv.remove();
            }
        }
    });

    // Initialize validation on page load
    validateInputs();
    updatePreview();
    
    // Add smooth focus transitions
    const inputs = [namaBarangInput, nomorUrutInput, ruangSelect];
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.classList.add('transform', 'scale-105');
        });
        
        input.addEventListener('blur', function() {
            this.classList.remove('transform', 'scale-105');
        });
    });
});
</script>

<style>
/* Custom border colors */
.border-yellow-400 {
    border-color: #fbbf24 !important;
}

.border-red-400 {
    border-color: #f87171 !important;
}

/* Input focus effects */
input:focus, select:focus {
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}
</style>

@endsection