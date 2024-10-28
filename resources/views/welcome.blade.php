<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Welcome to Inventaris Barang</title>
</head>
<body class="bg-gray-100 flex flex-col h-screen">
<header class="bg-gray-800 shadow p-4 flex justify-between items-center relative">
    <div class="flex items-center">
        <img src="{{ asset('assets/img/Logo_Inventaris-removebg-preview.png') }}" alt="Logo" class="h-16 w-16 mr-2">
        <h1 class="text-xl font-bold text-white">Inventaris Barang</h1>
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

<main class="flex-grow flex items-center justify-center">
        <div class="text-center fade-in" id="welcome-text">
            <h2 class="text-6xl font-bold text-green-600">Welcome To Inventaris</h2>
            <p class="mt-4 text-lg text-gray-700">Kelola dan pantau inventaris barang sekolah dengan mudah.</p>
        </div>
    </main>

    <footer class="bg-white text-center p-4">
        <p class="text-gray-600">© 2024 Inventaris Barang. All rights reserved.</p>
    </footer>

    <script>
        window.onload = function() {
            const welcomeText = document.getElementById('welcome-text');
            welcomeText.classList.add('visible');
        };
    </script>
</body>
</html>