@extends('main')

@section('content')
<<<<<<< HEAD
<div class="max-w-7xl mt-10 mx-auto bg-white rounded-lg shadow-lg p-12 my-10">
    <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-10">Tambah Data Barang</h1>
=======



<!-- TailwindCSS + Animate.css CDN -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<div class="w-full max-w-3xl mx-auto mt-16 p-8 bg-white rounded-lg shadow-lg animate__animated animate__fadeIn">
    <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Tambah Data Barang</h1>

    <form action="{{ route('barangs.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Input Nama Barang -->
        <div class="mb-5">
            <label for="nama_barang" class="block text-gray-700 font-medium text-sm">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="border border-gray-300 rounded-md w-full p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition ease-in-out duration-200 shadow-sm" required>
        </div>
        
        <!-- Input Kode Barang -->
        <div class="mb-5">
            <label for="kode_barang" class="block text-gray-700 font-medium text-sm">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" class="border border-gray-300 rounded-md w-full p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition ease-in-out duration-200 shadow-sm" required>
        </div>

        <!-- Kondisi Barang -->
        <div class="mb-5">
            <label for="kondisi_barang" class="block text-gray-700 font-medium text-sm">Kondisi Barang</label>
            <div class="flex items-center space-x-4">
                <label>
                    <input type="radio" name="kondisi_barang" value="Baik" required>
                    <span class="ml-2">Baik</span>
                </label>
                <label>
                    <input type="radio" name="kondisi_barang" value="Rusak" required>
                    <span class="ml-2">Rusak</span>
                </label>
            </div>
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-between items-center mt-6">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-200 ease-in-out transform hover:scale-105">
                Simpan
            </button>
            <p class="text-gray-600 text-xs">Pastikan data sudah lengkap :></p>
        </div>
>>>>>>> 5132950b2e3ea0e7fcc4a75e3b0443fec3af6006


<<<<<<< HEAD
            <!-- Kode Barang Field -->
            <div>
                <label class="block text-lg font-semibold text-gray-700 mb-3">Kode Barang</label>
                <input type="text" name="kode_barang" class="w-full border border-gray-300 rounded-lg p-5 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" required>
            </div>
        </div>

        <!-- Kondisi Barang Field -->
        <div class="mb-2">
            <label class="block text-lg font-semibold text-gray-700 mt-3">Kondisi Barang</label>
            <div class="flex items-center space-x-4">
                <label>
                    <input type="radio" name="kondisi_barang" value="Baik" required>
                    <span class="ml-2">Baik</span>
                </label>
                <label>
                    <input type="radio" name="kondisi_barang" value="Rusak" required>
                    <span class="ml-2">Rusak</span>
                </label>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-8">
            <button type="submit" class="px-10 py-5 text-lg text-white bg-green-600 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300">Simpan</button>
        </div>
=======
>>>>>>> 5132950b2e3ea0e7fcc4a75e3b0443fec3af6006
    </form>
</div>
@endsection
