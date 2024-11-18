@extends('main')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-10 my-10">
   <h1 class="text-4xl font-bold mb-6 text-center">Detail Barang: {{ $detailruang->nama_barang }}</h1>
   
   <div class="space-y-4">
       <p><strong>Kode Barang:</strong> {{ $detailruang->kode_barang }}</p>
       <p><strong>Kondisi Barang:</strong> {{ $detailruang->kondisi_barang }}</p>
       <p><strong>Jumlah Barang:</strong> {{ $detailruang->jumlah_barang }}</p>
       <p><strong>Deskripsi:</strong> {{ $detailruang->deskripsi_barang ?? 'Deskripsi belum tersedia.' }}</p>
   </div>
   
   <a href="{{ route('detailruang.index') }}" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Kembali ke Daftar</a>
</div>
@endsection
