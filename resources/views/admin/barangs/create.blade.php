@extends('main')

@section('content')
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
</div>
@endsection
