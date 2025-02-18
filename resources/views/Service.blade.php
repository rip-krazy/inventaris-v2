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
        .content-section {
            animation: fadeIn 1s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
    <header class="gradient-bg shadow-lg p-4 flex justify-between items-center fixed w-full top-0 z-50">
        <div class="flex items-center">
            <img src="/assets/img/Logo_Inventaris-removebg-preview.png" alt="Logo" class="h-14 mr-4 w-14 hover-scale">
            <span class="text-white font-bold text-xl">Inventaris Barang</span>
        </div>
        <nav class="space-x-4">
            <a href="/" class="text-white hover:text-gray-200 transition duration-300">Home</a>
        </nav>
    </header>

    <main class="flex-grow pt-24 px-4 md:px-8 lg:px-16">
        <div class="container mx-auto max-w-4xl bg-white rounded-2xl shadow-xl p-8 mt-8 mb-12">
            <h1 class="text-4xl font-bold text-center mb-8 bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-blue-600">Terms of Service</h1>
            
            <div class="space-y-8 content-section">
                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">1. Pendahuluan</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Selamat datang di Sistem Inventaris Barang. Dengan mengakses dan menggunakan layanan kami, Anda menyetujui untuk terikat dengan syarat dan ketentuan ini.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">2. Penggunaan Layanan</h2>
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <ul class="space-y-4 text-gray-600">
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">•</span>
                                Pengguna wajib menjaga kerahasiaan akun dan password mereka
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">•</span>
                                Pengguna bertanggung jawab atas semua aktivitas yang terjadi dalam akun mereka
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">•</span>
                                Dilarang menyalahgunakan layanan untuk tujuan yang melanggar hukum
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">3. Hak dan Tanggung Jawab</h2>
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Kami berhak untuk:
                        </p>
                        <ul class="space-y-4 text-gray-600">
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">•</span>
                                Memodifikasi atau menghentikan layanan sewaktu-waktu
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">•</span>
                                Membatasi akses pengguna jika terjadi pelanggaran
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">•</span>
                                Memperbarui syarat dan ketentuan tanpa pemberitahuan sebelumnya
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">4. Keamanan Data</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Kami berkomitmen untuk menjaga keamanan data inventaris dan informasi pengguna. Semua data disimpan dengan enkripsi dan hanya dapat diakses oleh pihak yang berwenang.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">5. Pembaruan dan Perubahan</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Terms of Service ini dapat diperbarui sewaktu-waktu. Pengguna akan diberitahu tentang perubahan signifikan melalui email atau notifikasi dalam aplikasi.
                    </p>
                </section>
            </div>

            <div class="mt-12 p-6 bg-gray-50 rounded-xl">
                <p class="text-center text-gray-500">
                    Terakhir diperbarui: 12 Februari 2024
                </p>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-center py-6">
        <div class="container mx-auto px-4">
            <p class="text-gray-300 mb-2">© 2024 Inventaris Barang. All rights reserved.</p>
            <div class="flex justify-center space-x-4">
                <a href="/contact" class="text-gray-400 hover:text-white transition duration-300">Contact</a>
                <a href="/privacy" class="text-gray-400 hover:text-white transition duration-300">Privacy Policy</a>
                <a href="/service" class="text-gray-400 hover:text-white transition duration-300">Terms of Service</a>
            </div>
        </div>
    </footer>
</body>
</html>