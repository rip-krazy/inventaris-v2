<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1a5f7a 0%, #159957 100%);
        }
        .hover-scale {
            transition: transform 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Header -->
    <header class="gradient-bg shadow-lg p-4 flex justify-between items-center fixed w-full top-0 z-50">
        <div class="flex items-center">
            <img src="/assets/img/Logo_Inventaris-removebg-preview.png" alt="Logo" class="h-14 mr-4 w-14 hover-scale">
            <span class="text-white font-bold text-xl">Inventaris Barang</span>
        </div>
        <div class="space-x-4">
            <a href="{{url('/')}}" class="text-white hover:text-gray-200 font-bold">Home</a>
            <a href="{{url('login')}}" class="bg-white hover:bg-gray-100 text-green-600 font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                Login
            </a>
            <a href="{{url('register')}}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                Register
            </a>
        </div>
    </header>

    <main class="flex-grow pt-24 px-4">
        <div class="container mx-auto py-12">
            <!-- Hero Section -->
            <div class="text-center mb-16 animate__animated animate__fadeIn">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Tentang Kami</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Solusi Modern untuk Manajemen Inventaris Sekolah yang Efisien
                </p>
            </div>

            <!-- Main Content -->
            <div class="grid md:grid-cols-2 gap-12 mb-16">
                <!-- Left Section: About -->
                <div class="bg-white rounded-2xl shadow-xl p-8 card-hover animate__animated animate__fadeInLeft">
                    <h2 class="text-2xl font-bold text-green-600 mb-6">Apa itu Aplikasi Inventaris Barang?</h2>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        Aplikasi Inventaris Barang adalah sistem manajemen berbasis web yang dirancang khusus untuk memudahkan pengelolaan dan pemantauan aset sekolah. Aplikasi ini mengintegrasikan teknologi modern untuk menciptakan sistem pencatatan yang efisien, akurat, dan mudah diakses.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Dengan antarmuka yang intuitif dan fitur-fitur komprehensif, aplikasi ini memungkinkan staff sekolah untuk melacak, mengelola, dan memantau inventaris sekolah secara real-time, memastikan pengelolaan aset yang optimal dan transparan.
                    </p>
                </div>

                <!-- Right Section: Benefits -->
                <div class="bg-white rounded-2xl shadow-xl p-8 card-hover animate__animated animate__fadeInRight">
                    <h2 class="text-2xl font-bold text-green-600 mb-6">Manfaat Inventaris Barang</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Pengawasan aset sekolah yang lebih efektif dan terstruktur</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Perencanaan anggaran yang lebih akurat dan efisien</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Minimalisasi kehilangan dan kerusakan barang</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Pemantauan kondisi dan masa pakai barang secara real-time</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Purpose Section -->
            <div class="bg-white rounded-2xl shadow-xl p-8 mb-16 animate__animated animate__fadeInUp">
                <h2 class="text-2xl font-bold text-green-600 mb-6 text-center">Tujuan Pembuatan</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="p-6 bg-gray-50 rounded-xl card-hover">
                        <div class="text-green-500 mb-4">
                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">Efisiensi Pengelolaan</h3>
                        <p class="text-gray-600 text-center">
                            Mengoptimalkan proses manajemen inventaris untuk meningkatkan efisiensi operasional sekolah
                        </p>
                    </div>

                    <div class="p-6 bg-gray-50 rounded-xl card-hover">
                        <div class="text-green-500 mb-4">
                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">Transparansi</h3>
                        <p class="text-gray-600 text-center">
                            Menciptakan sistem pencatatan yang transparan dan dapat dipertanggungjawabkan
                        </p>
                    </div>

                    <div class="p-6 bg-gray-50 rounded-xl card-hover">
                        <div class="text-green-500 mb-4">
                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">Modernisasi Sistem</h3>
                        <p class="text-gray-600 text-center">
                            Menghadirkan solusi digital untuk menggantikan sistem pencatatan manual yang konvensional
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-center py-6">
        <div class="container mx-auto px-4">
            <p class="text-gray-300 mb-2">© 2024 Inventaris Barang. All rights reserved.</p>
            <div class="flex justify-center space-x-4">
                <a href="{{url('contact')}}" class="text-gray-400 hover:text-white transition duration-300">Contact</a>
                <a href="{{url('privacy')}}" class="text-gray-400 hover:text-white transition duration-300">Privacy Policy</a>
            </div>
        </div>
    </footer>
</body>
</html>