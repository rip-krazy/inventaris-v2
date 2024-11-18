@extends('main')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8 my-10">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Detail Barang: {{ $detailruang->nama_barang }}</h1>

    <div class="space-y-6">
        <!-- Kode Barang -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
            <p class="text-lg font-semibold text-gray-700"><strong>Kode Barang:</strong> {{ $detailruang->kode_barang }}</p>
        </div>

        <!-- Kondisi Barang -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
            <p class="text-lg font-semibold text-gray-700"><strong>Kondisi Barang:</strong> {{ $detailruang->kondisi_barang }}</p>
        </div>

        <!-- Jumlah Barang -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
            <p class="text-lg font-semibold text-gray-700"><strong>Jumlah Barang:</strong> {{ $detailruang->jumlah_barang }}</p>
        </div>

        <!-- Deskripsi Barang -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
            <p class="text-lg font-semibold text-gray-700"><strong>Deskripsi:</strong> {{ $detailruang->deskripsi_barang ?? 'Deskripsi belum tersedia.' }}</p>
        </div>
    </div>

    <div class="mt-8 flex justify-center">
        <a href="{{ route('detailruang.index') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 transition duration-200">
            Kembali ke Daftar
        </a>
    </div>
</div>
@endsection
