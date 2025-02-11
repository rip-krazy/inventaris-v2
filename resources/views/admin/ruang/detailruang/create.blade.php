@extends('main')

@section('content')
<div class="w-screen ml-72 mr-10 bg-white rounded-xl shadow-xl p-12 my-10">
    <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-8">
        Tambah Barang di Ruang: {{ $ruang->name }}
    </h1>

    <form action="{{ route('detailruang.store', $ruang->id) }}" method="POST" class="max-w-lg mx-auto">
    @csrf
    <div class="mb-4">
        <label class="block mb-2">Nama Barang</label>
        <input type="text" name="nama_barang" required class="w-full px-3 py-2 border rounded">
    </div>
    <div class="mb-4">
        <label class="block mb-2">Kode Barang</label>
        <input type="text" name="kode_barang" required class="w-full px-3 py-2 border rounded">
    </div>
    <div class="mb-4">
        <label class="block mb-2">Kondisi</label>
        <select name="kondisi_barang" required class="w-full px-3 py-2 border rounded">
            <option value="Baik">Baik</option>
            <option value="Rusak">Rusak</option>
        </select>
    </div>
    <div class="text-center">
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
            Simpan Barang
        </button>
    </div>
</form>


</div>
@endsection