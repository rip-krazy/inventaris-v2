@extends('main')

@section('content')
<!-- TailwindCSS + Animate.css CDN -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<div class="w-full max-w-3xl mx-auto mt-16 p-8 bg-white rounded-lg shadow-lg animate__animated animate__fadeIn ml-80">
    <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Tambah Data Ruang</h1>

    <form action="{{ route('ruang.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Input Nama Ruangan -->
        <div class="mb-5">
            <label for="name" class="block text-gray-700 font-medium text-sm">Nama Ruangan</label>
            <input type="text" name="name" id="name" class="border border-gray-300 rounded-md w-full p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition ease-in-out duration-200 shadow-sm" required>
        </div>
        
        <!-- Input Keterangan -->
        <div class="mb-5">
            <label for="description" class="block text-gray-700 font-medium text-sm">Keterangan</label>
            <input type="text" name="description" id="description" class="border border-gray-300 rounded-md w-full p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition ease-in-out duration-200 shadow-sm">
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-between items-center mt-6">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 ease-in-out transform hover:scale-105">
                Simpan
            </button>
            <p class="text-gray-600 text-xs">Tambahkan Ruangan Yang Belum Lengkap :></p>
        </div>
    </form>
</div>

@endsection
