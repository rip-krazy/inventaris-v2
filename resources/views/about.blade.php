<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        
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
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Background Shapes -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute w-72 h-72 bg-gray-800 rounded-full opacity-5 -top-36 -right-24"></div>
        <div class="absolute w-48 h-48 bg-gray-800 rounded-full opacity-5 -bottom-24 -left-12"></div>
        <div class="absolute w-36 h-36 bg-gray-800 rounded-full opacity-5 bottom-1/3 right-1/10"></div>
    </div>

    <!-- Header -->
    <header class="bg-gray-800 shadow-lg p-4 flex justify-between items-center fixed w-full top-0 z-50">
        <div class="flex items-center">
            <img src="/assets/img/Logo_Inventaris-removebg-preview.png" alt="Logo" class="h-14 mr-4 w-14 hover-scale">
            <div>
                <span class="text-white font-bold text-xl">Inventaris Barang</span>
                <span class="hidden md:block text-gray-300 text-xs">Sistem Management Aset Sekolah</span>
            </div>
        </div>
        <div class="space-x-4">
            <a href="{{url('/')}}" class="text-white hover:text-gray-200 font-bold">
                <i class="fas fa-home mr-1"></i> Home
            </a>
            <a href="{{url('login')}}" class="bg-white hover:bg-gray-100 text-gray-800 font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                <i class="fas fa-sign-in-alt mr-1"></i> Login
            </a>
            <a href="{{url('register')}}" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg btn-shine">
                <i class="fas fa-user-plus mr-1"></i> Register
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
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                        Apa itu Aplikasi Inventaris Barang?
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        Aplikasi Inventaris Barang adalah sistem manajemen berbasis web yang dirancang khusus untuk memudahkan pengelolaan dan pemantauan aset sekolah. Aplikasi ini mengintegrasikan teknologi modern untuk menciptakan sistem pencatatan yang efisien, akurat, dan mudah diakses.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Dengan antarmuka yang intuitif dan fitur-fitur komprehensif, aplikasi ini memungkinkan staff sekolah untuk melacak, mengelola, dan memantau inventaris sekolah secara real-time, memastikan pengelolaan aset yang optimal dan transparan.
                    </p>
                </div>

                <!-- Right Section: Benefits -->
                <div class="bg-white rounded-2xl shadow-xl p-8 card-hover animate__animated animate__fadeInRight">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-star text-yellow-500 mr-2"></i>
                        Manfaat Inventaris Barang
                    </h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mr-3">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            <span class="text-gray-700">Pengawasan aset sekolah yang lebih efektif dan terstruktur</span>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mr-3">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            <span class="text-gray-700">Perencanaan anggaran yang lebih akurat dan efisien</span>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mr-3">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            <span class="text-gray-700">Minimalisasi kehilangan dan kerusakan barang</span>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mr-3">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            <span class="text-gray-700">Pemantauan kondisi dan masa pakai barang secara real-time</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Purpose Section -->
            <div class="bg-white rounded-2xl shadow-xl p-8 mb-16 animate__animated animate__fadeInUp">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                    <i class="fas fa-bullseye text-red-500 mr-2"></i>
                    Tujuan Pembuatan
                </h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="p-6 bg-gray-50 rounded-xl card-hover">
                        <div class="text-blue-500 mb-4">
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
                        <div class="text-purple-500 mb-4">
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
            
            <!-- Features Section -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Keunggulan Sistem Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-white rounded-xl p-6 text-center transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl shadow-md">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-database text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Manajemen Data</h3>
                        <p class="text-gray-600">Kelola semua data inventaris dengan mudah dan terstruktur, dilengkapi fitur pelacakan dan pelaporan.</p>
                    </div>
                    <!-- Feature 2 -->
                    <div class="bg-white rounded-xl p-6 text-center transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl shadow-md">
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Laporan Real-time</h3>
                        <p class="text-gray-600">Dapatkan laporan dan statistik secara real-time untuk memantau keadaan inventaris sekolah.</p>
                    </div>
                    <!-- Feature 3 -->
                    <div class="bg-white rounded-xl p-6 text-center transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl shadow-md">
                        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-mobile-alt text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Responsive Design</h3>
                        <p class="text-gray-600">Dioptimalkan untuk akses dari berbagai perangkat mulai dari komputer hingga smartphone.</p>
                    </div>
                </div>
            </div>
            
            <!-- Call to Action -->
            <div class="bg-gray-800 rounded-2xl p-12 text-center text-white shadow-xl">
                <h2 class="text-3xl font-bold mb-6">Siap Untuk Memulai?</h2>
                <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Bergabunglah dengan ratusan sekolah yang telah menggunakan platform kami untuk mengelola inventaris mereka dengan efisien.</p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{url('register')}}" class="bg-white text-gray-800 py-3 px-8 rounded-full font-bold hover:bg-gray-100 transition duration-300 shadow-lg btn-shine">
                        <i class="fas fa-rocket mr-2"></i> Mulai Sekarang
                    </a>
                    <a href="{{url('contact')}}" class="bg-transparent border border-white text-white py-3 px-8 rounded-full font-bold hover:bg-white hover:text-gray-800 transition duration-300">
                        <i class="fas fa-envelope mr-2"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-center py-6 mt-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8 text-left">
                <div>
                    <h3 class="text-white font-bold text-lg mb-4">Tentang Kami</h3>
                    <p class="text-gray-400 mb-4">Platform manajemen inventaris barang modern untuk sekolah-sekolah di Indonesia.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-4">Link Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="{{url('about')}}" class="text-gray-400 hover:text-white transition duration-300">Tentang Kami</a></li>
                        <li><a href="{{url('contact')}}" class="text-gray-400 hover:text-white transition duration-300">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-4">Kontak</h3>
                    <p class="text-gray-400 mb-2"><i class="fas fa-map-marker-alt mr-2"></i> Jl. Pendidikan No. 123, Jakarta</p>
                    <p class="text-gray-400 mb-2"><i class="fas fa-phone mr-2"></i> (021) 1234-5678</p>
                    <p class="text-gray-400"><i class="fas fa-envelope mr-2"></i> info@inventarisbarang.id</p>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-6">
                <p class="text-gray-300 mb-2">© 2024 Inventaris Barang. All rights reserved.</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{url('privacy')}}" class="text-gray-400 hover:text-white transition duration-300">Privacy Policy</a>
                    <a href="{{url('Service')}}" class="text-gray-400 hover:text-white transition duration-300">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
    
    <script>
        // Animation for elements on scroll
        document.addEventListener('DOMContentLoaded', function() {
            // Function to check if element is in viewport
            function isInViewport(element) {
                const rect = element.getBoundingClientRect();
                return (
                    rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.bottom >= 0
                );
            }
            
            // Get all elements we want to animate
            const cards = document.querySelectorAll('.card-hover');
            
            // Set initial state
            cards.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                item.style.transitionDelay = `${index * 0.1}s`;
            });
            
            // Animation on scroll
            function animateOnScroll() {
                cards.forEach(item => {
                    if (isInViewport(item)) {
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }
                });
            }
            
            // Run once on load
            animateOnScroll();
            
            // Add scroll event listener
            window.addEventListener('scroll', animateOnScroll);
        });
    </script>
</body>
</html>