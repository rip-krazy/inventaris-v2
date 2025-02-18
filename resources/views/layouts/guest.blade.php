<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Add Animate.css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom Styles -->
        <style>
            .blue-gradient {
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            }
            
            .glass-effect {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .hover-scale {
                transition: transform 0.3s ease;
            }
            
            .hover-scale:hover {
                transform: scale(1.05);
            }

            .program-icon {
                transition: all 0.3s ease;
                filter: grayscale(100%);
            }

            .program-icon:hover {
                filter: grayscale(0%);
                transform: translateY(-5px);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen blue-gradient relative overflow-hidden">
            <!-- Decorative Circles -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
                <div class="absolute w-96 h-96 rounded-full bg-blue-400 opacity-10 -top-20 -left-20"></div>
                <div class="absolute w-96 h-96 rounded-full bg-blue-600 opacity-10 top-1/2 -right-20"></div>
            </div>

            <div class="min-h-screen relative z-10 flex items-center justify-center p-6">
                <div class="container mx-auto">
                    <div class="flex flex-col lg:flex-row items-center gap-12 max-w-7xl mx-auto">
                        <!-- Left Section: Branding -->
                        <div class="w-full lg:w-1/2 text-center lg:text-left space-y-8 animate__animated animate__fadeInLeft">
                            <div class="space-y-6">
                                <img src="/assets/img/smk logo.jpg" 
                                     class="w-40 h-40 mx-auto lg:mx-0 object-cover rounded-2xl shadow-lg hover-scale" 
                                     alt="School Logo">
                                
                                <div class="space-y-3">
                                    <h1 class="text-4xl lg:text-5xl font-bold text-white">
                                        SMK Amaliah Ciawi
                                    </h1>
                                    <p class="text-xl text-gray-200">
                                        Membentuk Generasi Unggul, Kreatif & Inovatif
                                    </p>
                                </div>

                                <!-- Programs Section -->
                                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 space-y-4">
                                    <h3 class="text-xl font-semibold text-white">Program Keahlian</h3>
                                    <div class="grid grid-cols-4 gap-6">
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/pplg.png" alt="PPLG" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-white">PPLG</span>
                                        </div>
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/tjkt.png" alt="TJKT" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-white">TJKT</span>
                                        </div>
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/an.png" alt="AN" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-white">AN</span>
                                        </div>
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/perkantoran.png" alt="MP" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-white">MP</span>
                                        </div>
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/akl.jpg" alt="AKL" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-white">AKL</span>
                                        </div>
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/br.png" alt="BR" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-white">BR</span>
                                        </div>
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/lps.png" alt="LPS" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-white">LPS</span>
                                        </div>
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/dpb.png" alt="DPB" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-white">DPB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Section: Login/Register Form -->
                        <div class="w-full lg:w-1/2 max-w-md animate__animated animate__fadeInRight">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>