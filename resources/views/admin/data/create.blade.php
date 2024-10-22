@extends('main')
@section('content')
        <form action="{{ url('admin/data') }}" method="POST" class="bg-white p-4 rounded shadow-md">
         @csrf
            <div class="form-input">
                    <label for="">Nama Barang</label>
                    <input type="text"name="nama_barang">
                </div>
                <div class="form-input">
                    <label for="">kode_barang</label>
                    <input type="text"name="kode_barang">
                </div>
                <div class="form-input">
                    <label for="">Jumlah</label>
                    <input type="number"name="jumlah">
                </div>
                <div class="form-input">
                    <label for="">Lokasi</label>
                    <input type="text"name="lokasi">
                </div>
                    <div class="form-input">
                    <label for="">Kondisi</label>
                <input type="text"name="kondisi">
            </div>
    <button type="submit">Simpan</button>


@endsection