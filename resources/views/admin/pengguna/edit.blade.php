@extends('main')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<body class="bg-gray-100 p-12">
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-12 my-10 transform translate-x-4">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-10">Edit Pengguna</h1>
        <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Flex Container for Horizontal Layout -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <!-- Name Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $pengguna->name) }}" 
                           class="w-full border border-gray-300 rounded-lg p-5 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" required>
                </div>

                <!-- Username Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">Username</label>
                    <input type="text" name="username" value="{{ old('username', $pengguna->username) }}" 
                           class="w-full border border-gray-300 rounded-lg p-5 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" required>
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" 
                               class="w-full border border-gray-300 rounded-lg p-5 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                        <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-500 focus:outline-none" onclick="togglePasswordVisibility()">
                            <i id="toggle-icon" class="fas fa-eye"></i>
                        </button>
                    </div>
                    <small class="text-gray-500">Isi password baru jika ingin menggantinya, biarkan kosong jika tidak ingin mengubah.</small>
                </div>

                <!-- Mapel Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">Mapel</label>
                    <input type="text" name="mapel" value="{{ old('mapel', $pengguna->mapel) }}" 
                           class="w-full border border-gray-300 rounded-lg p-5 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-8">
                <button type="submit" class="px-10 py-5 text-lg text-white bg-green-600 rounded-full focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-opacity-50 transition-all duration-300">Update</button>
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
            icon.classList.add('fa-eye-slash'); // Mata tertutup
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye'); // Mata terbuka
        }
    }
</script>

@endsection
