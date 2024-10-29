@extends ('home')
@section ('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="text">
<h1 class="text-center mt-10 font-bold mb-8 text-4xl">Halaman Dashboard</h1>



<div class="max-w-5xl mx-auto px-4 sm:px-6 md:px-8">
  <div class="flex flex-wrap -mx-4">
    <!-- Card 1 -->
    <div class="w-full md:w-1/3 xl:w-1/4 p-4">
      <div class="bg-white rounded-lg shadow-md p-4 transition-transform transform hover:scale-105 hover:shadow-lg">
        <div class="flex items-center mb-4">
        <i class="fas fa-users text-2xl text-green-500"></i>
          <h2 class="ml-4 text-lg font-bold">User</h2>
          <span class="ml-auto text-gray-600">107</span>
        </div>
        <div class="flex items-center">
          <i class="fas fa-arrow-up text-green-500"></i>
          <span class="ml-2 text-green-600">Peminjaman</span>
        </div>
      </div>
    </div>
    <!-- Card 2 -->
    <div class="w-full md:w-1/3 xl:w-1/4 p-4">
      <div class="bg-white rounded-lg shadow-md p-4 transition-transform transform hover:scale-105 hover:shadow-lg">
        <div class="flex items-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#22c55e" d="M248 0L208 0c-26.5 0-48 21.5-48 48l0 112c0 35.3 28.7 64 64 64l128 0c35.3 0 64-28.7 64-64l0-112c0-26.5-21.5-48-48-48L328 0l0 80c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-80zM64 256c-35.3 0-64 28.7-64 64L0 448c0 35.3 28.7 64 64 64l160 0c35.3 0 64-28.7 64-64l0-128c0-35.3-28.7-64-64-64l-40 0 0 80c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-80-40 0zM352 512l160 0c35.3 0 64-28.7 64-64l0-128c0-35.3-28.7-64-64-64l-40 0 0 80c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-80-40 0c-15 0-28.8 5.1-39.7 13.8c4.9 10.4 7.7 22 7.7 34.2l0 160c0 12.2-2.8 23.8-7.7 34.2C323.2 506.9 337 512 352 512z"/></svg>
           <h2 class="ml-4 text-lg font-bold">Barang Dikembalikan</h2>
          <span class="ml-auto text-gray-600">200</span>
        </div>
        <div class="flex items-center">
          <i class="fas fa-plus text-blue-500"></i>
          <span class="ml-2 text-blue-600">Dikembalikan</span>
        </div>
      </div>
    </div>
    <!-- Tambahan Card 4 -->
    <div class="w-full md:w-1/3 xl:w-1/4 p-4">
      <div class="bg-white rounded-lg shadow-md p-4 transition-transform transform hover:scale-105 hover:shadow-lg">
        <div class="flex items-center mb-4">
          <i class="fas fa-chart-line text-2xl text-red-500"></i>
          <h2 class="ml-4 text-lg font-bold">Belum Dikembalikan</h2>
          <span class="ml-auto text-gray-600">25</span>
        </div>
        <div class="flex items-center">
          <i class="fas fa-arrow-down text-red-500"></i>
          <span class="ml-2 text-red-600">Peminjaman</span>
        </div>
      </div>
    </div>
    <!-- Tambahan Card 4 -->
    <div class="w-full md:w-1/3 xl:w-1/4 p-4">
      <div class="bg-white rounded-lg shadow-md p-4 transition-transform transform hover:scale-105 hover:shadow-lg">
        <div class="flex items-center mb-4">
          <i class="fas fa-chart-line text-2xl text-blue-500"></i>
          <h2 class="ml-4 text-lg font-bold">Total Barang</h2>
          <span class="ml-auto text-gray-600">200</span>
        </div>
        <div class="flex items-center">
          <i class="fas fa-arrow-up text-green-500"></i>
          <span class="ml-2 text-green-600">Keseluruhan</span>
        </div>
      </div>
    </div>
    <!-- Tambahan Card 5 -->
    <div class="w-full md:w-1/3 xl:w-1/4 p-4">
      <div class="bg-white rounded-lg shadow-md p-4 transition-transform transform hover:scale-105 hover:shadow-lg">
        <div class="flex items-center mb-4">
          <i class="fas fa-chart-line text-2xl text-blue-500"></i>
          <h2 class="ml-4 text-lg font-bold">Peminjaman</h2>
          <span class="ml-auto text-gray-600">25</span>
        </div>
        <div class="flex items-center">
          <i class ="fas fa-arrow-up text-green-500"></i>
          <span class="ml-2 text-green-600">Total</span>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
