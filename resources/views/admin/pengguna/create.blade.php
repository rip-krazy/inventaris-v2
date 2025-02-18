@extends('main')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<body class="bg-gradient-to-br from-white to-green-50 p-12">
    <div class="max-w-7xl mx-auto bg-white rounded-2xl shadow-2xl p-12 my-10">
        <div class="text-center mb-12">
            <i class="fas fa-user-plus text-5xl text-green-600 mb-4"></i>
            <h1 class="text-4xl font-extrabold text-gray-800">Tambah Pengguna</h1>
            <p class="text-gray-600 mt-2">Gunakan form berikut untuk menambahkan pengguna baru.</p>
        </div>

        <form action="{{ route('pengguna.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- Flex Container for Horizontal Layout -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <!-- Name Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-user mr-2 text-green-600"></i>Nama
                    </label>
                    <input type="text" 
                           name="name" 
                           class="w-full border-2 border-gray-300 rounded-xl p-5 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300 placeholder-gray-400"
                           placeholder="Masukkan nama"
                           required>
                </div>

                <!-- Username Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-user-circle mr-2 text-green-600"></i>Username
                    </label>
                    <input type="text" 
                           name="username" 
                           class="w-full border-2 border-gray-300 rounded-xl p-5 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300 placeholder-gray-400"
                           placeholder="Masukkan username"
                           required>
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-lock mr-2 text-green-600"></i>Password
                    </label>
                    <div class="relative">
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="w-full border-2 border-gray-300 rounded-xl p-5 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300"
                               placeholder="Masukkan password"
                               required>
                        <button type="button" class="absolute inset-y-0 right-4 flex items-center text-gray-500" onclick="togglePasswordVisibility()">
                            <i id="toggle-icon" class="fa fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Mapel Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-book-open mr-2 text-green-600"></i>Mapel
                    </label>
                    <input type="text" 
                           name="mapel" 
                           class="w-full border-2 border-gray-300 rounded-xl p-5 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300 placeholder-gray-400"
                           placeholder="Masukkan mapel"
                           required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-12">
                <button type="submit" 
                        class="px-10 py-5 text-lg text-white bg-green-600 rounded-xl hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-500 transition-all duration-300">
                    <i class="fas fa-save mr-2"></i>Simpan
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
