@extends('main')

@section('content')
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
@endsection
