@extends('main')

@section('content')

<div class="container mx-80 mt-32">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-extrabold text-gray-900 text-center mb-6">History Page</h1>
        <p class="text-lg text-gray-700 mb-4 text-center">This is where you can view all your historical actions and changes. Below you will find a log of all activities that have been recorded.</p>

        <!-- History Card Section -->
        <div class="space-y-4">
            <!-- Monday -->
            <div class="bg-gray-100 p-4 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">Senin</h3>
                    <p class="text-gray-600 mt-2">Deskripsi tindakan yang dilakukan pada hari Senin. Rincian mengenai apa yang terjadi pada hari ini.</p>
                    <p class="mt-2 text-sm text-gray-500">Diperoleh pada: Januari 5, 2025</p>
                </div>
                <!-- Logo Button -->
                <a href="#" class="ml-4 text-blue-500 hover:text-blue-700 font-semibold">
                    <img src="assets/img/info detail hari.png" alt="Detail Logo" class="w-6 h-6">
                </a>
            </div>

            <!-- Tuesday -->
            <div class="bg-gray-100 p-4 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">Selasa</h3>
                    <p class="text-gray-600 mt-2">Deskripsi tindakan yang dilakukan pada hari Selasa. Rincian mengenai apa yang terjadi pada hari ini.</p>
                    <p class="mt-2 text-sm text-gray-500">Diperoleh pada: Januari 6, 2025</p>
                </div>
                <!-- Logo Button -->
                <a href="#" class="ml-4 text-blue-500 hover:text-blue-700 font-semibold">
                    <img src="assets/img/info detail hari.png" alt="Detail Logo" class="w-6 h-6">
                </a>
            </div>

            <!-- Wednesday -->
            <div class="bg-gray-100 p-4 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">Rabu</h3>
                    <p class="text-gray-600 mt-2">Deskripsi tindakan yang dilakukan pada hari Rabu. Rincian mengenai apa yang terjadi pada hari ini.</p>
                    <p class="mt-2 text-sm text-gray-500">Diperoleh pada: Januari 7, 2025</p>
                </div>
                <!-- Logo Button -->
                <a href="#" class="ml-4 text-blue-500 hover:text-blue-700 font-semibold">
                    <img src="assets/img/info detail hari.png" alt="Detail Logo" class="w-6 h-6">
                </a>
            </div>

            <!-- Thursday -->
            <div class="bg-gray-100 p-4 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">Kamis</h3>
                    <p class="text-gray-600 mt-2">Deskripsi tindakan yang dilakukan pada hari Kamis. Rincian mengenai apa yang terjadi pada hari ini.</p>
                    <p class="mt-2 text-sm text-gray-500">Diperoleh pada: Januari 8, 2025</p>
                </div>
                <!-- Logo Button -->
                <a href="#" class="ml-4 text-blue-500 hover:text-blue-700 font-semibold">
                    <img src="assets/img/info detail hari.png" alt="Detail Logo" class="w-6 h-6">
                </a>
            </div>

            <!-- Friday -->
            <div class="bg-gray-100 p-4 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">Jumat</h3>
                    <p class="text-gray-600 mt-2">Deskripsi tindakan yang dilakukan pada hari Jumat. Rincian mengenai apa yang terjadi pada hari ini.</p>
                    <p class="mt-2 text-sm text-gray-500">Diperoleh pada: Januari 9, 2025</p>
                </div>
                <!-- Logo Button -->
                <a href="#" class="ml-4 text-blue-500 hover:text-blue-700 font-semibold">
                    <img src="assets/img/info detail hari.png" alt="Detail Logo" class="w-6 h-6">
                </a>
            </div>

            <!-- Saturday -->
            <div class="bg-gray-100 p-4 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">Sabtu</h3>
                    <p class="text-gray-600 mt-2">Deskripsi tindakan yang dilakukan pada hari Sabtu. Rincian mengenai apa yang terjadi pada hari ini.</p>
                    <p class="mt-2 text-sm text-gray-500">Diperoleh pada: Januari 10, 2025</p>
                </div>
                <!-- Logo Button -->
                <a href="#" class="ml-4 text-blue-500 hover:text-blue-700 font-semibold">
                    <img src="assets/img/info detail hari.png" alt="Detail Logo" class="w-6 h-6">
                </a>
            </div>

            <!-- Sunday -->
            <div class="bg-gray-100 p-4 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">Minggu</h3>
                    <p class="text-gray-600 mt-2">Deskripsi tindakan yang dilakukan pada hari Minggu. Rincian mengenai apa yang terjadi pada hari ini.</p>
                    <p class="mt-2 text-sm text-gray-500">Diperoleh pada: Januari 11, 2025</p>
                </div>
                <!-- Logo Button -->
                <a href="#" class="ml-4 text-blue-500 hover:text-blue-700 font-semibold">
                    <img src="assets/img/info detail hari.png" alt="Detail Logo" class="w-6 h-6">
                </a>
            </div>
        </div>

        <!-- Add more dynamic history content here as needed -->

    </div>
</div>

@endsection