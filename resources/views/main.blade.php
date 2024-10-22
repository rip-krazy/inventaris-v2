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
    <div class="flex items-center space-x-6 relative">
        <span class="text-white">Ilya</span>
        <div class="relative">
            <button id="avatarBtn" class="focus:outline-none">
                <img src="{{ asset('assets/img/Logo_Inventaris-removebg-preview.png') }}" alt="Avatar" class="h-10 w-10 rounded-full border-2 border-white mr-4">
            </button>
            <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-lg shadow-lg hidden">
                <a href="/profile" class="block px-4 py-2 hover:bg-gray-200 rounded-t-lg">Profil</a>
                <a href="/logout" class="block px-4 py-2 hover:bg-gray-200 rounded-b-lg">Logout</a>
            </div>
        </div>
    </div>
</header>

<script>
    const avatarBtn = document.getElementById('avatarBtn');
    const dropdown = document.getElementById('dropdown');

    avatarBtn.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
    });

    window.addEventListener('click', (event) => {
        if (!avatarBtn.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>

    
    @yield ('content')
</body>
</html>
