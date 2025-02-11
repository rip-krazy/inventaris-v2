@extends('main')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<div class="max-w-7xl mt-10 mx-auto">
    <div class="bg-gradient-to-br from-white to-green-50 rounded-2xl shadow-2xl p-12 my-10 animate__animated animate__fadeIn">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <i class="fas fa-door-open text-5xl text-green-600 mb-4"></i>
            <h1 class="text-4xl font-extrabold text-gray-800">Tambah Data Ruang</h1>
            <p class="text-gray-600 mt-2">Silakan isi form di bawah ini dengan lengkap</p>
        </div>

        @if ($errors->any())
        <div class="mb-8 p-4 bg-red-100 border-l-4 border-red-500 rounded-lg">
            <ul class="list-disc list-inside text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('ruang.store') }}" method="POST" class="space-y-8">
            @csrf
            <!-- Form Container -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <!-- Nama Ruangan Field -->
                <div class="space-y-3">
                    <label class="block text-lg font-semibold text-gray-700">
                        <i class="fas fa-door-open mr-2 text-green-600"></i>Nama Ruangan
                    </label>
                    <div class="relative">
                        <input type="text" 
                               name="name" 
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400"
                               placeholder="Masukkan nama ruangan"
                               value="{{ old('name') }}"
                               required>
                        <i class="fas fa-building absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Keterangan Field -->
                <div class="space-y-3">
                    <label class="block text-lg font-semibold text-gray-700">
                        <i class="fas fa-info-circle mr-2 text-green-600"></i>Keterangan
                    </label>
                    <div class="relative">
                        <input type="text" 
                               name="description" 
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400"
                               placeholder="Masukkan keterangan ruangan"
                               value="{{ old('description') }}">
                        <i class="fas fa-comment-alt absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-center space-x-4 mt-12">
                <a href="{{ route('ruang.index') }}" 
                   class="px-8 py-4 text-lg text-green-600 bg-white border-2 border-green-600 rounded-xl hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <button type="submit" 
                        class="px-8 py-4 text-lg text-white bg-green-600 rounded-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300">
                    <i class="fas fa-save mr-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
