@extends('main')

@section('content')
<<<<<<< HEAD
<div class="max-w-4xl mt-32 mx-auto bg-white rounded-lg shadow-lg p-10 my-10">
        <h1 class="text-2xl font-bold mb-6 text-center">Tambah Data Barang</h1>

        <form action="{{ route('barangs.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Nama Barang</label>
                <input type="text" name="nama_barang" class="w-full border border-gray-300 rounded-lg p-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Kode Barang</label>
                <input type="text" name="kode_barang" class="w-full border border-gray-300 rounded-lg p-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Kondisi Barang</label>
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
            <div class="mb-4">
                <label class="block text-gray-700">Jumlah Barang</label>
                <input type="number" name="jumlah_barang" class="w-full border border-gray-300 rounded-lg p-2" required>
            </div>

            <button type="submit" class="w-full text-white bg-blue-600 rounded-lg py-2 hover:bg-blue-700">Simpan</button>
        </form>
    </div>
=======
<div class="max-w-7xl mt-20 mx-auto bg-white rounded-xl shadow-2xl p-12 my-10">
    <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-12">Tambah Data Barang</h1>

    <form action="{{ route('barangs.store') }}" method="POST">
        @csrf

        <!-- Flex Container for Horizontal Layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            
            <!-- Nama Barang -->
            <div class="mb-6">
                <label class="block text-lg font-semibold text-gray-700 mb-2">Nama Barang</label>
                <input type="text" name="nama_barang" class="w-full border border-gray-300 rounded-lg p-4 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>

            <!-- Kode Barang -->
            <div class="mb-6">
                <label class="block text-lg font-semibold text-gray-700 mb-2">Kode Barang</label>
                <input type="text" name="kode_barang" class="w-full border border-gray-300 rounded-lg p-4 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>

        </div>

        <!-- Kondisi Barang -->
        <div class="mb-6">
            <label class="block text-lg font-semibold text-gray-700 mb-2">Kondisi Barang</label>
            <div class="flex items-center space-x-6">
                <label class="flex items-center space-x-2">
                    <input type="radio" name="kondisi_barang" value="Baik" class="focus:ring-blue-500" required>
                    <span class="text-lg">Baik</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="kondisi_barang" value="Rusak" class="focus:ring-blue-500" required>
                    <span class="text-lg">Rusak</span>
                </label>
            </div>
        </div>

        <!-- Submit Button aligned to the left and smaller -->
        <div class="mt-8 flex justify-start">
            <button type="submit" class="text-lg text-white bg-blue-600 rounded-lg py-2 px-6 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-300">Simpan</button>
        </div>
    </form>
>>>>>>> ef2c56b9a8688d5dce8d3382a87582642fe2034c
</div>
@endsection
