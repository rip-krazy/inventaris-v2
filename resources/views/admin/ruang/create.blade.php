@extends('main')

@section('content')
<!-- TailwindCSS + Animate.css CDN -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<div class="w-full max-w-4xl mt-32 mx-80 bg-white rounded-lg shadow-xl p-10 my-10 animate__animated animate__fadeIn">
    <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">Tambah Data Ruang</h1>

    <form action="{{ route('ruang.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Input Nama Ruangan -->
        <div class="mb-8">
            <label for="name" class="block text-gray-700 font-semibold">Nama Ruangan</label>
            <input type="text" name="name" id="name" class="border border-gray-300 rounded-lg w-full p-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition ease-in-out duration-300 shadow-md" required>
        </div>
        
        <!-- Input Keterangan -->
        <div class="mb-8">
            <label for="description" class="block text-gray-700 font-semibold">Keterangan</label>
            <input type="text" name="description" id="description" class="border border-gray-300 rounded-lg w-full p-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition ease-in-out duration-300 shadow-md">
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-right mt-8">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 ease-in-out transform hover:scale-105">
                Simpan
            </button>
            <p class="flex ml-4"> Tambahkan Ruangan Yang Belum Lengkap :></p>
        </div>
    </form>
</div>

@endsection
