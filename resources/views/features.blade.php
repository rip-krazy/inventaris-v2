<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes shine {
            to {
                left: 200%;
            }
        }
        
        .btn-shine {
            position: relative;
            overflow: hidden;
        }
        
        .btn-shine::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -100%;
            width: 70%;
            height: 200%;
            opacity: 0.2;
            transform: rotate(30deg);
            background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0) 100%);
            animation: shine 3s infinite;
        }
        
        .feature-card {
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            border-bottom: 3px solid #1F2937;
        }
        
        .feature-icon {
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            transform: scale(1.1);
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-50">
    <!-- Background Shapes -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute w-72 h-72 bg-gray-800 rounded-full opacity-5 -top-36 -right-24"></div>
        <div class="absolute w-48 h-48 bg-gray-800 rounded-full opacity-5 -bottom-24 -left-12"></div>
        <div class="absolute w-36 h-36 bg-gray-800 rounded-full opacity-5 bottom-1/3 right-1/10"></div>
    </div>

    <!-- Header -->
    <header class="bg-gray-800 p-3 md:p-4 flex justify-between items-center fixed w-full top-0 z-50 shadow-lg">
        <div class="flex items-center">
            <div class="relative">
                <img src="/assets/img/Logo_Inventaris-removebg-preview.png" alt="Logo" class="h-10 md:h-14 mr-2 md:mr-4 w-10 md:w-14 transition-transform duration-300 hover:scale-110">
            </div>
            <div>
                <span class="text-white font-bold text-lg md:text-xl">Inventaris Barang</span>
                <span class="hidden md:block text-gray-300 text-xs">Sistem Management Aset Sekolah</span>
            </div>
        </div>
        <div class="space-x-2 md:space-x-4">
            <a href="{{url('login')}}" class="bg-white hover:bg-gray-100 text-gray-800 font-bold py-1 md:py-2 px-3 md:px-6 rounded-full text-sm md:text-base transition duration-300 shadow-md">
                <i class="fas fa-sign-in-alt mr-1"></i> Login
            </a>
            <a href="{{url('register')}}" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-1 md:py-2 px-3 md:px-6 rounded-full text-sm md:text-base transition duration-300 shadow-md btn-shine">
                <i class="fas fa-user-plus mr-1"></i> Register
            </a>
        </div>
    </header>

    <main class="flex-grow pt-20 md:pt-24">
        <!-- Hero Section -->
        <section class="py-12 md:py-20  bg-gradient-to-br from-gray-800 to-gray-900 text-white">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-3xl md:text-5xl font-bold mb-4">Fitur Unggulan Kami</h1>
                <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto">Solusi inventaris terbaik untuk institusi pendidikan dengan berbagai fitur canggih untuk memudahkan pengelolaan aset</p>
            </div>
        </section>

        <!-- Feature Categories -->
        <section class="py-10 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex overflow-x-auto py-4 md:justify-center md:flex-wrap space-x-4 md:space-x-6 md:space-y-0">
                    <a href="#data-management" class="whitespace-nowrap px-6 py-3 bg-gray-800 text-white rounded-full text-sm md:text-base font-medium hover:bg-gray-700 transition duration-300 shadow-md">
                        <i class="fas fa-database mr-2"></i> Manajemen Data
                    </a>
                    <a href="#reporting" class="whitespace-nowrap px-6 py-3 bg-white text-gray-800 border border-gray-300 rounded-full text-sm md:text-base font-medium hover:bg-gray-100 transition duration-300 shadow-md">
                        <i class="fas fa-chart-bar mr-2"></i> Pelaporan
                    </a>
                    <a href="#user-management" class="whitespace-nowrap px-6 py-3 bg-white text-gray-800 border border-gray-300 rounded-full text-sm md:text-base font-medium hover:bg-gray-100 transition duration-300 shadow-md">
                        <i class="fas fa-users mr-2"></i> Manajemen Pengguna
                    </a>
                    <a href="#security" class="whitespace-nowrap px-6 py-3 bg-white text-gray-800 border border-gray-300 rounded-full text-sm md:text-base font-medium hover:bg-gray-100 transition duration-300 shadow-md">
                        <i class="fas fa-shield-alt mr-2"></i> Keamanan
                    </a>
                    <a href="#integration" class="whitespace-nowrap px-6 py-3 bg-white text-gray-800 border border-gray-300 rounded-full text-sm md:text-base font-medium hover:bg-gray-100 transition duration-300 shadow-md">
                        <i class="fas fa-plug mr-2"></i> Integrasi
                    </a>
                </div>
            </div>
        </section>

        <!-- Data Management Features -->
        <section id="data-management" class="py-16">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center mb-16">
                    <div class="md:w-1/2 mb-8 md:mb-0">
                        <div class="bg-gray-800 p-1 md:p-2 rounded-xl inline-block mb-4">
                            <span class="text-white text-xs md:text-sm px-4 py-1 rounded-lg">Fitur Utama</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800">Manajemen Data Inventaris</h2>
                        <p class="text-gray-600 mb-8 text-lg">Kelola seluruh aset sekolah dari satu platform dengan sistem kategorisasi dan pelacakan yang komprehensif.</p>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-check text-green-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Kategorisasi Otomatis</h4>
                                    <p class="text-gray-600">Sistem mampu mengategorikan aset secara otomatis berdasarkan jenis, lokasi, dan fungsinya.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-check text-green-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Pencatatan Histori Aset</h4>
                                    <p class="text-gray-600">Rekam seluruh perubahan status, pemeliharaan, dan perpindahan aset secara detail.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-check text-green-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">QR Code & Barcode</h4>
                                    <p class="text-gray-600">Generate kode unik untuk setiap aset untuk memudahkan identifikasi dan scanning.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-1/4 block justify-center ml-32 mt-24">
                        <img src="\assets\img\data-collection.png" alt="Data Management" class="w-full max-w-md object-contain rounded-xl shadow-lg floating">
                    </div>
                </div>
            </div>
        </section>

        <!-- Reporting Features -->
        <section id="reporting" class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row-reverse items-center mb-16">
                    <div class="md:w-1/2 mb-8 md:mb-0 md:pl-12">
                        <div class="bg-gray-800 p-1 md:p-2 rounded-xl inline-block mb-4">
                            <span class="text-white text-xs md:text-sm px-4 py-1 rounded-lg">Analisis Data</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800">Laporan & Analitik Real-time</h2>
                        <p class="text-gray-600 mb-8 text-lg">Dapatkan insight tentang inventaris sekolah dengan laporan real-time dan dashboard yang informatif.</p>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-chart-pie text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Dashboard Interaktif</h4>
                                    <p class="text-gray-600">Visualisasi data dengan grafik dan chart interaktif untuk memudahkan pemantauan aset.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-file-export text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Ekspor Laporan</h4>
                                    <p class="text-gray-600">Ekspor laporan dalam berbagai format seperti PDF, Excel, dan CSV untuk kebutuhan dokumentasi.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-bell text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Notifikasi & Alert</h4>
                                    <p class="text-gray-600">Sistem peringatan otomatis untuk stok barang menipis, aset yang perlu pemeliharaan, dan lainnya.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="md:w-1/4 block justify-center mr-32 mt-24">
                        <img src="\assets\img\report.png" alt="Data Management" class="w-full max-w-md object-contain rounded-xl shadow-lg floating">
                    </div>
                </div>
            </div>
        </section>

        <!-- User Management -->
        <section id="user-management" class="py-16">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center mb-16">
                    <div class="md:w-1/2 mb-8 md:mb-0">
                        <div class="bg-gray-800 p-1 md:p-2 rounded-xl inline-block mb-4">
                            <span class="text-white text-xs md:text-sm px-4 py-1 rounded-lg">Pengelolaan Akses</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800">Manajemen Pengguna</h2>
                        <p class="text-gray-600 mb-8 text-lg">Kelola hak akses pengguna dengan sistem role-based access control yang fleksibel dan aman.</p>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-user-shield text-purple-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Role-based Access Control</h4>
                                    <p class="text-gray-600">Tentukan hak akses berdasarkan peran pengguna seperti admin, staff, guru, dan lainnya.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-history text-purple-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Log Aktivitas</h4>
                                    <p class="text-gray-600">Rekam semua aktivitas pengguna untuk audit dan pemantauan keamanan.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-user-cog text-purple-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Manajemen Profil</h4>
                                    <p class="text-gray-600">Setiap pengguna dapat mengelola profil dan preferensi mereka dengan mudah.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-1/4 block justify-center ml-32 mt-24">
                        <img src="\assets\img\user.png" alt="Data Management" class="w-full max-w-md object-contain rounded-xl shadow-lg floating">
                    </div>
                </div>
            </div>
        </section>

        <!-- Security -->
        <section id="security" class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row-reverse items-center mb-16">
                    <div class="md:w-1/2 mb-8 md:mb-0 md:pl-12">
                        <div class="bg-gray-800 p-1 md:p-2 rounded-xl inline-block mb-4">
                            <span class="text-white text-xs md:text-sm px-4 py-1 rounded-lg">Keamanan Data</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800">Fitur Keamanan</h2>
                        <p class="text-gray-600 mb-8 text-lg">Lindungi data inventaris sekolah dengan fitur keamanan canggih dan standar industri terkini.</p>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-lock text-red-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Enkripsi Data</h4>
                                    <p class="text-gray-600">Semua data sensitif terenkripsi dengan teknologi terkini untuk menjamin keamanan.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-key text-red-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Autentikasi 2 Faktor</h4>
                                    <p class="text-gray-600">Tambahan lapisan keamanan dengan verifikasi dua langkah untuk melindungi akun.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-cloud-upload-alt text-red-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Backup Otomatis</h4>
                                    <p class="text-gray-600">Sistem backup otomatis dan terencana untuk mencegah kehilangan data penting.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-1/4 block justify-center mr-32 mt-24">
                        <img src="\assets\img\secure-shield.png" alt="Data Management" class="w-full max-w-md object-contain rounded-xl shadow-lg floating">
                    </div>
                </div>
            </div>
        </section>

        <!-- Integration -->
        <section id="integration" class="py-16">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center mb-16">
                    <div class="md:w-1/2 mb-8 md:mb-0">
                        <div class="bg-gray-800 p-1 md:p-2 rounded-xl inline-block mb-4">
                            <span class="text-white text-xs md:text-sm px-4 py-1 rounded-lg">Konektivitas</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800">Integrasi Sistem</h2>
                        <p class="text-gray-600 mb-8 text-lg">Hubungkan sistem inventaris dengan aplikasi dan platform lain yang digunakan di sekolah Anda.</p>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-exchange-alt text-yellow-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">API Terbuka</h4>
                                    <p class="text-gray-600">Gunakan API kami untuk menghubungkan dengan sistem manajemen sekolah lainnya.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-file-import text-yellow-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Import/Export Data</h4>
                                    <p class="text-gray-600">Impor dan ekspor data dengan mudah dari dan ke sistem lain dalam berbagai format.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-gray-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-sync text-yellow-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Sinkronisasi Real-time</h4>
                                    <p class="text-gray-600">Data selalu tersinkronisasi secara real-time di seluruh platform yang terintegrasi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-1/4 block justify-center ml-32 mt-24">
                        <img src="\assets\img\collaborate.png" alt="Data Management" class="w-full max-w-md object-contain rounded-xl shadow-lg floating">
                    </div>
                </div>
            </div>
        </section>

        <!-- Additional Features Grid -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-4">Fitur Tambahan</h2>
                <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">Kami terus mengembangkan fitur baru untuk memenuhi kebutuhan pengelolaan inventaris sekolah Anda</p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="feature-card bg-white rounded-xl p-6 shadow-md">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-4 feature-icon">
                            <i class="fas fa-mobile-alt text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Aplikasi Mobile</h3>
                        <p class="text-gray-600">Akses sistem inventaris dari mana saja menggunakan aplikasi mobile yang responsif dan user-friendly.</p>
                    </div>
                    
                    <!-- Feature 2 -->
                    <div class="feature-card bg-white rounded-xl p-6 shadow-md">
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-4 feature-icon">
                            <i class="fas fa-tasks text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Manajemen Pemeliharaan</h3>
                        <p class="text-gray-600">Jadwalkan dan kelola pemeliharaan aset secara berkala untuk memaksimalkan umur pakai.</p>
                    </div>
                    
                    <!-- Feature 3 -->
                    <div class="feature-card bg-white rounded-xl p-6 shadow-md">
                        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mb-4 feature-icon">
                            <i class="fas fa-calendar-alt text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Sistem Peminjaman</h3>
                        <p class="text-gray-600">Kelola peminjaman dan pengembalian aset dengan mudah melalui sistem booking terintegrasi.</p>
                    </div>
                    
                    <!-- Feature 4 -->
                    <div class="feature-card bg-white rounded-xl p-6 shadow-md">
                        <div class="w-12 h-12 bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4 feature-icon">
                            <i class="fas fa-file-alt text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Template Dokumen</h3>
                        <p class="text-gray-600">Berbagai template dokumen siap pakai untuk kebutuhan administrasi inventaris sekolah.</p>
                    </div>
                    
                    <!-- Feature 5 -->
                    <div class="feature-card bg-white rounded-xl p-6 shadow-md">
                        <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mb-4 feature-icon">
                            <i class="fas fa-search text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Pencarian Lanjutan</h3>
                        <p class="text-gray-600">Sistem pencarian canggih dengan filter dan opsi pencarian detail untuk menemukan aset dengan cepat.</p>
                    </div>
                    
                    <!-- Feature 6 -->
                    <div class="feature-card bg-white rounded-xl p-6 shadow-md">
                        <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mb-4 feature-icon">
                            <i class="fas fa-language text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Multi Bahasa</h3>
                        <p class="text-gray-600">Dukungan multibahasa termasuk Bahasa Indonesia dan Bahasa Inggris untuk kenyamanan pengguna.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- FAQ Section -->
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12">Pertanyaan Umum</h2>
                
                <div class="max-w-3xl mx-auto space-y-6">
                    <!-- FAQ Item 1 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <button class="w-full px-6 py-4 text-left focus:outline-none flex justify-between items-center">
    <span class="font-semibold text-lg text-gray-800">Apakah aplikasi ini gratis untuk digunakan?</span>
    <i class="fas fa-chevron-down text-gray-500"></i>
</button>
<div class="px-6 pb-4">
    <p class="text-gray-600">Kami menyediakan versi dasar yang dapat digunakan secara gratis dengan fitur terbatas. Untuk fitur lengkap, tersedia paket berlangganan dengan harga yang terjangkau dan sesuai kebutuhan institusi pendidikan.</p>
</div>
                    </div>
                    
                    <!-- FAQ Item 2 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="w-full px-6 py-4 text-left focus:outline-none flex justify-between items-center">
                            <span class="font-semibold text-lg text-gray-800">Bagaimana keamanan data di sistem ini?</span>
                            <i class="fas fa-chevron-down text-gray-500"></i>
                        </button>
                        <div class="px-6 pb-4">
                            <p class="text-gray-600">Keamanan adalah prioritas utama kami. Semua data dienkripsi dengan standar industri terkini, tersimpan di server yang terlindungi, dan backup otomatis dilakukan secara berkala untuk menjaga integritas data.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 3 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="w-full px-6 py-4 text-left focus:outline-none flex justify-between items-center">
                            <span class="font-semibold text-lg text-gray-800">Berapa banyak pengguna yang bisa mengakses sistem?</span>
                            <i class="fas fa-chevron-down text-gray-500"></i>
                        </button>
                        <div class="px-6 pb-4">
                            <p class="text-gray-600">Tidak ada batasan jumlah pengguna dalam sistem. Anda dapat menambahkan pengguna sesuai kebutuhan dan mengatur hak akses yang berbeda untuk setiap peran.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 4 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="w-full px-6 py-4 text-left focus:outline-none flex justify-between items-center">
                            <span class="font-semibold text-lg text-gray-800">Apakah ada pelatihan untuk menggunakan sistem ini?</span>
                            <i class="fas fa-chevron-down text-gray-500"></i>
                        </button>
                        <div class="px-6 pb-4">
                            <p class="text-gray-600">Ya, kami menyediakan pelatihan online maupun langsung, dokumentasi lengkap, video tutorial, dan dukungan teknis 24/7 untuk membantu Anda menggunakan sistem dengan optimal.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 5 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="w-full px-6 py-4 text-left focus:outline-none flex justify-between items-center">
                            <span class="font-semibold text-lg text-gray-800">Bisakah sistem diakses dari perangkat mobile?</span>
                            <i class="fas fa-chevron-down text-gray-500"></i>
                        </button>
                        <div class="px-6 pb-4">
                            <p class="text-gray-600">Tentu saja! Sistem kami responsif dan dapat diakses dari berbagai perangkat termasuk smartphone dan tablet. Selain itu, kami juga menyediakan aplikasi mobile untuk pengalaman yang lebih baik.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
    <div class="container mx-auto px-4 text-center pb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Siap Untuk Mengoptimalkan Inventaris Sekolah Anda?</h2>
                <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Mulai gunakan sistem Inventaris Barang sekarang dan rasakan kemudahan mengelola aset sekolah Anda secara efisien.</p>
                <div class="flex flex-col sm:flex-row justify-center sm:space-x-4 space-y-4 sm:space-y-0">
                    <a href="{{url('register')}}" class="bg-white text-gray-800 py-3 px-8 rounded-full font-bold hover:bg-gray-100 transition duration-300 shadow-lg btn-shine">
                        <i class="fas fa-rocket mr-2"></i> Mulai Sekarang
                    </a>
                </div>
            </div>
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between">
                <!-- Company Info -->
                <div class="w-full md:w-1/4 mb-8 md:mb-0">
                    <div class="flex items-center mb-4">
                        <img src="/assets/img/Logo_Inventaris-removebg-preview.png" alt="Logo" class="h-12 w-12 mr-3">
                        <span class="text-xl font-bold">Inventaris Barang</span>
                    </div>
                    <p class="text-gray-400 mb-4">Solusi manajemen inventaris terbaik untuk institusi pendidikan di Indonesia.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="w-full md:w-1/4 mb-8 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">Link Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="{{url('home')}}" class="text-gray-400 hover:text-white transition-colors duration-300">Beranda</a></li>
                        <li><a href="{{url('about')}}" class="text-gray-400 hover:text-white transition-colors duration-300">Tentang Kami</a></li>
                        <li><a href="{{url('features')}}" class="text-gray-400 hover:text-white transition-colors duration-300">Fitur</a></li>
                        <li><a href="{{url('contact')}}" class="text-gray-400 hover:text-white transition-colors duration-300">Kontak</a></li>
                    </ul>
                </div>
                
               
                
                <!-- Contact -->
                <div class="w-full md:w-1/4">
                    <h3 class="text-lg font-semibold mb-4">Hubungi Kami</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-gray-400"></i>
                            <span class="text-gray-400">Jl. Pendidikan No. 123, Jakarta Selatan, Indonesia</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-3 text-gray-400"></i>
                            <span class="text-gray-400">+62 21 5678 9012</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-gray-400"></i>
                            <span class="text-gray-400">info@inventarisbarang.id</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <hr class="border-gray-800 my-8">
            
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm">© 2025 Inventaris Barang. Hak Cipta Dilindungi.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="{{url('privacy')}}" class="text-gray-500 hover:text-white text-sm transition-colors duration-300">Kebijakan Privasi</a>
                    <a href="{{url('terms')}}" class="text-gray-500 hover:text-white text-sm transition-colors duration-300">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Javascript -->
    <script>
        // Simple accordion functionality for FAQ
        document.addEventListener('DOMContentLoaded', function() {
            const faqButtons = document.querySelectorAll('.faq-item button');
            
            faqButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const content = button.nextElementSibling;
                    const icon = button.querySelector('i');
                    
                    // Toggle content
                    content.classList.toggle('hidden');
                    
                    // Toggle icon
                    if (content.classList.contains('hidden')) {
                        icon.classList.remove('fa-chevron-up');
                        icon.classList.add('fa-chevron-down');
                    } else {
                        icon.classList.remove('fa-chevron-down');
                        icon.classList.add('fa-chevron-up');
                    }
                });
            });
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>