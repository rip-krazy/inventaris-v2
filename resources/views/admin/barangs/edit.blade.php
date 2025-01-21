@extends('main')

@section('content')
<div class="max-w-7xl mt-10 mx-auto bg-white rounded-lg shadow-lg p-12 my-10">
    <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-10">Edit Data Barang</h1>

    <form action="{{ route('barangs.update', $barang) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Flex Container for Horizontal Layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            <!-- Nama Barang Field -->
            <div>
                <label class="block text-lg font-semibold text-gray-700 mb-3">Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" class="w-full border border-gray-300 rounded-lg p-5 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" required>
            </div>

            <!-- Kode Barang Field -->
            <div>
                <label class="block text-lg font-semibold text-gray-700 mb-3">Kode Barang</label>
                <input type="text" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}" class="w-full border border-gray-300 rounded-lg p-5 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" required>
            </div>
        </div>

        <!-- Kondisi Barang Field -->
        <div class="mb-6">
            <label class="block text-lg font-semibold text-gray-700 mt-3">Kondisi Barang</label>
            <div class="flex items-center space-x-4">
                <label>
                    <input type="radio" name="kondisi_barang" value="Baik" {{ old('kondisi_barang', $barang->kondisi_barang) == 'Baik' ? 'checked' : '' }} class="text-lg">
                    <span class="ml-2 text-lg">Baik</span>
                </label>
                <label>
                    <input type="radio" name="kondisi_barang" value="Rusak" {{ old('kondisi_barang', $barang->kondisi_barang) == 'Rusak' ? 'checked' : '' }} class="text-lg">
                    <span class="ml-2 text-lg">Rusak</span>
                </label>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-8">
            <button type="submit" class="px-10 py-5 text-lg text-white bg-blue-600 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300">Update</button>
        </div>
    </form>
</div>
@endsection
