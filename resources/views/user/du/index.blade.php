@extends ('home')
@section ('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="text ml-12">
<h1 class="text-center mt-10 font-bold mb-8 text-4xl">Halaman Dashboard</h1>

<div class="max-w-6xl mx-auto px-4 sm:px-6 md:px-8">
  <div class="flex flex-wrap -mx-4">
    <!-- Card 1 -->
    <div class="w-full md:w-1/2 xl:w-1/3 p-4">
      <div class="bg-white rounded-lg shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-lg">
          <div class="flex items-center mb-4">
            <i class="fas fa-users text-2xl text-green-500"></i>
            <h2 class="ml-4 text-lg font-bold">User</h2>
            <span class="ml-auto text-gray-600">{{ $jumlahPengguna }}</span> <!-- Tampilkan jumlah pengguna dinamis -->
          </div>
          <div class="flex items-center">
            <i class="fas fa-arrow-up text-green-500"></i>
            <span class="ml-2 text-green-600">User</span>
          </div>
      </div>
    </div>
    <!-- Card 2 -->
    <div class="w-full md:w-1/2 xl:w-1/3 p-4">
      <div class="bg-white rounded-lg shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-lg">
        <div class="flex items-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512">
            <path fill="#22c55e" d="M248 0L208 0c-26.5 0-48 21.5-48 48l0 112c0 35.3 28.7 64 64 64l128 0c35.3 0 64-28.7 64-64l0-112c0-26.5-21.5-48-48-48L328 0l0 80c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-80zM64 256c-35.3 0-64 28.7-64 64L0 448c0 35.3 28.7 64 64 64l160 0c35.3 0 64-28.7 64-64l0-128c0-35.3-28.7-64-64-64l-40 0 0 80c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-80-40 0zM352 512l160 0c35.3 0 64-28.7 64-64l0-128c0-35.3-28.7-64-64-64l-40 0 0 80c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-80-40 0c-15 0-28.8 5.1-39.7 13.8c4.9 10.4 7.7 22 7.7 34.2l0 160c0 12.2-2.8 23.8-7.7 34.2C323.2 506.9 337 512 352 512z"/>
          </svg>
          <h2 class="ml-4 text-lg font-bold">Barang Dikembalikan</h2>
          <span class="ml-auto text-gray-600">200</span>
        </div>
        <div class="flex items-center">
          <i class="fas fa-plus text-green-500"></i>
          <span class="ml-2 text-green-600">Dikembalikan</span>
        </div>
      </div>
    </div>
    <!-- Card 3 -->
    <div class="w-full md:w-1/2 xl:w-1/3 p-4">
      <div class="bg-white rounded-lg shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-lg">
        <div class="flex items-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" width="30" viewBox="0 0 640 512">
            <path fill="#ef4444" d="M64 64l224 0 0 9.8c0 39-23.7 74-59.9 88.4C167.6 186.5 128 245 128 310.2l0 73.8s0 0 0 0l-64 0L64 64zm288 0l224 0 0 320-67.7 0-3.7-4.5-75.2-90.2c-9.1-10.9-22.6-17.3-36.9-17.3l-71.1 0-41-63.1c-.3-.5-.6-1-1-1.4c44.7-29 72.5-79 72.5-133.6l0-9.8zm73 320l-45.8 0 42.7 64L592 448c26.5 0 48-21.5 48-48l0-352c0-26.5-21.5-48-48-48L48 0C21.5 0 0 21.5 0 48L0 400c0 26.5 21.5 48 48 48l260.2 0 33.2 49.8c9.8 14.7 29.7 18.7 44.4 8.9s18.7-29.7 8.9-44.4L310.5 336l74.6 0 40 48zm-159.5 0L192 384s0 0 0 0l0-73.8c0-10.2 1.6-20.1 4.7-29.5L265.5 384zM192 128a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z"/>
          </svg>
          <h2 class="ml-4 text-lg font-bold">Belum Dikembalikan</h2>
          <span class="ml-auto text-gray-600">25</span>
        </div>
        <div class="flex items-center">
          <i class="fas fa-arrow-down text-red-500"></i>
          <span class="ml-2 text-red-600">Peminjaman</span>
        </div>
      </div>
    </div>
    <!-- Card 4 -->
    <div class="w-full md:w-1/2 xl:w-1/3 p-4">
      <div class="bg-white rounded-lg shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-lg">
        <div class="flex items-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" width="30" viewBox="0 0 640 512">
            <path fill="#0000ff" d="M58.9 42.1c3-6.1 9.6-9.6 16.3-8.7L320 64 564.8 33.4c6.7-.8 13.3 2.7 16.3 8.7l41.7 83.4c9 17.9-.6 39.6-19.8 45.1L439.6 217.3c-13.9 4-28.8-1.9-36.2-14.3L320 64 236.6 203c-7.4 12.4-22.3 18.3-36.2 14.3L37.1 170.6c-19.3-5.5-28.8-27.2-19.8-45.1L58.9 42.1zM321.1 128l54.9 91.4c14.9 24.8 44.6 36.6 72.5 28.6L576 211.6l0 167c0 22-15 41.2-36.4 46.6l-204.1 51c-10.2 2.6-20.9 2.6-31 0l-204.1-51C79 419.7 64 400.5 64 378.5l0-167L191.6 248c27.8 8 57.6-3.8 72.5-28.6L318.9 128l2.2 0z"/>
          </svg>
          <h2 class="ml-4 text-lg font-bold">Total Barang</h2>
          <span class="ml-auto text-gray-600">{{ $totalbarang }}</span>
        </div>
        <div class="flex items-center">
          <i class="fas fa-arrow-up text-green-500"></i>
          <span class="ml-2 text-green-600">Total</span>
        </div>
      </div>
    </div>
    <!-- Card 5 -->
    <div class="w-full md:w-1/2 xl:w-1/3 p-4">
      <div class="bg-white rounded-lg shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-lg">
        <div class="flex items-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512">
            <path fill="#0000ff" d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13L448 224c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.2s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3 .6 2.8 .6 4.3c0 8.8-7.2 16-16 16l-97.5 0c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8l97.5 0c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7C504.8 273.7 512 257.7 512 240c0-35.3-28.6-64-64-64l-92.3 0c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32L0 448c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32l0-224c0-17.7-14.3-32-32-32l-64 0z"/>
          </svg>
          <h2 class="ml-4 text-lg font-bold">Persetujuan</h2>
          <span class="ml-auto text-gray-600">25</span>
        </div>
        <div class="flex items-center">
          <i class="fas fa-arrow-up text-green-500"></i>
          <span class="ml-2 text-green-600">Total</span>
        </div>
      </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-4">
        <div class="bg-white rounded-lg shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-lg">
            <div class="flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512">
                <path fill="#ff0000" d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/>
                </svg>
                <h2 class="ml-4 text-lg font-bold">Barang Rusak</h2>
                <span class="ml-auto text-gray-600">{{ $jumlahBarangRusak }}</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-arrow-down text-red-500"></i>
                <span class="ml-2 text-red-600">Total</span>
            </div>
        </div>
    </div>

    <div class="w-full md:w-1/2 xl:w-1/3 p-4">
        <div class="bg-white rounded-lg shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-lg">
            <div class="flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512">
                <path fill="#107203" d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/>
                </svg>
                <h2 class="ml-4 text-lg font-bold">Barang Baik</h2>
                <span class="ml-auto text-gray-600">{{ $jumlahBarangBaik }}</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-arrow-up text-green-500"></i>
                <span class="ml-2 text-green-600">Total</span>
            </div>
        </div>
    </div>
    
  </div>
</div>
</div>
@endsection
