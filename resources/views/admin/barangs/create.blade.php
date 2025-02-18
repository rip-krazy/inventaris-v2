@extends('main')

@section('content')
<<<<<<< HEAD
<!-- TailwindCSS + Animate.css CDN -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<div class="w-full max-w-3xl mx-auto mt-16 p-8 bg-white rounded-lg shadow-lg animate__animated animate__fadeIn ml-80">
    <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Tambah Data Barang</h1>

    <form action="{{ route('barangs.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Input Nama Barang -->
        <div class="mb-5">
            <label for="nama_barang" class="block text-gray-700 font-medium text-sm">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="border border-gray-300 rounded-md w-full p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition ease-in-out duration-200 shadow-sm" required>
        </div>
        
        <!-- Input Kode Barang -->
        <div class="mb-5">
            <label for="kode_barang" class="block text-gray-700 font-medium text-sm">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" class="border border-gray-300 rounded-md w-full p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition ease-in-out duration-200 shadow-sm" required>
        </div>

        <!-- Kondisi Barang Field -->
        <div class="mb-5">
            <label class="block text-gray-700 font-medium text-sm">Kondisi Barang</label>
            <div class="flex items-center space-x-4">
                <label>
                    <input type="radio" name="kondisi_barang" value="Baik" required>
                    <span class="ml-2">Baik</span>
                </label>
                <label>
                    <input type="radio" name="kondisi_barang" value="Rusak" required>
                    <span class="ml-2">Rusak</span>
=======
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
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400"
                               placeholder="Masukkan nama barang"
                               value="{{ old('nama_barang') }}"
                               required>
                        <i class="fas fa-box absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Kode Barang Field -->
                <div class="space-y-3">
                    <label class="block text-lg font-semibold text-gray-700">
                        <i class="fas fa-barcode mr-2 text-green-600"></i>Kode Barang
                    </label>
                    <div class="relative">
                        <input type="text" 
                               name="kode_barang" 
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400"
                               placeholder="Masukkan kode barang"
                               value="{{ old('kode_barang') }}"
                               required>
                        <i class="fas fa-qrcode absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Kondisi Barang Field -->
            <div class="space-y-3">
                <label class="block text-lg font-semibold text-gray-700">
                    <i class="fas fa-clipboard-check mr-2 text-green-600"></i>Kondisi Barang
>>>>>>> bdd74b0de50a3035f35ef556981ad800a85758df
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

<<<<<<< HEAD
        <!-- Tombol Simpan -->
        <div class="flex justify-between items-center mt-6">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-200 ease-in-out transform hover:scale-105">
                Simpan
            </button>
            <p class="text-gray-600 text-xs">Tambahkan Barang Yang Belum Lengkap :></p>
        </div>
    </form>
</div>

@endsection
=======
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

<!-- Add this script at the bottom of your form -->
<script>
document.addEventListener('DOMContentLoaded', function() {
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
});
</script>
@endsection
>>>>>>> bdd74b0de50a3035f35ef556981ad800a85758df
