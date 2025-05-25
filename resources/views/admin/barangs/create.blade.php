@extends('main')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<div class="max-w-2xl mt-10 mx-auto">
    <div class="bg-gradient-to-br from-white to-green-50 rounded-2xl shadow-2xl p-12 my-10 animate__animated animate__fadeIn">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <i class="fas fa-box-open text-5xl text-green-600 mb-4"></i>
            <h1 class="text-4xl font-extrabold text-gray-800">Tambah Data Barang</h1>
            <p class="text-gray-600 mt-2">Silakan isi form di bawah ini dengan lengkap</p>
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

        <form action="{{ route('barangs.store') }}" method="POST" class="space-y-8">
            @csrf
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
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400"
                               placeholder="Masukkan nama barang"
                               value="{{ old('nama_barang') }}"
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
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400"
                               placeholder="0-999"
                               value="{{ old('nomor_urut') }}"
                               min="0"
                               max="999"
                               required>
                        <i class="fas fa-hashtag absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Code Preview Section -->
            <div id="code-preview-section" class="hidden">
                <div class="bg-gradient-to-r from-green-50 to-blue-50 border-2 border-green-200 rounded-xl p-6">
                    <div class="flex items-center justify-center space-x-3">
                        <i class="fas fa-qrcode text-2xl text-green-600"></i>
                        <div class="text-center">
                            <p class="text-sm text-gray-600 mb-1">Preview Kode Barang:</p>
                            <p id="code-preview" class="text-2xl font-bold text-green-700 bg-white px-4 py-2 rounded-lg border border-green-300"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Text -->
            <div class="text-center">
                <p id="info-text" class="text-sm text-gray-500">
                    <i class="fas fa-info-circle mr-1"></i>
                    Kode barang akan dibuat otomatis: 3 huruf nama + nomor urut (contoh: lem-001)
                </p>
            </div>

            <!-- Kondisi Barang Field -->
            <div class="space-y-3">
                <label class="block text-lg font-semibold text-gray-700">
                    <i class="fas fa-clipboard-check mr-2 text-green-600"></i>Kondisi Barang
                </label>
                <div class="grid grid-cols-2 gap-4 mt-2">
                    <label class="relative flex items-center justify-center p-4 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-green-500 transition-all duration-300">
                        <input type="radio" 
                               name="kondisi_barang" 
                               value="Baik" 
                               class="absolute opacity-0"
                               {{ old('kondisi_barang') == 'Baik' ? 'checked' : '' }}
                               required>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-2xl text-green-600"></i>
                            <span class="text-lg font-medium">Baik</span>
                        </div>
                    </label>
                    <label class="relative flex items-center justify-center p-4 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-red-500 transition-all duration-300">
                        <input type="radio" 
                               name="kondisi_barang" 
                               value="Rusak" 
                               class="absolute opacity-0"
                               {{ old('kondisi_barang') == 'Rusak' ? 'checked' : '' }}
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
                    <i class="fas fa-save mr-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Enhanced JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const namaBarangInput = document.getElementById('nama_barang');
    const nomorUrutInput = document.getElementById('nomor_urut');
    const codePreviewSection = document.getElementById('code-preview-section');
    const codePreview = document.getElementById('code-preview');
    const infoText = document.getElementById('info-text');

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

    // Function to generate code preview
    function generateKodeBarang(namaBarang, nomorUrut) {
        // Remove non-alphabetic characters and take first 3 characters
        const prefix = namaBarang.replace(/[^a-zA-Z]/g, '').toLowerCase().substring(0, 3);
        
        // Format number with leading zeros (3 digits)
        const nomorFormatted = nomorUrut.toString().padStart(3, '0');
        
        return prefix + '-' + nomorFormatted;
    }

    // Function to update preview
    function updatePreview() {
        const namaBarang = namaBarangInput.value.trim();
        const nomorUrut = nomorUrutInput.value.trim();
        
        // Reset states
        codePreviewSection.classList.add('hidden');
        infoText.className = 'text-sm text-gray-500';
        infoText.innerHTML = '<i class="fas fa-info-circle mr-1"></i>Kode barang akan dibuat otomatis: 3 huruf nama + nomor urut (contoh: lem-001)';

        // Check if both fields have values
        if (namaBarang && nomorUrut) {
            const alphabeticChars = namaBarang.replace(/[^a-zA-Z]/g, '');
            
            // Check if name has at least 3 alphabetic characters
            if (alphabeticChars.length >= 3) {
                const kodePreview = generateKodeBarang(namaBarang, nomorUrut);
                
                // Show preview section with animation
                codePreviewSection.classList.remove('hidden');
                codePreview.textContent = kodePreview.toUpperCase();
                
                // Update info text
                infoText.className = 'text-sm text-green-600';
                infoText.innerHTML = '<i class="fas fa-check-circle mr-1"></i>Kode barang siap: <strong>' + kodePreview.toUpperCase() + '</strong>';
                
                // Add animation effect
                codePreview.style.transform = 'scale(0.9)';
                setTimeout(() => {
                    codePreview.style.transform = 'scale(1)';
                }, 100);
                
            } else if (alphabeticChars.length > 0) {
                infoText.className = 'text-sm text-yellow-600';
                infoText.innerHTML = '<i class="fas fa-exclamation-triangle mr-1"></i>Nama barang perlu minimal 3 huruf untuk membuat kode (saat ini: ' + alphabeticChars.length + ' huruf)';
            }
        }
    }

    // Function to validate inputs
    function validateInputs() {
        const namaBarang = namaBarangInput.value.trim();
        const nomorUrut = nomorUrutInput.value.trim();
        
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
        if (nomorUrut && nomorUrut >= 0 && nomorUrut <= 999) {
            nomorUrutInput.classList.add('border-green-500');
            nomorUrutInput.classList.remove('border-red-400');
        } else if (nomorUrut) {
            nomorUrutInput.classList.add('border-red-400');
            nomorUrutInput.classList.remove('border-green-500');
        } else {
            nomorUrutInput.classList.remove('border-green-500', 'border-red-400');
        }
    }

    // Event listeners with debouncing
    let timeout;
    function debounceUpdate() {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            updatePreview();
            validateInputs();
        }, 300);
    }

    namaBarangInput.addEventListener('input', debounceUpdate);
    nomorUrutInput.addEventListener('input', debounceUpdate);

    // Immediate update on focus
    namaBarangInput.addEventListener('focus', updatePreview);
    nomorUrutInput.addEventListener('focus', updatePreview);

    // Initialize if there are old values
    if (namaBarangInput.value || nomorUrutInput.value) {
        updatePreview();
        validateInputs();
    }

    // Form submission validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const namaBarang = namaBarangInput.value.trim();
        const alphabeticChars = namaBarang.replace(/[^a-zA-Z]/g, '');
        
        if (alphabeticChars.length < 3) {
            e.preventDefault();
            alert('Nama barang harus mengandung minimal 3 huruf untuk membuat kode barang!');
            namaBarangInput.focus();
            return false;
        }
    });
});
</script>

<style>
/* Custom animations */
#code-preview-section {
    transition: all 0.3s ease-in-out;
}

#code-preview {
    transition: all 0.2s ease-in-out;
}

/* Input focus effects */
input:focus {
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}

/* Custom border colors */
.border-yellow-400 {
    border-color: #fbbf24 !important;
}

.border-red-400 {
    border-color: #f87171 !important;
}
</style>
@endsection