@extends('main')

@section('content')
<div class="w-100 mx-24 bg-white rounded-xl shadow-xl p-12 my-10">
        <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-8">
            Tambah Barang di Ruang: {{ $ruang->name }}
        </h1>

        <form action="{{ route('detailruang.store') }}" method="POST">
    @csrf
    <input type="hidden" name="ruang_id" value="{{ $ruang->id }}">

    <label for="nama_barang">Nama Barang:</label>
    <input type="text" name="nama_barang" required>

    <label for="kode_barang">Kode Barang:</label>
    <input type="text" name="kode_barang" required>

    <label for="kondisi_barang">Kondisi Barang:</label>
    <input type="text" name="kondisi_barang" required>

    <button type="submit">Simpan</button>
</form>



</div>
@endsection