@extends('main')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Card Header Design -->
        <div class="bg-white rounded-t-2xl shadow-lg p-8 border-b-4 border-green-500">
            <div class="animate-fadeIn text-center">
                <div class="inline-block p-3 bg-green-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h1 class="text-4xl font-extrabold text-gray-800 mb-2">
                    Tambah Barang
                </h1>
                <p class="text-lg text-gray-600">
                    Ruang: <span class="font-semibold text-green-600">{{ $ruang->name }}</span>
                </p>
            </div>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-b-2xl shadow-lg p-8">
            <form action="{{ route('detailruang.store') }}" method="POST" class="space-y-6" id="barangForm">
                @csrf
                <input type="hidden" name="ruang_id" value="{{ $ruang->id }}">

                <!-- Nama Barang Field -->
                <div class="animate-slideUp" style="animation-delay: 0.1s">
                    <div class="relative group">
                        <label for="nama_barang" class="block text-sm font-medium text-gray-700 mb-2 group-hover:text-green-600 transition-colors duration-200">
                            Nama Barang
                        </label>
                        <input type="text" 
                               name="nama_barang" 
                               id="nama_barang"
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                               required
                               placeholder="Masukkan nama barang">
                    </div>
                </div>

                <!-- Kode Barang Field -->
                <div class="animate-slideUp" style="animation-delay: 0.2s">
                    <div class="relative group">
                        <label for="kode_barang" class="block text-sm font-medium text-gray-700 mb-2 group-hover:text-green-600 transition-colors duration-200">
                            Kode Barang
                        </label>
                        <input type="text" 
                               name="kode_barang" 
                               id="kode_barang"
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                               required
                               placeholder="Masukkan kode barang">
                    </div>
                </div>

                <!-- Kondisi Barang Field -->
                <div class="animate-slideUp" style="animation-delay: 0.3s">
                    <div class="relative group">
                        <label for="kondisi_barang" class="block text-sm font-medium text-gray-700 mb-2 group-hover:text-green-600 transition-colors duration-200">
                            Kondisi Barang
                        </label>
                        <select name="kondisi_barang" 
                                id="kondisi_barang"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                                required>
                            <option value="">Pilih kondisi barang</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="animate-slideUp pt-4" style="animation-delay: 0.4s">
                    <button type="submit"
                            class="w-full bg-green-600 text-white py-4 px-6 rounded-xl hover:bg-green-700 focus:ring-4 focus:ring-green-300 transition-all duration-200 flex items-center justify-center gap-3 group">
                        <span class="text-lg font-semibold">Simpan Data</span>
                        <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 12h14"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add these styles to your CSS -->
<style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from { 
            opacity: 0;
            transform: translateY(20px);
        }
        to { 
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.8s ease-out;
    }

    .animate-slideUp {
        animation: slideUp 0.6s ease-out forwards;
        opacity: 0;
    }
</style>

<!-- Add this JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('barangForm');
    const inputs = form.querySelectorAll('input, select');

    // Add highlight effect on focus
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });
    });

    // Form submission handling
    form.addEventListener('submit', function(e) {
        const button = form.querySelector('button[type="submit"]');
        button.innerHTML = `
            <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Menyimpan...
        `;
        button.disabled = true;
    });
});
</script>
@endsection