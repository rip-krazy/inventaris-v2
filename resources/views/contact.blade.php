<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
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
        
        .contact-card {
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(22, 163, 74, 0.2);
        }
        
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border-color: #16a34a;
        }
        
        .creator-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #16a34a;
            transition: all 0.3s ease;
            margin: 0 auto;
        }
        
        .contact-card:hover .creator-image {
            transform: scale(1.1);
            border-color: #15803d;
        }
        
        .map-container {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }
        
        .map-container:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: translateY(-5px);
        }
        
        .contact-info-item {
            transition: all 0.3s ease;
            padding: 1rem;
            border-radius: 0.5rem;
            background: white;
            margin-bottom: 1rem;
            border: 1px solid rgba(22, 163, 74, 0.1);
        }
        
        .contact-info-item:hover {
            background: #f0fdf4;
            border-color: #16a34a;
            transform: translateX(5px);
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
        <nav class="space-x-4">
            <a href="{{url('/')}}" class="text-white hover:text-gray-200 font-bold">
                <i class="fas fa-home mr-1"></i> Home
            </a>
            <a href="{{url('login')}}" class="bg-white hover:bg-gray-100 text-gray-800 font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                <i class="fas fa-sign-in-alt mr-1"></i> Login
            </a>
            <a href="{{url('register')}}" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg btn-shine">
                <i class="fas fa-user-plus mr-1"></i> Register
            </a>
        </nav>
    </header>

    <main class="flex-grow pt-24">
        <!-- Contact and Map Section -->
        <div class="container mx-auto px-4 py-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-12 text-center animate__animated animate__fadeIn">Hubungi Kami</h1>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Contact Information -->
                <div class="bg-white rounded-2xl shadow-xl p-8 animate__animated animate__fadeInLeft">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-school text-blue-600 mr-2"></i>
                        SMK Amaliah Ciawi
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="contact-info-item flex items-center space-x-4">
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-map-marker-alt text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Alamat</h3>
                                <p class="text-gray-600">Jl. Raya Ciawi No.1, Ciawi, Bogor</p>
                            </div>
                        </div>

                        <div class="contact-info-item flex items-center space-x-4">
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-envelope text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Email</h3>
                                <p class="text-gray-600">info@smkamaliah.sch.id</p>
                            </div>
                        </div>

                        <div class="contact-info-item flex items-center space-x-4">
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-phone text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Telepon</h3>
                                <p class="text-gray-600">(021) 12345678</p>
                            </div>
                        </div>

                        <div class="contact-info-item flex items-center space-x-4">
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-clock text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Jam Operasional</h3>
                                <p class="text-gray-600">Senin - Jumat: 07:00 - 16:00</p>
                                <p class="text-gray-600">Sabtu: 07:00 - 12:00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="map-container h-[500px] animate__animated animate__fadeInRight">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4570247534946!2d106.86693631477124!3d-6.657897395196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8f91b6a7c31%3A0x9b8d5cc6df7f46f4!2sSMK%20Amaliah%20Ciawi!5e0!3m2!1sen!2sid!4v1665842037412!5m2!1sen!2sid"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="rounded-xl shadow-lg">
                    </iframe>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-b from-white to-gray-50 py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Tim Pengembang</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                    <!-- Indra Card -->
                    <div class="bg-white rounded-2xl p-8 shadow-lg transform hover:-translate-y-2 transition-all duration-300 border border-gray-100 hover:border-gray-500">
                        <div class="relative mb-6">
                            <div class="absolute inset-0 bg-gray-500 rounded-xl opacity-10 animate-pulse"></div>
                            <img src="/assets/img/Indra.jpg" alt="Indra" 
                                class="w-32 h-32 mx-auto rounded-xl object-cover border-4 border-gray-500 transform hover:scale-105 transition-all duration-300 relative z-10">
                        </div>
                        
                        <div class="text-center">
                            <span class="bg-gradient-to-r from-gray-600 to-gray-500 text-white px-4 py-1 rounded-full text-sm font-semibold inline-block mb-3">
                                Lead Developer
                            </span>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Indra</h3>
                            <p class="text-gray-600 font-medium mb-3">Backend Developer & Database Administrator</p>
                            
                            <div class="flex flex-wrap justify-center gap-2 mb-4">
                                <span class="bg-gray-50 text-gray-600 px-3 py-1 rounded-full text-sm">PHP</span>
                                <span class="bg-gray-50 text-gray-600 px-3 py-1 rounded-full text-sm">MySQL</span>
                                <span class="bg-gray-50 text-gray-600 px-3 py-1 rounded-full text-sm">Laravel</span>
                            </div>
                            
                            <p class="text-gray-600 italic">"Creating robust and scalable solutions"</p>
                        </div>
                    </div>

                    <!-- Ilya Card -->
                    <div class="bg-white rounded-2xl p-8 shadow-lg transform hover:-translate-y-2 transition-all duration-300 border border-gray-100 hover:border-gray-500">
                        <div class="relative mb-6">
                            <div class="absolute inset-0 bg-gray-500 rounded-xl opacity-10 animate-pulse"></div>
                            <img src="/api/placeholder/128/128" alt="Ilya" 
                                class="w-32 h-32 mx-auto rounded-xl object-cover border-4 border-gray-500 transform hover:scale-105 transition-all duration-300 relative z-10">
                        </div>
                        
                        <div class="text-center">
                            <span class="bg-gradient-to-r from-gray-600 to-gray-500 text-white px-4 py-1 rounded-full text-sm font-semibold inline-block mb-3">
                                Frontend Developer
                            </span>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Ilya</h3>
                            <p class="text-gray-600 font-medium mb-3">UI/UX Designer & Frontend Developer</p>
                            
                            <div class="flex flex-wrap justify-center gap-2 mb-4">
                                <span class="bg-gray-50 text-gray-600 px-3 py-1 rounded-full text-sm">HTML/CSS</span>
                                <span class="bg-gray-50 text-gray-600 px-3 py-1 rounded-full text-sm">JavaScript</span>
                                <span class="bg-gray-50 text-gray-600 px-3 py-1 rounded-full text-sm">Tailwind</span>
                            </div>
                            
                            <p class="text-gray-600 italic">"Crafting beautiful user experiences"</p>
                        </div>
                    </div>

                    <!-- Anisa Card -->
                    <div class="bg-white rounded-2xl p-8 shadow-lg transform hover:-translate-y-2 transition-all duration-300 border border-gray-100 hover:border-gray-500">
                        <div class="relative mb-6">
                            <div class="absolute inset-0 bg-gray-500 rounded-xl opacity-10 animate-pulse"></div>
                            <img src="/api/placeholder/128/128" alt="Anisa" 
                                class="w-32 h-32 mx-auto rounded-xl object-cover border-4 border-gray-500 transform hover:scale-105 transition-all duration-300 relative z-10">
                        </div>
                        
                        <div class="text-center">
                            <span class="bg-gradient-to-r from-gray-600 to-gray-500 text-white px-4 py-1 rounded-full text-sm font-semibold inline-block mb-3">
                                Quality Assurance
                            </span>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Anisa</h3>
                            <p class="text-gray-600 font-medium mb-3">Testing & Documentation Specialist</p>
                            
                            <div class="flex flex-wrap justify-center gap-2 mb-4">
                                <span class="bg-gray-50 text-gray-600 px-3 py-1 rounded-full text-sm">Testing</span>
                                <span class="bg-gray-50 text-gray-600 px-3 py-1 rounded-full text-sm">Documentation</span>
                                <span class="bg-gray-50 text-gray-600 px-3 py-1 rounded-full text-sm">QA Tools</span>
                            </div>
                            
                            <p class="text-gray-600 italic">"Ensuring excellence in every detail"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
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
        // Animation with GSAP
        document.addEventListener('DOMContentLoaded', function() {
            // Register ScrollTrigger
            gsap.registerPlugin(ScrollTrigger);

            // Animate contact cards
            gsap.from(".contact-info-item", {
                duration: 0.8,
                opacity: 0,
                x: -50,
                stagger: 0.1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: ".contact-info-item",
                    start: "top center+=100",
                    toggleActions: "play none none reverse"
                }
            });

            // Animate map
            gsap.from(".map-container", {
                duration: 1,
                opacity: 0,
                x: 50,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: ".map-container",
                    start: "top center+=200",
                    toggleActions: "play none none reverse"
                }
            });
            
            // Function to check if element is in viewport
            function isInViewport(element) {
                const rect = element.getBoundingClientRect();
                return (
                    rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.bottom >= 0
                );
            }
            
            // Get all elements to animate
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