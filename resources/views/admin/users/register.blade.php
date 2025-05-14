
@extends('layouts.admin')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
<div class="w-100 mx-16 bg-white rounded-xl shadow-2xl p-10  animate__animated animate__fadeIn">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
            <!-- Left side decorative column -->
            <div class="md:w-2/5 bg-gradient-to-br from-blue-600 to-indigo-700 p-8 flex flex-col justify-center relative overflow-hidden">
                <!-- Background pattern -->
                <div class="absolute inset-0 opacity-10">
                    <svg viewBox="0 0 100 100" preserveAspectRatio="none" class="w-full h-full">
                        <path d="M0,0 L100,0 L100,100 L0,100 Z" fill="none" stroke="white" stroke-width="2" stroke-dasharray="5,5" />
                    </svg>
                </div>
                
                <!-- Content -->
                <div class="relative z-10 text-center md:text-left">
                    <div class="flex justify-center md:justify-start">
                    <svg class="w-16 h-16 mb-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                    </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-white mb-3">Buat Akun Baru</h2>
                    <p class="text-blue-100 mb-8 max-w-md">Bergabunglah dengan sistem kami untuk mengelola pembelajaran dengan lebih efektif dan efisien.</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-8 h-8 rounded-full bg-white bg-opacity-20 flex items-center justify-center">
                                    <i class="fas fa-check text-xs text-white"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-white">Proses pendaftaran cepat</p>
                                <p class="text-xs text-blue-100">Hanya membutuhkan beberapa menit</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-8 h-8 rounded-full bg-white bg-opacity-20 flex items-center justify-center">
                                    <i class="fas fa-lock text-xs text-white"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-white">Keamanan terjamin</p>
                                <p class="text-xs text-blue-100">Data Anda dilindungi dengan enkripsi</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Decorative elements -->
                <div class="absolute bottom-0 left-0 right-0 h-16 opacity-20">
                    <svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" fill="white" opacity=".25"/>
                        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" fill="white" opacity=".5"/>
                        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="white"/>
                    </svg>
                </div>
            </div>
            
            <!-- Right side form -->
            <div class="md:w-3/5 p-8 md:p-10">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">Registrasi Pengguna Baru</h2>
                    <p class="text-gray-500 mt-2">Silakan lengkapi form berikut untuk membuat akun</p>
                </div>

                <form method="POST" action="{{ route('admin.register.store') }}" class="space-y-6">
                    @csrf

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input id="name" type="text" 
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('name') border-red-500 @enderror" 
                                name="name" value="{{ old('name') }}" 
                                required autocomplete="name" autofocus 
                                placeholder="Nama Lengkap">
                            @error('name')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-exclamation-circle text-red-500"></i>
                                </div>
                            @enderror
                        </div>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" type="email" 
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('email') border-red-500 @enderror" 
                                name="email" value="{{ old('email') }}" 
                                required autocomplete="email" 
                                placeholder="email@example.com">
                            @error('email')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-exclamation-circle text-red-500"></i>
                                </div>
                            @enderror
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- User Type Field -->
                    <div>
                        <label for="usertype" class="block text-sm font-medium text-gray-700 mb-1">Tipe Pengguna</label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-users-cog text-gray-400"></i>
                            </div>
                            <select id="usertype" 
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('usertype') border-red-500 @enderror" 
                                name="usertype" required>
                                <option value="" disabled selected>Pilih tipe pengguna</option>
                                <option value="admin" {{ old('usertype') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="guru" {{ old('usertype') == 'guru' ? 'selected' : '' }}>Guru</option>
                                <option value="siswa" {{ old('usertype') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                            </select>
                            @error('usertype')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-exclamation-circle text-red-500"></i>
                                </div>
                            @enderror
                        </div>
                        @error('usertype')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Mata Pelajaran Field (only shown for Guru) -->
                    <div id="mapel-container">
                        <label for="mapel" class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran</label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-book text-gray-400"></i>
                            </div>
                            <input id="mapel" type="text" 
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('mapel') border-red-500 @enderror" 
                                name="mapel" value="{{ old('mapel') }}"  
                                placeholder="Matematika, Bahasa Indonesia, dll">
                            @error('mapel')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-exclamation-circle text-red-500"></i>
                                </div>
                            @enderror
                        </div>
                        @error('mapel')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kelas Field (only shown for Siswa) -->
                    <div id="kelas-container" style="display: none;">
                        <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-school text-gray-400"></i>
                            </div>
                            <input id="kelas" type="text" 
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('kelas') border-red-500 @enderror" 
                                name="kelas" value="{{ old('kelas') }}"  
                                placeholder="10A, 11B, 12C, dll">
                            @error('kelas')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-exclamation-circle text-red-500"></i>
                                </div>
                            @enderror
                        </div>
                        @error('kelas')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" type="password" 
                                class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('password') border-red-500 @enderror" 
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
                                <span>Kekuatan password:</span>
                                <span id="strengthText">Lemah</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                <div id="passwordStrength" class="h-1.5 rounded-full bg-red-500 transition-all duration-300" style="width: 0%"></div>
                            </div>
                        </div>
                        
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-check-circle text-gray-400"></i>
                            </div>
                            <input id="password-confirm" type="password" 
                                class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" 
                                name="password_confirmation" 
                                required autocomplete="new-password" 
                                placeholder="Ketik ulang password">
                            <button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-500">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                            <i class="fas fa-user-plus mr-2"></i> Buat Akun Baru
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="text-center text-sm text-gray-500">
            Sudah punya akun? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">Masuk di sini</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('password-confirm');
        const passwordStrength = document.getElementById('passwordStrength');
        const strengthText = document.getElementById('strengthText');
        const userType = document.getElementById('usertype');
        const mapelContainer = document.getElementById('mapel-container');
        const kelasContainer = document.getElementById('kelas-container');
        
        // Toggle fields based on user type
        userType.addEventListener('change', function() {
            if (this.value === 'guru') {
                mapelContainer.style.display = 'block';
                kelasContainer.style.display = 'none';
                document.getElementById('mapel').setAttribute('required', 'required');
                document.getElementById('kelas').removeAttribute('required');
            } else if (this.value === 'siswa') {
                mapelContainer.style.display = 'none';
                kelasContainer.style.display = 'block';
                document.getElementById('mapel').removeAttribute('required');
                document.getElementById('kelas').setAttribute('required', 'required');
            } else {
                mapelContainer.style.display = 'none';
                kelasContainer.style.display = 'none';
                document.getElementById('mapel').removeAttribute('required');
                document.getElementById('kelas').removeAttribute('required');
            }
        });
        
        // Initial state check if form has been submitted and returned with errors
        if (userType.value === 'guru') {
            mapelContainer.style.display = 'block';
            kelasContainer.style.display = 'none';
        } else if (userType.value === 'siswa') {
            mapelContainer.style.display = 'none';
            kelasContainer.style.display = 'block';
        }
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
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
        password.addEventListener('input', function() {
            const val = this.value;
            let strength = 0;
            
            // Length check
            if (val.length >= 8) strength += 20;
            if (val.length >= 12) strength += 20;
            
            // Character type checks
            if (val.match(/[A-Z]/)) strength += 20;
            if (val.match(/[0-9]/)) strength += 20;
            if (val.match(/[^A-Za-z0-9]/)) strength += 20;
            
            // Cap at 100
            strength = Math.min(strength, 100);
            
            passwordStrength.style.width = strength + '%';
            
            // Update color and text
            if (strength < 40) {
                passwordStrength.className = 'h-1.5 rounded-full bg-red-500 transition-all duration-300';
                strengthText.textContent = 'Lemah';
            } else if (strength < 70) {
                passwordStrength.className = 'h-1.5 rounded-full bg-yellow-500 transition-all duration-300';
                strengthText.textContent = 'Sedang';
            } else {
                passwordStrength.className = 'h-1.5 rounded-full bg-green-500 transition-all duration-300';
                strengthText.textContent = 'Kuat';
            }
        });
        
        // Validate password match
        passwordConfirm.addEventListener('input', function() {
            if (this.value !== password.value && password.value !== '') {
                this.classList.add('border-red-500');
            } else {
                this.classList.remove('border-red-500');
            }
        });
    });
</script>
@endsection