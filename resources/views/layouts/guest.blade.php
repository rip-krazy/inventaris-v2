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
            /* Background putih */
            .white-bg {
                background-color: #ffffff;
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
            
            /* Box shadow untuk section program keahlian */
            .program-section {
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <!-- Background putih -->
        <div class="min-h-screen white-bg relative overflow-hidden">
            <!-- Lingkaran dekoratif dengan warna bebas yang menarik -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
                <div class="absolute w-96 h-96 rounded-full bg-indigo-500 opacity-10 -top-20 -left-20"></div>
                <div class="absolute w-96 h-96 rounded-full bg-amber-400 opacity-10 top-1/2 -right-20"></div>
                <div class="absolute w-64 h-64 rounded-full bg-teal-400 opacity-10 bottom-20 left-1/4"></div>
            </div>

            <div class="min-h-screen relative z-10 flex items-center justify-center p-6">
                <div class="container mx-auto">
                    <div class="flex flex-col lg:flex-row items-center gap-12 max-w-7xl mx-auto">
                        <!-- Left Section: Branding -->
                        <div class="w-full lg:w-1/2 text-center lg:text-left space-y-8 animate__animated animate__fadeInLeft">
                            <div class="space-y-6">
                                <img src="/assets/img/smk logo.jpg" 
                                     class="w-40 h-40 mx-auto lg:mx-0 object-cover rounded-full shadow-lg hover-scale" 
                                     alt="School Logo">
                                
                                <div class="space-y-3">
                                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-800">
                                        SMK Amaliah Ciawi
                                    </h1>
                                    <p class="text-xl text-gray-600">
                                        Membentuk Generasi Unggul, Kreatif & Inovatif
                                    </p>
                                </div>

                                <!-- Programs Section - diubah warnanya agar sesuai dengan background putih -->
                                <div class="bg-gray-50 rounded-2xl p-6 space-y-4 program-section">
                                    <h3 class="text-xl font-semibold text-gray-800">Program Keahlian</h3>
                                    <div class="grid grid-cols-4 gap-6">
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/pplg.png" alt="PPLG" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-gray-700">PPLG</span>
                                        </div>
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/tjkt.png" alt="TJKT" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-gray-700">TJKT</span>
                                        </div>
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/an.png" alt="AN" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-gray-700">AN</span>
                                        </div>
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/perkantoran.png" alt="MP" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-gray-700">MP</span>
                                        </div>
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/akl.jpg" alt="AKL" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-gray-700">AKL</span>
                                        </div>
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/br.png" alt="BR" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-gray-700">BR</span>
                                        </div>
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/lps.png" alt="LPS" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-gray-700">LPS</span>
                                        </div>
                                        <div class="program-container text-center space-y-2">
                                            <img src="/assets/img/dpb.png" alt="DPB" class="program-icon h-16 w-16 mx-auto">
                                            <span class="text-xs text-gray-700">DPB</span>
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