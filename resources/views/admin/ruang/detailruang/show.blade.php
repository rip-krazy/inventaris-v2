@extends('main')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<div class="max-w-10xl mx-auto bg-white rounded-lg shadow-lg p-16 my-10 animate__animated animate__fadeIn">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Detail Barang: {{ $detailruang->nama_barang }}</h1>

    <div class="space-y-6">

        <!-- Kode Barang -->
        <div class="bg-gray-50  p-4 px-28 rounded-lg shadow-sm">
            <p class="text-lg font-semibold text-gray-700"><strong>Kode Barang:</strong> {{ $detailruang->kode_barang }}</p>
        </div>

        <!-- Kondisi Barang -->
        <div class="bg-gray-50  p-4 px-28 rounded-lg shadow-sm">
            <p class="text-lg font-semibold text-gray-700"><strong>Kondisi Barang:</strong> {{ $detailruang->kondisi_barang }}</p>
        </div>

        <!-- Jumlah Barang -->
        <div class="bg-gray-50  p-4 px-28 rounded-lg shadow-sm">
            <p class="text-lg font-semibold text-gray-700"><strong>Jumlah Barang:</strong> {{ $detailruang->jumlah_barang }}</p>
        </div>

        <!-- Deskripsi Barang -->
        <div class="bg-gray-50  p-4 px-28 rounded-lg shadow-sm">
            <p class="text-lg font-semibold text-gray-700"><strong>Deskripsi:</strong> {{ $detailruang->deskripsi_barang ?? 'Deskripsi belum tersedia.' }}</p>
        </div>

        <!-- Tanggal Pembelian -->
        <div class="bg-gray-50  p-4 px-28 rounded-lg shadow-sm">
            <p class="text-lg font-semibold text-gray-700"><strong>Tanggal Pembelian:</strong> {{ \Carbon\Carbon::parse($detailruang->tanggal_pembelian)->format('d M Y') }}</p>
        </div>

        <!-- Lokasi Barang -->
        <div class="bg-gray-50  p-4 px-28 rounded-lg shadow-sm">
            <p class="text-lg font-semibold text-gray-700"><strong>Lokasi Barang:</strong> {{ $detailruang->lokasi_barang ?? 'Lokasi belum tersedia.' }}</p>
        </div>

        <!-- Status Barang -->
        <div class="bg-gray-50  p-4 px-28 rounded-lg shadow-sm">
            <p class="text-lg font-semibold text-gray-700"><strong>Status Barang:</strong> 
                @if($detailruang->status_barang == 'baik')
                    <span class="text-green-600">Baik</span>
                @elseif($detailruang->status_barang == 'rusak')
                    <span class="text-red-600">Rusak</span>
                @else
                    <span class="text-yellow-600">Perlu Perawatan</span>
                @endif
            </p>
        </div>

        <!-- QR Code -->
        <div class="bg-gray-50  p-4 px-28 rounded-lg shadow-sm">
            <p class="text-lg font-semibold text-gray-700"><strong>QR Code:</strong></p>
            <div class="flex justify-center">
                <!-- Menampilkan QR Code -->
                <img src="{{ asset('assets/img/qr-code.svg') }}" alt="QR Code" class="mx-auto" width="150" height="150">
            </div>
        </div>
        
    </div>

    <div class="mt-8 flex justify-center">
        <a href="{{ route('detailruang.index') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 transition duration-200">
            Kembali ke Daftar
        </a>
    </div>
</div>
@endsection
