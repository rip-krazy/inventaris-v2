<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <title>Detail Barang</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-3xl w-full bg-white rounded-lg shadow-lg p-8 animate__animated animate__fadeIn">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Detail Barang: {{ $detailruang->nama_barang }}</h1>
    
        <div class="space-y-4">
    
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
    
            <!-- Tanggal Pembelian -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                <p class="text-lg font-semibold text-gray-700"><strong>Tanggal Pembelian:</strong> {{ \Carbon\Carbon::parse($detailruang->tanggal_pembelian)->format('d M Y') }}</p>
            </div>
    
            <!-- Lokasi Barang -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                <p class="text-lg font-semibold text-gray-700"><strong>Lokasi Barang:</strong> {{ $detailruang->lokasi_barang ?? 'Lokasi belum tersedia.' }}</p>
            </div>
    
            <!-- Status Barang -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
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
            <div class="bg-gray-50 p-4 rounded-lg shadow-sm text-center">
                <p class="text-lg font-semibold text-gray-700 mb-4"><strong>QR Code:</strong></p>
                <img src="{{ asset('assets/img/qr-code.svg') }}" alt="QR Code" class="mx-auto" width="120" height="120">
            </div>
            
        </div>
    
        <div class="mt-6 flex justify-center">
            <a href="{{ route('detailruang.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 transition duration-200">
                Kembali ke Daftar
            </a>
        </div>
    </div>
</body>
</html>
