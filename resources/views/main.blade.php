<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Welcome to Inventaris Barang</title>
</head>
<body class="bg-gray-100 flex flex-col h-screen">
    <header class="bg-gray shadow p-4 flex justify-between items-center">
        <div class="flex items-center">
            <img src="{{ asset('assets\img\Logo_Inventaris-removebg-preview.png') }}" alt="Logo" class="h-16 w-16 mr-2">
            <h1 class="text-xl font-bold text-green-600">Inventaris Barang</h1>
        </div>
    </header>
    
    @yield ('content')
</body>
</html>
