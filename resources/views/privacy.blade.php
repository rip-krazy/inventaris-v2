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
        
        .policy-card {
            transition: all 0.3s ease;
        }
        
        .policy-card:hover {
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

    <!-- Header - Changed from gradient-bg to bg-gray-800 to match second document -->
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

    <main class="flex-grow pt-24 px-4 md:px-8 lg:px-16">
        <div class="max-w-4xl mx-auto py-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-8 text-center animate__animated animate__fadeIn">
                Kebijakan Privasi
            </h1>

            <div class="space-y-8 animate__animated animate__fadeInUp">
                <!-- Introduction -->
                <div class="bg-white rounded-xl shadow-lg p-8 policy-card">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                        Pendahuluan
                    </h2>
                    <p class="text-gray-700 leading-relaxed">
                        Kami menghargai privasi Anda dan berkomitmen untuk melindungi informasi pribadi yang Anda berikan kepada kami. Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi data Anda saat menggunakan aplikasi Inventaris Barang.
                    </p>
                </div>

                <!-- Data Collection -->
                <div class="bg-white rounded-xl shadow-lg p-8 policy-card">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-database text-green-600 mr-2"></i>
                        Informasi yang Kami Kumpulkan
                    </h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mr-3">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            <span class="text-gray-700">Informasi akun (nama, email, dan kata sandi)</span>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mr-3">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            <span class="text-gray-700">Data inventaris (nama barang, jumlah, lokasi, dan status)</span>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mr-3">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            <span class="text-gray-700">Log aktivitas sistem</span>
                        </li>
                    </ul>
                </div>

                <!-- Data Usage -->
                <div class="bg-white rounded-xl shadow-lg p-8 policy-card">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-chart-bar text-purple-600 mr-2"></i>
                        Penggunaan Data
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Kami menggunakan data yang dikumpulkan untuk:
                    </p>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex items-center mb-3">
                                <div class="bg-blue-100 p-3 rounded-full mr-3">
                                    <i class="fas fa-clipboard-list text-blue-600"></i>
                                </div>
                                <h3 class="font-semibold text-gray-800">Pengelolaan Inventaris</h3>
                            </div>
                            <p class="text-gray-600 ml-12">Memfasilitasi pencatatan dan pelacakan inventaris barang sekolah</p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex items-center mb-3">
                                <div class="bg-green-100 p-3 rounded-full mr-3">
                                    <i class="fas fa-arrow-up text-green-600"></i>
                                </div>
                                <h3 class="font-semibold text-gray-800">Peningkatan Layanan</h3>
                            </div>
                            <p class="text-gray-600 ml-12">Menganalisis penggunaan sistem untuk meningkatkan fitur dan performa</p>
                        </div>
                    </div>
                </div>

                <!-- Data Security -->
                <div class="bg-white rounded-xl shadow-lg p-8 policy-card">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-shield-alt text-blue-600 mr-2"></i>
                        Keamanan Data
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        Kami menerapkan langkah-langkah keamanan yang ketat untuk melindungi data Anda:
                    </p>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-gray-50 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="bg-green-100 p-4 rounded-full inline-block mb-4">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-800 mb-2">Enkripsi Data</h3>
                            <p class="text-gray-600">Melindungi informasi sensitif dengan enkripsi tingkat tinggi</p>
                        </div>
                        <div class="text-center p-6 bg-gray-50 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="bg-blue-100 p-4 rounded-full inline-block mb-4">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-800 mb-2">Akses Terbatas</h3>
                            <p class="text-gray-600">Kontrol akses ketat berdasarkan peran pengguna</p>
                        </div>
                        <div class="text-center p-6 bg-gray-50 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="bg-purple-100 p-4 rounded-full inline-block mb-4">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-800 mb-2">Backup Rutin</h3>
                            <p class="text-gray-600">Backup data otomatis untuk mencegah kehilangan data</p>
                        </div>
                    </div>
                </div>

                <!-- Data Rights -->
                <div class="bg-white rounded-xl shadow-lg p-8 policy-card">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-user-shield text-red-600 mr-2"></i>
                        Hak Pengguna
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Sebagai pengguna, Anda memiliki hak untuk:
                    </p>
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-blue-600 text-sm"></i>
                                </div>
                                <span class="text-gray-700">Mengakses data pribadi Anda yang kami simpan</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-blue-600 text-sm"></i>
                                </div>
                                <span class="text-gray-700">Meminta koreksi data yang tidak akurat</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-blue-600 text-sm"></i>
                                </div>
                                <span class="text-gray-700">Meminta penghapusan data Anda dalam keadaan tertentu</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Contact -->
                <div class="bg-white rounded-xl shadow-lg p-8 policy-card">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-envelope text-green-600 mr-2"></i>
                        Hubungi Kami
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Jika Anda memiliki pertanyaan tentang kebijakan privasi kami, silakan hubungi:
                    </p>
                    <div class="bg-gray-50 p-6 rounded-xl shadow-sm inline-block">
                        <p class="text-gray-700 mb-2"><i class="fas fa-envelope-open text-blue-600 mr-2"></i> Email: support@inventarisbarang.com</p>
                        <p class="text-gray-700 mb-2"><i class="fas fa-phone text-blue-600 mr-2"></i> Telepon: (021) 1234-5678</p>
                        <p class="text-gray-700"><i class="fas fa-map-marker-alt text-blue-600 mr-2"></i> Jl. Pendidikan No. 123, Jakarta</p>
                    </div>
                </div>
            </div>

            <!-- Changed from gradient-bg to bg-gray-800 to match second document -->
            <div class="mt-12 text-center bg-gray-800 text-white p-6 rounded-xl shadow-lg animate__animated animate__fadeIn">
                <h3 class="font-bold text-xl mb-4">Butuh Bantuan Lebih Lanjut?</h3>
                <p class="mb-4">Tim dukungan kami siap membantu Anda dengan pertanyaan terkait privasi dan keamanan data.</p>
                <a href="{{url('contact')}}" class="bg-white text-gray-800 py-2 px-6 rounded-full font-bold hover:bg-gray-100 inline-block transition duration-300 btn-shine">
                    <i class="fas fa-headset mr-2"></i> Hubungi Tim Support
                </a>
            </div>

            <div class="mt-8 text-center text-gray-500 text-sm animate__animated animate__fadeIn">
                Terakhir diperbarui: 12 Februari 2024
            </div>
        </div>
    </main>

    <!-- Footer - Changed from gradient-bg to bg-gray-800 to match second document -->
    <footer class="bg-gray-800 text-center py-6">
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
                        <li><a href="{{url('privacy')}}" class="text-gray-400 hover:text-white transition duration-300">Kebijakan Privasi</a></li>
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
            const cards = document.querySelectorAll('.policy-card');
            
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