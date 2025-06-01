@extends('main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<title>Registrasi Pengguna Baru</title>

<div class="w-100 mx-16 bg-white rounded-xl shadow-2xl p-10 my-10 animate__animated animate__fadeIn">
    <!-- Header Section -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8 animate__animated animate__fadeIn">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">
                <i class="fas fa-user-plus text-green-600 mr-3"></i>Registrasi Pengguna Baru
            </h1>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded animate__animated animate__fadeIn">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3"></i>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded animate__animated animate__fadeIn">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-3"></i>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <!-- Summary Cards -->
        <div class="bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-lg shadow-inner border border-green-200">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="flex items-center justify-center">
                    <div class="p-3 rounded-full bg-green-200 text-green-700 mr-3">
                        <i class="fas fa-user text-xl"></i>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-gray-600">Proses Cepat</p>
                        <p class="text-2xl font-bold text-gray-800">5 Min</p>
                    </div>
                </div>
                
                <div class="flex items-center justify-center">
                    <div class="p-3 rounded-full bg-blue-200 text-blue-700 mr-3">
                        <i class="fas fa-shield-alt text-xl"></i>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-gray-600">Keamanan</p>
                        <p class="text-2xl font-bold text-gray-800">Tinggi</p>
                    </div>
                </div>
                
                <div class="flex items-center justify-center">
                    <div class="p-3 rounded-full bg-yellow-200 text-yellow-700 mr-3">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-gray-600">Verifikasi</p>
                        <p class="text-2xl font-bold text-gray-800">Email</p>
                    </div>
                </div>
                
                <div class="flex items-center justify-center">
                    <div class="p-3 rounded-full bg-purple-200 text-purple-700 mr-3">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-gray-600">Akses</p>
                        <p class="text-2xl font-bold text-gray-800">Langsung</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form Section -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden animate__animated animate__fadeInUp">
        <div class="px-6 py-8">
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="p-4 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-user-plus text-2xl"></i>
                    </div>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Buat Akun Baru</h2>
                <p class="text-gray-500 mt-2">Silakan lengkapi form berikut untuk membuat akun</p>
            </div>

            <!-- Form as Table -->
            <div class="overflow-x-auto">
                <form method="POST" action="{{ route('admin.register.store') }}">
                    @csrf
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Field</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Input</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Name Field -->
                            <tr class="hover:bg-green-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-800">
                                    <div class="flex items-center justify-left">
                                        <div class="p-2 rounded-full bg-green-100 text-green-600 mr-3">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        Nama Lengkap
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <input id="name" type="text" 
                                        class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 @error('name') border-red-500 @enderror" 
                                        name="name" value="{{ old('name') }}" 
                                        required autocomplete="name" autofocus 
                                        placeholder="Nama Lengkap">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @error('name')
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            Error
                                        </span>
                                    @else
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            Required
                                        </span>
                                    @enderror
                                </td>
                            </tr>

                            <!-- Email Field -->
                            <tr class="hover:bg-green-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-800">
                                    <div class="flex items-center justify-left">
                                        <div class="p-2 rounded-full bg-green-100 text-green-600 mr-3">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        Alamat Email
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <input id="email" type="email" 
                                        class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 @error('email') border-red-500 @enderror" 
                                        name="email" value="{{ old('email') }}" 
                                        required autocomplete="email" 
                                        placeholder="email@example.com">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @error('email')
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            Error
                                        </span>
                                    @else
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            Required
                                        </span>
                                    @enderror
                                </td>
                            </tr>

                            <!-- User Type Field -->
                            <tr class="hover:bg-green-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-800">
                                    <div class="flex items-center justify-left">
                                        <div class="p-2 rounded-full bg-green-100 text-green-600 mr-3">
                                            <i class="fas fa-users-cog"></i>
                                        </div>
                                        Tipe Pengguna
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <select id="usertype" 
                                        class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 @error('usertype') border-red-500 @enderror" 
                                        name="usertype" required>
                                       <option value="">Pilih User Type</option>
                                        <option value="user" {{ old('usertype') == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ old('usertype') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @error('usertype')
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            Error
                                        </span>
                                    @else
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            Required
                                        </span>
                                    @enderror
                                </td>
                            </tr>

                            <!-- Mata Pelajaran Field -->
                            <tr class="hover:bg-green-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-800">
                                    <div class="flex items-center justify-left">
                                        <div class="p-2 rounded-full bg-green-100 text-green-600 mr-3">
                                            <i class="fas fa-book"></i>
                                        </div>
                                        Mata Pelajaran
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <input id="mapel" type="text" 
                                        class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 @error('mapel') border-red-500 @enderror" 
                                        name="mapel" value="{{ old('mapel') }}" required 
                                        placeholder="Matematika, Bahasa Indonesia, dll">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @error('mapel')
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            Error
                                        </span>
                                    @else
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            Required
                                        </span>
                                    @enderror
                                </td>
                            </tr>

                            <!-- Password Field -->
                            <tr class="hover:bg-green-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-800">
                                    <div class="flex items-center justify-left">
                                        <div class="p-2 rounded-full bg-green-100 text-green-600 mr-3">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                        Password
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="relative">
                                        <input id="password" type="password" 
                                            class="block w-full px-3 py-2 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 @error('password') border-red-500 @enderror" 
                                            name="password" 
                                            required autocomplete="new-password" 
                                            placeholder="Minimal 8 karakter">
                                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-500">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <!-- Password strength meter -->
                                    <div class="mt-2">
                                        <div class="flex justify-between text-xs text-gray-500 mb-1">
                                            <span>Kekuatan:</span>
                                            <span id="strengthText">Belum ada</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div id="passwordStrength" class="h-1.5 rounded-full transition-all duration-300" style="width: 0%"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @error('password')
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            Error
                                        </span>
                                    @else
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            Required
                                        </span>
                                    @enderror
                                </td>
                            </tr>

                            <!-- Confirm Password Field -->
                            <tr class="hover:bg-green-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-800">
                                    <div class="flex items-center justify-left">
                                        <div class="p-2 rounded-full bg-green-100 text-green-600 mr-3">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        Konfirmasi Password
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="relative">
                                        <input id="password-confirm" type="password" 
                                            class="block w-full px-3 py-2 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200" 
                                            name="password_confirmation" 
                                            required autocomplete="new-password" 
                                            placeholder="Ketik ulang password">
                                        <button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-500">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Required
                                    </span>
                                </td>
                            </tr>

                            <!-- Submit Button Row -->
                            <tr class="bg-gray-50">
                                <td colspan="3" class="px-6 py-6 text-center">
                                    <button type="submit" class="w-full md:w-auto px-8 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 flex items-center justify-center mx-auto">
                                        <i class="fas fa-user-plus mr-2"></i>
                                        Buat Akun Baru
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <!-- Error Messages Section -->
    @if($errors->any())
    <div class="mt-8 bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 bg-red-50 border-b">
            <h3 class="text-lg font-semibold text-red-800">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                Kesalahan Validasi
            </h3>
        </div>
        <div class="px-6 py-4">
            <ul class="space-y-2">
                @foreach($errors->all() as $error)
                <li class="flex items-center text-red-600">
                    <i class="fas fa-times-circle mr-2"></i>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <!-- Footer Info -->
    <div class="mt-8 text-center text-gray-500 text-sm">
        <i class="fas fa-info-circle mr-1"></i>
        Sistem Manajemen Pengguna - Diperbarui {{ now()->format('d M Y H:i') }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get elements
        const passwordInput = document.getElementById('password');
        const passwordConfirm = document.getElementById('password-confirm');
        const passwordStrength = document.getElementById('passwordStrength');
        const strengthText = document.getElementById('strengthText');
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        
        // Toggle password visibility
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
        
        toggleConfirmPassword.addEventListener('click', function() {
            const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirm.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

        // Password strength meter
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            let color = '';
            let text = '';
            
            if (password.length >= 8) strength += 25;
            if (password.match(/[a-z]/)) strength += 25;
            if (password.match(/[A-Z]/)) strength += 25;
            if (password.match(/[0-9]/)) strength += 25;
            
            if (strength === 0) {
                color = '#gray';
                text = 'Belum ada';
            } else if (strength <= 25) {
                color = '#ef4444';
                text = 'Lemah';
            } else if (strength <= 50) {
                color = '#f97316';
                text = 'Sedang';
            } else if (strength <= 75) {
                color = '#eab308';
                text = 'Baik';
            } else {
                color = '#22c55e';
                text = 'Kuat';
            }
            
            passwordStrength.style.width = strength + '%';
            passwordStrength.style.backgroundColor = color;
            strengthText.textContent = text;
        });
        
        // Validate password match
        passwordConfirm.addEventListener('input', function() {
            if (this.value !== passwordInput.value && passwordInput.value !== '') {
                this.classList.add('border-red-500');
            } else {
                this.classList.remove('border-red-500');
            }
        });
    });
</script>
@endsection