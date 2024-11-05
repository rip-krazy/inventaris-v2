<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Welcome</title>
</head>
<header class="bg-gray-800 shadow p-4 flex justify-between items-center">
    <div class="flex items-center">
        <img src="/assets/img/Logo_Inventaris-removebg-preview.png" alt="Logo" class="h-14 mr-4 w-14"> <!-- Replace with your logo path -->
        <span class="text-white font-bold text-xl">Inventaris Barang</span>
    </div>
    <div>
        <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Login
        </a>
        <a href="{{ route('register') }}" class="ml-4 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
            Register
        </a>
    </div>
</header>

<body class="flex flex-col min-h-screen">
    <main class="flex-grow flex items-center justify-center pt-5">
        <!-- Wrapper for text and images -->
        <div class="text-center fade-in flex items-center justify-center">
            <!-- Left Image -->
            <img src="/assets/img/heroine[1].png" alt="Left Image" class="h-80 mr-4 hidden md:block"> <!-- Replace with your image path -->

            <!-- Text Content -->
            <div>
                <h2 class="text-6xl font-bold text-green-600">Welcome</h2>
                <p class="mt-4 text-lg text-gray-700">Kelola dan pantau inventaris barang sekolah dengan mudah.</p>
            </div>

            <!-- Right Image -->
            <img src="/assets/img/hero[1].png" alt="Right Image" class="h-80 ml-4 hidden md:block"> <!-- Replace with your image path -->
        </div>
    </main>

    <footer class="bg-gray-200 text-center py-4 mt-auto">
        <p class="text-gray-600">© 2024 Inventaris Barang. All rights reserved.</p>
    </footer>

    
</body>
</html>
