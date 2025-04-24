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
        
        /* Program card hover effect */
        .program-logo {
            filter: grayscale(100%);
            transition: all 0.3s ease;
        }
        
        .program-card:hover .program-logo {
            filter: grayscale(0%);
        }
        
        .program-card:hover {
            background-color: #f9fafb;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
                <!-- Removed the problematic white dot that was overflowing -->
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
        <section class="relative py-12 md:py-32 bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="md:w-1/2 mb-10 md:mb-0 text-center md:text-left">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 mb-4 md:mb-6">
                            <span class="block">Kelola Inventaris</span>
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-gray-700 to-gray-900">Dengan Mudah</span>
                        </h1>
                        <p class="text-gray-600 text-base md:text-lg mb-8">
                            Platform manajemen aset sekolah yang modern, efisien, dan mudah digunakan untuk memantau semua inventaris Anda dalam satu tempat.
                        </p>
                        <div class="flex flex-col sm:flex-row justify-center md:justify-start space-y-3 sm:space-y-0 sm:space-x-4">
                            <a href="{{url('about')}}" class="bg-gray-800 text-white py-3 px-8 rounded-full font-bold hover:bg-gray-700 transition duration-300 shadow-lg btn-shine">
                                <i class="fas fa-info-circle mr-2"></i> Tentang Kami
                            </a>
                            <a href="{{url('features')}}" class="bg-white text-gray-800 py-3 px-8 rounded-full font-bold hover:bg-gray-100 transition duration-300 shadow-lg border border-gray-200">
                                <i class="fas fa-list-alt mr-2"></i> Fitur Kami
                            </a>
                        </div>
                    </div>
                    <div class="md:w-1/2 relative">
                        <div class="flex flex-row md:flex-row justify-center items-center space-y-6 md:space-y-0 md:space-x-4">
                            <!-- Heroine Image (Left) -->
                            <div class="relative z-10 flex justify-center">
                                <img src="/assets/img/heroine[1].png" alt="Heroine Image" class="w-3/4 md:w-full max-h-56 md:max-h-60 object-contain floating">
                            </div>
                            <!-- Hero Image (Right) -->
                            <div class="relative z-10 flex justify-center">
                                <img src="/assets/img/hero[1].png" alt="Hero Image" class="w-3/4 md:w-full max-h-56 md:max-h-60 object-contain floating">
                            </div>
                        </div>
                        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-gray-800 rounded-full opacity-5"></div>
                        <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-24 h-24 bg-gray-800 rounded-full opacity-5"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12">Keunggulan Sistem Kami</h2>
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
        </section>

        <!-- Program Keahlian Section -->
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-4">Program Keahlian</h2>
                <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">Sistem kami mendukung berbagai program keahlian di sekolah Anda</p>
                
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6 max-w-6xl mx-auto">
                    <!-- Program 1 - PPLG -->
                    <div class="program-card bg-white rounded-xl p-4 flex flex-col items-center shadow-md transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-16 h-16 md:w-20 md:h-20 mb-3 bg-white rounded-lg shadow-sm p-2 flex items-center justify-center overflow-hidden">
                            <img src="/assets/img/pplg.png" alt="PPLG" class="w-full h-full object-contain program-logo transition-all duration-300">
                        </div>
                        <p class="font-medium text-gray-800">PPLG</p>
                        <p class="text-xs text-gray-500 text-center">Pengembangan Perangkat Lunak dan Gim</p>
                    </div>
                    <!-- Program 2 - TJKT -->
                    <div class="program-card bg-white rounded-xl p-4 flex flex-col items-center shadow-md transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-16 h-16 md:w-20 md:h-20 mb-3 bg-white rounded-lg shadow-sm p-2 flex items-center justify-center overflow-hidden">
                            <img src="/assets/img/tjkt.png" alt="TJKT" class="w-full h-full object-contain program-logo transition-all duration-300">
                        </div>
                        <p class="font-medium text-gray-800">TJKT</p>
                        <p class="text-xs text-gray-500 text-center">Teknik Jaringan Komputer dan Telekomunikasi</p>
                    </div>
                    <!-- Program 3 - AN -->
                    <div class="program-card bg-white rounded-xl p-4 flex flex-col items-center shadow-md transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-16 h-16 md:w-20 md:h-20 mb-3 bg-white rounded-lg shadow-sm p-2 flex items-center justify-center overflow-hidden">
                            <img src="/assets/img/an.png" alt="AN" class="w-full h-full object-contain program-logo transition-all duration-300">
                        </div>
                        <p class="font-medium text-gray-800">AN</p>
                        <p class="text-xs text-gray-500 text-center">Animasi</p>
                    </div>
                    <!-- Program 4 - MPLB -->
                    <div class="program-card bg-white rounded-xl p-4 flex flex-col items-center shadow-md transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-16 h-16 md:w-20 md:h-20 mb-3 bg-white rounded-lg shadow-sm p-2 flex items-center justify-center overflow-hidden">
                            <img src="/assets/img/perkantoran.png" alt="Perkantoran" class="w-full h-full object-contain program-logo transition-all duration-300">
                        </div>
                        <p class="font-medium text-gray-800">MPLB</p>
                        <p class="text-xs text-gray-500 text-center">Manajemen Perkantoran</p>
                    </div>
                    <!-- Program 5 - AKL -->
                    <div class="program-card bg-white rounded-xl p-4 flex flex-col items-center shadow-md transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-16 h-16 md:w-20 md:h-20 mb-3 bg-white rounded-lg shadow-sm p-2 flex items-center justify-center overflow-hidden">
                            <img src="/assets/img/akl.jpg" alt="AKL" class="w-full h-full object-contain program-logo transition-all duration-300">
                        </div>
                        <p class="font-medium text-gray-800">AKL</p>
                        <p class="text-xs text-gray-500 text-center">Akuntansi dan Keuangan Lembaga</p>
                    </div>
                    <!-- Program 6 - BR -->
                    <div class="program-card bg-white rounded-xl p-4 flex flex-col items-center shadow-md transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-16 h-16 md:w-20 md:h-20 mb-3 bg-white rounded-lg shadow-sm p-2 flex items-center justify-center overflow-hidden">
                            <img src="/assets/img/br.png" alt="BR" class="w-full h-full object-contain program-logo transition-all duration-300">
                        </div>
                        <p class="font-medium text-gray-800">BR</p>
                        <p class="text-xs text-gray-500 text-center">Bisnis Ritel</p>
                    </div>
                    <!-- Program 7 - LPS -->
                    <div class="program-card bg-white rounded-xl p-4 flex flex-col items-center shadow-md transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-16 h-16 md:w-20 md:h-20 mb-3 bg-white rounded-lg shadow-sm p-2 flex items-center justify-center overflow-hidden">
                            <img src="/assets/img/lps.png" alt="LPS" class="w-full h-full object-contain program-logo transition-all duration-300">
                        </div>
                        <p class="font-medium text-gray-800">LPS</p>
                        <p class="text-xs text-gray-500 text-center">Layanan Perbankan</p>
                    </div>
                    <!-- Program 8 - DPB -->
                    <div class="program-card bg-white rounded-xl p-4 flex flex-col items-center shadow-md transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-16 h-16 md:w-20 md:h-20 mb-3 bg-white rounded-lg shadow-sm p-2 flex items-center justify-center overflow-hidden">
                            <img src="/assets/img/dpb.png" alt="DPB" class="w-full h-full object-contain program-logo transition-all duration-300">
                        </div>
                        <p class="font-medium text-gray-800">DPB</p>
                        <p class="text-xs text-gray-500 text-center">Desain Produk Busana</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="py-16 bg-gray-800 text-white">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Siap Untuk Memulai?</h2>
                <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Bergabunglah dengan ratusan sekolah yang telah menggunakan platform kami untuk mengelola inventaris mereka dengan efisien.</p>
                <div class="flex flex-col sm:flex-row justify-center sm:space-x-4 space-y-4 sm:space-y-0">
                    <a href="{{url('register')}}" class="bg-white text-gray-800 py-3 px-8 rounded-full font-bold hover:bg-gray-100 transition duration-300 shadow-lg btn-shine">
                        <i class="fas fa-rocket mr-2"></i> Mulai Sekarang
                    </a>
                    <a href="{{url('contact')}}" class="bg-transparent border border-white text-white py-3 px-8 rounded-full font-bold hover:bg-white hover:text-gray-800 transition duration-300">
                        <i class="fas fa-envelope mr-2"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-center py-12">
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
                <p class="text-gray-400 text-sm md:text-base">© 2024 Inventaris Barang. All rights reserved.</p>
                <div class="flex justify-center space-x-3 md:space-x-4 text-sm md:text-base mt-4">
                    <a href="{{url('privacy')}}" class="text-gray-400 hover:text-white transition duration-300">Privacy Policy</a>
                    <a href="{{url('Service')}}" class="text-gray-400 hover:text-white transition duration-300">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Simple animation for program items on scroll
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
            const programItems = document.querySelectorAll('.program-card');
            const features = document.querySelectorAll('.features-section .bg-white.rounded-xl');
            
            // Set initial state
            programItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                item.style.transitionDelay = `${index * 0.1}s`;
            });
            
            // Animation on scroll
            function animateOnScroll() {
                programItems.forEach(item => {
                    if (isInViewport(item)) {
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }
                });
                
                features.forEach(item => {
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