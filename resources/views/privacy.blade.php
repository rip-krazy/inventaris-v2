<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
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
        .policy-card {
            transition: all 0.3s ease;
        }
        .policy-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
    <header class="gradient-bg shadow-lg p-4 flex justify-between items-center fixed w-full top-0 z-50">
        <div class="flex items-center">
            <img src="/assets/img/Logo_Inventaris-removebg-preview.png" alt="Logo" class="h-14 mr-4 w-14 hover-scale">
            <span class="text-white font-bold text-xl">Inventaris Barang</span>
        </div>
        <a href="/" class="text-white hover:text-gray-200 font-semibold">
            Home
        </a>
    </header>

    <main class="flex-grow pt-24 px-4 md:px-8 lg:px-16">
        <div class="max-w-4xl mx-auto py-12">
            <h1 class="text-4xl font-bold text-center mb-12 bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-blue-600">
                Kebijakan Privasi
            </h1>

            <div class="space-y-8">
                <!-- Introduction -->
                <div class="bg-white rounded-xl shadow-lg p-6 policy-card">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Pendahuluan</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Kami menghargai privasi Anda dan berkomitmen untuk melindungi informasi pribadi yang Anda berikan kepada kami. Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi data Anda saat menggunakan aplikasi Inventaris Barang.
                    </p>
                </div>

                <!-- Data Collection -->
                <div class="bg-white rounded-xl shadow-lg p-6 policy-card">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Informasi yang Kami Kumpulkan</h2>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Informasi akun (nama, email, dan kata sandi)</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Data inventaris (nama barang, jumlah, lokasi, dan status)</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Log aktivitas sistem</span>
                        </li>
                    </ul>
                </div>

                <!-- Data Usage -->
                <div class="bg-white rounded-xl shadow-lg p-6 policy-card">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Penggunaan Data</h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Kami menggunakan data yang dikumpulkan untuk:
                    </p>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-gray-700 mb-2">Pengelolaan Inventaris</h3>
                            <p class="text-gray-600">Memfasilitasi pencatatan dan pelacakan inventaris barang sekolah</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-gray-700 mb-2">Peningkatan Layanan</h3>
                            <p class="text-gray-600">Menganalisis penggunaan sistem untuk meningkatkan fitur dan performa</p>
                        </div>
                    </div>
                </div>

                <!-- Data Security -->
                <div class="bg-white rounded-xl shadow-lg p-6 policy-card">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Keamanan Data</h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Kami menerapkan langkah-langkah keamanan yang ketat untuk melindungi data Anda:
                    </p>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="text-center p-4">
                            <div class="bg-green-100 p-3 rounded-full inline-block mb-3">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-700">Enkripsi Data</h3>
                        </div>
                        <div class="text-center p-4">
                            <div class="bg-blue-100 p-3 rounded-full inline-block mb-3">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-700">Akses Terbatas</h3>
                        </div>
                        <div class="text-center p-4">
                            <div class="bg-purple-100 p-3 rounded-full inline-block mb-3">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-700">Backup Rutin</h3>
                        </div>
                    </div>
                </div>

                <!-- Contact -->
                <div class="bg-white rounded-xl shadow-lg p-6 policy-card">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Hubungi Kami</h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Jika Anda memiliki pertanyaan tentang kebijakan privasi kami, silakan hubungi:
                    </p>
                    <div class="bg-gray-50 p-4 rounded-lg inline-block">
                        <p class="text-gray-700">Email: support@inventarisbarang.com</p>
                        <p class="text-gray-700">Telepon: (021) 1234-5678</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center text-gray-500 text-sm">
                Terakhir diperbarui: 12 Februari 2024
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-center py-6">
        <div class="container mx-auto px-4">
            <p class="text-gray-300 mb-2">© 2024 Inventaris Barang. All rights reserved.</p>
            <div class="flex justify-center space-x-4">
                <a href="/contact" class="text-gray-400 hover:text-white transition duration-300">Contact</a>
                <a href="/privacy" class="text-gray-400 hover:text-white transition duration-300">Privacy Policy</a>
                <a href="{{url('Service')}}" class="text-gray-400 hover:text-white transition duration-300">Terms of Service</a>
            </div>
        </div>
    </footer>
</body>
</html>