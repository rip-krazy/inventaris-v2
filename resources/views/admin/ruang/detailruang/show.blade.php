<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Detail Barang</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .card-gradient {
            background: linear-gradient(135deg, #f6f8fa 0%, #e9f1f7 100%);
            transition: all 0.3s ease;
        }
        
        .card-gradient:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }
        
        .badge {
            transition: all 0.3s ease;
        }
        
        .badge:hover {
            transform: translateY(-2px);
        }
        
        .info-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(226, 232, 240, 0.5);
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-color: rgba(226, 232, 240, 1);
        }
        
        .animated-gradient {
            background: linear-gradient(-45deg, #3490dc, #38b2ac, #4c51bf, #667eea);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .qr-container {
            transition: all 0.5s ease;
        }
        
        .qr-container:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .icon-pulse {
            animation: iconPulse 2s infinite;
        }
        
        @keyframes iconPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-green-50 to-purple-50 min-h-screen flex items-center justify-center p-5">
    <div class="max-w-4xl w-full bg-white rounded-2xl shadow-xl overflow-hidden animate__animated animate__fadeIn">
        <!-- Header with decorative elements -->
        <div class="relative animated-gradient p-10 text-white">
            <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-yellow-300 rounded-full opacity-20"></div>
            <div class="absolute top-0 left-0 -mt-5 -ml-5 w-24 h-24 bg-pink-400 rounded-full opacity-10"></div>
            <div class="absolute bottom-0 right-0 -mb-5 -mr-5 w-20 h-20 bg-blue-400 rounded-full opacity-15"></div>
            <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-32 h-32 bg-green-400 rounded-full opacity-10"></div>
            
            <div class="relative z-10">
                <div class="flex items-center mb-4">
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
                        <i class="fas fa-box-open text-2xl text-yellow-300 icon-pulse"></i>
                    </div>
                    <h1 class="text-3xl font-bold">Detail Barang</h1>
                </div>
                <p class="text-xl opacity-90 font-light ml-1">{{ $item->nama_barang }}</p>
                
                <div class="flex space-x-3 mt-5">
                    <span class="glass-effect px-3 py-1 rounded-full text-sm flex items-center">
                        <i class="fas fa-clock mr-2"></i> Diupdate: {{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}
                    </span>
                    <span class="glass-effect px-3 py-1 rounded-full text-sm flex items-center">
                        <i class="fas fa-tag mr-2"></i> Inventaris
                    </span>
                </div>
            </div>
        </div>
        
        <!-- Main content -->
        <div class="p-8 bg-gray-50">
            <!-- Top info section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="info-card bg-white p-6 rounded-xl shadow-sm flex flex-col items-center">
                    <div class="bg-blue-100 p-4 rounded-full text-blue-600 mb-4">
                        <i class="fas fa-barcode text-2xl"></i>
                    </div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Kode Barang</h3>
                    <p class="text-lg font-bold text-gray-800 mt-2">{{ $item->kode_barang }}</p>
                </div>
                
                <div class="info-card bg-white p-6 rounded-xl shadow-sm flex flex-col items-center">
                    <div class="bg-purple-100 p-4 rounded-full text-purple-600 mb-4">
                        <i class="fas {{ $item->kondisi_barang === 'Baik' ? 'fa-check-circle' : 'fa-exclamation-triangle' }} text-2xl"></i>
                    </div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Kondisi</h3>
                    <p class="text-lg font-bold {{ $item->kondisi_barang === 'Baik' ? 'text-green-600' : 'text-red-600' }} mt-2">
                        {{ $item->kondisi_barang }}
                    </p>
                </div>
                
                <div class="info-card bg-white p-6 rounded-xl shadow-sm flex flex-col items-center">
                    <div class="bg-green-100 p-4 rounded-full text-green-600 mb-4">
                        <i class="fas fa-cubes text-2xl"></i>
                    </div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Status Barang</h3>
                    <p class="text-lg font-bold {{ $item->kondisi_barang === 'Baik' ? 'text-green-600' : 'text-red-600' }} mt-2">
                        {{ $item->kondisi_barang === 'Baik' ? 'Baik' : 'Perlu Diganti' }}
                    </p>
                </div>
            </div>
            
            <!-- Timeline section -->
            <div class="mb-10 bg-white p-6 rounded-xl shadow-sm">
                <div class="flex items-center mb-6">
                    <div class="bg-blue-100 p-2 rounded-lg mr-3">
                        <i class="fas fa-history text-blue-600"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Informasi Barang</h2>
                </div>
                
                <div class="border-l-2 border-blue-500 pl-6 ml-3 space-y-6">
                    <div class="relative">
                        <div class="absolute -left-9 top-0 bg-blue-500 rounded-full w-4 h-4 border-4 border-white"></div>
                        <h3 class="text-md font-medium text-gray-800">Pembelian</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ \Carbon\Carbon::parse($item->tanggal_pembelian)->format('d M Y') }}</p>
                    </div>
                
                    <div class="relative">
                        <div class="absolute -left-9 top-0 bg-blue-500 rounded-full w-4 h-4 border-4 border-white"></div>
                        <h3 class="text-md font-medium text-gray-800">Lokasi</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ $item->lokasi_barang ?? 'Lokasi belum tersedia.' }}</p>
                        <div class="mt-2 text-sm text-blue-600 flex items-center">
                            <i class="fas fa-building mr-2"></i>
                            <span>Ruang: {{ $item->ruang->nama_ruang ?? 'Tidak tersedia' }}</span>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="absolute -left-9 top-0 bg-blue-500 rounded-full w-4 h-4 border-4 border-white"></div>
                        <h3 class="text-md font-medium text-gray-800">Deskripsi</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ $item->deskripsi_barang ?? 'Deskripsi belum tersedia.' }}</p>
                    </div>
                </div>
            </div>
            
            <!-- QR Code section -->
            <div class="flex flex-col md:flex-row items-center gap-6 mb-8 bg-white p-6 rounded-xl shadow-sm">
                <div class="qr-container bg-gradient-to-br from-blue-50 to-purple-50 p-6 rounded-xl shadow-md flex-1 text-center">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">QR Code</h3>
                    <img src="{{ asset('assets/img/qr-code.svg') }}" alt="QR Code" class="w-36 h-36 mx-auto object-contain">
                    <p class="mt-4 text-sm text-gray-500">Scan untuk informasi cepat</p>
                </div>
                
                <div class="flex-1 space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-sync-alt text-green-600"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-700">Pembaruan Terakhir</h4>
                            <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-user text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-700">Penanggung Jawab</h4>
                            <p class="text-xs text-gray-500">{{ $item->penanggung_jawab ?? 'Admin Inventaris' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <div class="bg-purple-100 p-3 rounded-full">
                            <i class="fas fa-clipboard-check text-purple-600"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-700">Status Validasi</h4>
                            <p class="text-xs text-green-600 font-medium">Tervalidasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer with action buttons -->
        <div class="bg-white border-t border-gray-100 p-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-sm text-gray-500">
                <p>Kode Inventaris: <span class="font-mono font-medium">{{ $item->kode_barang }}</span></p>
            </div>
            
            <div class="flex gap-4">
                <a href="{{ route('detailruang.show', $item->ruang_id) }}" class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-all duration-200 flex items-center shadow-md hover:shadow-lg">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Ruangan
                </a>
            </div>
        </div>
    </div>
    
    <script>
        // This would be where you'd add any JavaScript functionality
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Detail Barang page loaded');
            // You could add functionality for the print button here
        });
    </script>
</body>
</html>