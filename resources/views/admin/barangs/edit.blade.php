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
                               value="{{ old('nama_barang', $barang->nama_barang) }}"
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400"
                               placeholder="Masukkan nama barang"
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
                               value="{{ old('kode_barang', $barang->kode_barang) }}"
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400"
                               placeholder="Masukkan kode barang"
                               required>
                        <i class="fas fa-qrcode absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
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