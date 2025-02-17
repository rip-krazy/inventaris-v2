<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
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
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .partner-logo {
            filter: grayscale(100%);
            transition: all 0.3s ease;
            width: 80px;
            height: 80px;
            object-fit: contain;
            padding: 8px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        @media (min-width: 768px) {
            .partner-logo {
                width: 100px;
                height: 100px;
                padding: 10px;
            }
        }
        .partner-logo:hover {
            filter: grayscale(0%);
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .program-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.5rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        @media (min-width: 640px) {
            .program-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (min-width: 1024px) {
            .program-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        .hero-image {
            max-height: 200px;
            object-fit: contain;
        }
        @media (min-width: 768px) {
            .hero-image {
                max-height: 400px;
            }
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Header -->
    <header class="gradient-bg shadow-lg p-3 md:p-4 flex justify-between items-center fixed w-full top-0 z-50">
        <div class="flex items-center">
            <img src="/assets/img/Logo_Inventaris-removebg-preview.png" alt="Logo" class="h-10 md:h-14 mr-2 md:mr-4 w-10 md:w-14 hover-scale">
            <span class="text-white font-bold text-lg md:text-xl">Inventaris Barang</span>
        </div>
        <div class="space-x-2 md:space-x-4">
            <a href="{{url('login')}}" class="bg-white hover:bg-gray-100 text-green-600 font-bold py-1 md:py-2 px-3 md:px-6 rounded-full text-sm md:text-base transition duration-300">
                Login
            </a>
            <a href="{{url('register')}}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 md:py-2 px-3 md:px-6 rounded-full text-sm md:text-base transition duration-300">
                Register
            </a>
        </div>
    </header>

    <main class="flex-grow pt-20 md:pt-24 px-4">
        <div class="container mx-auto">
            <!-- Hero Section -->
            <div class="flex flex-col items-center justify-center mb-12 md:mb-16 mt-8 md:mt-24">
                <div class="flex items-center justify-center w-full">
                    <img src="/assets/img/heroine[1].png" alt="Left Image" class="hero-image w-1/2 md:w-1/4 mb-4 md:mb-0 floating animate__animated animate__fadeInLeft">
                    
                    <div class="w-full md:w-1/2 text-center px-4 md:px-8 animate__animated animate__fadeInUp">
                        <h2 class="text-4xl md:text-6xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-blue-600 mb-4 md:mb-6">Welcome</h2>
                        <p class="text-xs md:text-xl text-gray-700 leading-relaxed">
                            Kelola dan pantau inventaris barang sekolah dengan mudah dan efisien.
                            <span class="block mt-2 text-[0.5rem] text-gray-500">Platform modern untuk manajemen aset sekolah</span>
                        </p>
                        <div class="mt-6 md:mt-8">
                            <button class="bg-green-500 text-white px-6 md:px-8 py-2 md:py-3 rounded-full font-bold hover:bg-green-600 transition duration-300 text-sm md:text-base">
                                <a href="{{url('about')}}">Tentang Kami</a>
                            </button>
                        </div>
                    </div>
                    
                    <img src="/assets/img/hero[1].png" alt="Right Image" class="hero-image w-1/2 md:w-1/4 mt-4 md:mt-0 floating animate__animated animate__fadeInRight">
                </div>
            </div>

            <!-- Program Keahlian Section -->
            <div class="bg-white rounded-2xl shadow-xl py-8 md:py-12 px-4 md:px-6 mb-12">
                <h3 class="text-center text-2xl md:text-3xl font-bold text-gray-800 mb-6 md:mb-8">Program Keahlian</h3>
                <div class="program-grid">
                    <!-- Program items -->
                    <div class="program-item">
                        <img src="/assets/img/pplg.png" alt="PPLG" class="partner-logo mx-auto">
                        <p class="text-center mt-2 text-xs md:text-sm font-medium">PPLG</p>
                    </div>
                    <div class="program-item">
                        <img src="/assets/img/tjkt.png" alt="TJKT" class="partner-logo mx-auto">
                        <p class="text-center mt-2 text-xs md:text-sm font-medium">TJKT</p>
                    </div>
                    <div class="program-item">
                        <img src="/assets/img/an.png" alt="AN" class="partner-logo mx-auto">
                        <p class="text-center mt-2 text-xs md:text-sm font-medium">AN</p>
                    </div>
                    <div class="program-item">
                        <img src="/assets/img/perkantoran.png" alt="Perkantoran" class="partner-logo mx-auto">
                        <p class="text-center mt-2 text-xs md:text-sm font-medium">Perkantoran</p>
                    </div>
                    <div class="program-item">
                        <img src="/assets/img/akl.jpg" alt="AKL" class="partner-logo mx-auto">
                        <p class="text-center mt-2 text-xs md:text-sm font-medium">AKL</p>
                    </div>
                    <div class="program-item">
                        <img src="/assets/img/br.png" alt="BR" class="partner-logo mx-auto">
                        <p class="text-center mt-2 text-xs md:text-sm font-medium">BR</p>
                    </div>
                    <div class="program-item">
                        <img src="/assets/img/lps.png" alt="LPS" class="partner-logo mx-auto">
                        <p class="text-center mt-2 text-xs md:text-sm font-medium">LPS</p>
                    </div>
                    <div class="program-item">
                        <img src="/assets/img/dpb.png" alt="DPB" class="partner-logo mx-auto">
                        <p class="text-center mt-2 text-xs md:text-sm font-medium">DPB</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-center py-4 md:py-6">
        <div class="container mx-auto px-4">
            <p class="text-gray-300 mb-2 text-sm md:text-base">© 2024 Inventaris Barang. All rights reserved.</p>
            <div class="flex justify-center space-x-3 md:space-x-4 text-sm md:text-base">
                <a href="{{url('contact')}}" class="text-gray-400 hover:text-white transition duration-300">Contact</a>
                <a href="{{url('privacy')}}" class="text-gray-400 hover:text-white transition duration-300">Privacy Policy</a>
                <a href="{{url('Service')}}" class="text-gray-400 hover:text-white transition duration-300">Terms of Service</a>
            </div>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', () => {
            const elements = document.querySelectorAll('.animate-on-scroll');
            elements.forEach(element => {
                const position = element.getBoundingClientRect();
                if(position.top < window.innerHeight) {
                    element.classList.add('animate__fadeInUp');
                }
            });
        });

        gsap.from(".program-item", {
            duration: 0.8,
            opacity: 0,
            y: 50,
            stagger: 0.1,
            ease: "power2.out",
            scrollTrigger: {
                trigger: ".program-grid",
                start: "top center+=100",
                toggleActions: "play none none reverse"
            }
        });
    </script>
</body>
</html>