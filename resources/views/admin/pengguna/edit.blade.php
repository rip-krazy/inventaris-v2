@extends('main')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<body class="bg-gradient-to-br from-white to-green-50 p-12">
    <div class="w-100 mx-24 bg-white rounded-2xl shadow-2xl p-12 my-10">
        <div class="text-center mb-12">
            <i class="fas fa-user-edit text-5xl text-green-600 mb-4"></i>
            <h1 class="text-4xl font-extrabold text-gray-800">Edit Pengguna</h1>
            <p class="text-gray-600 mt-2">Perbarui informasi pengguna dengan data yang valid</p>
        </div>

        @if($errors->any())
            <div class="mb-8 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span>Mohon periksa kembali data yang Anda masukkan</span>
                </div>
            </div>
        @endif

        <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Grid Layout for Form Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Name Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-user mr-2 text-green-600"></i>Nama Lengkap
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input type="text" 
                               name="name" 
                               value="{{ old('name', $pengguna->name) }}"
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                               placeholder="Nama pengguna"
                               required>
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-envelope mr-2 text-green-600"></i>Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" 
                               name="email" 
                               value="{{ old('email', $pengguna->email) }}"
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                               placeholder="Email valid"
                               required>
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-lock mr-2 text-green-600"></i>Password Baru
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" 
                               id="password"
                               name="password" 
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 pr-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                               placeholder="Minimal 8 karakter">
                        <button type="button" 
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-gray-700"
                                onclick="togglePasswordVisibility()">
                            <i id="toggle-icon" class="fas fa-eye"></i>
                        </button>
                    </div>
                    <small class="text-gray-500 mt-2 block">Kosongkan jika tidak ingin mengubah password</small>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mapel Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-book-open mr-2 text-green-600"></i>Mata Pelajaran
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-book text-gray-400"></i>
                        </div>
                        <input type="text" 
                               name="mapel" 
                               value="{{ old('mapel', $pengguna->mapel) }}"
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                               placeholder="Mata pelajaran"
                               required>
                    </div>
                    @error('mapel')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between items-center pt-8">
                <a href="{{ route('pengguna.index') }}" 
                   class="px-8 py-3 text-lg text-gray-700 bg-gray-200 rounded-xl hover:bg-gray-300 transition-all duration-300 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
                <button type="submit" 
                        class="px-8 py-3 text-lg text-white bg-green-600 rounded-xl hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 transition-all duration-300 flex items-center">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</body>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const icon = document.getElementById('toggle-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

@endsection