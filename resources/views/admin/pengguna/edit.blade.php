@extends('main')

@section('content')

<<<<<<< HEAD
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<body class="bg-gray-100 p-12">
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-12 my-10 transform translate-x-4">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-10">Edit Pengguna</h1>
        <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST" enctype="multipart/form-data">
=======
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<body class="bg-gradient-to-br from-white to-green-50 p-12">
    <div class="max-w-7xl mx-auto bg-white rounded-2xl shadow-2xl p-12 my-10">
        <div class="text-center mb-12">
            <i class="fas fa-user-edit text-5xl text-green-600 mb-4"></i>
            <h1 class="text-4xl font-extrabold text-gray-800">Edit Pengguna</h1>
            <p class="text-gray-600 mt-2">Gunakan form berikut untuk memperbarui informasi pengguna.</p>
        </div>

        <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
>>>>>>> bdd74b0de50a3035f35ef556981ad800a85758df
            @csrf
            @method('PUT')

            <!-- Flex Container for Horizontal Layout -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <!-- Name Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-user mr-2 text-green-600"></i>Nama
                    </label>
                    <input type="text" 
                           name="name" 
                           value="{{ old('name', $pengguna->name) }}"
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
                           value="{{ old('username', $pengguna->username) }}"
                           class="w-full border-2 border-gray-300 rounded-xl p-5 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300 placeholder-gray-400"
                           placeholder="Masukkan username"
                           required>
                </div>

                <!-- Password Field -->
                <div>
<<<<<<< HEAD
                    <label class="block text-lg font-semibold text-gray-700 mb-3">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" 
                               class="w-full border border-gray-300 rounded-lg p-5 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                        <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-500 focus:outline-none" onclick="togglePasswordVisibility()">
                            <i id="toggle-icon" class="fas fa-eye"></i>
                        </button>
                    </div>
                    <small class="text-gray-500">Isi password baru jika ingin menggantinya, biarkan kosong jika tidak ingin mengubah.</small>
=======
                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-lock mr-2 text-green-600"></i>Password
                    </label>
                    <div class="relative">
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="w-full border-2 border-gray-300 rounded-xl p-5 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300"
                               placeholder="Masukkan password baru">
                        <button type="button" class="absolute inset-y-0 right-4 flex items-center text-gray-500" onclick="togglePasswordVisibility()">
                            <i id="toggle-icon" class="fa fa-eye"></i>
                        </button>
                    </div>
                    <small class="text-gray-500 mt-2 block">Kosongkan jika tidak ingin mengganti password</small>
>>>>>>> bdd74b0de50a3035f35ef556981ad800a85758df
                </div>

                <!-- Mapel Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        <i class="fas fa-book-open mr-2 text-green-600"></i>Mapel
                    </label>
                    <input type="text" 
                           name="mapel" 
                           value="{{ old('mapel', $pengguna->mapel) }}"
                           class="w-full border-2 border-gray-300 rounded-xl p-5 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300 placeholder-gray-400"
                           placeholder="Masukkan mapel"
                           required>
                </div>
            </div>

            <!-- Submit Button -->
<<<<<<< HEAD
            <div class="text-center mt-8">
                <button type="submit" class="px-10 py-5 text-lg text-white bg-green-600 rounded-full focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-opacity-50 transition-all duration-300">Update</button>
=======
            <div class="text-center mt-12">
                <button type="submit" 
                        class="px-10 py-5 text-lg text-white bg-green-600 rounded-xl hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-500 transition-all duration-300">
                    <i class="fas fa-save mr-2"></i>Update
                </button>
>>>>>>> bdd74b0de50a3035f35ef556981ad800a85758df
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
<<<<<<< HEAD
            icon.classList.add('fa-eye-slash'); // Mata tertutup
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye'); // Mata terbuka
=======
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
>>>>>>> bdd74b0de50a3035f35ef556981ad800a85758df
        }
    }
</script>

<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> bdd74b0de50a3035f35ef556981ad800a85758df
