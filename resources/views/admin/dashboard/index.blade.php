@extends('main')
@section('content')

<!-- Improved CSS Libraries -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Chart.js untuk visualisasi data -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<!-- ApexCharts untuk grafik yang lebih menarik -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.0/apexcharts.min.js"></script>
<!-- SweetAlert2 untuk notifikasi yang lebih menarik -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.3.0/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.3.0/sweetalert2.min.css">

<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
    }
    
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .notification-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #ff4d4d;
        color: white;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .gradient-text {
        background: linear-gradient(45deg, #3b82f6, #8b5cf6, #ec4899);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        background-size: 300% 300%;
        animation: gradient-shift 8s ease infinite;
    }
    
    @keyframes gradient-shift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    .pulse {
        animation: pulse-animation 2s infinite;
    }
    
    @keyframes pulse-animation {
        0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); }
        70% { box-shadow: 0 0 0 10px rgba(239, 68, 68, 0); }
        100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
    }
    
    /* Loader untuk efek loading */
    .loader {
        border-top-color: #3498db;
        -webkit-animation: spinner 1.5s linear infinite;
        animation: spinner 1.5s linear infinite;
    }
    
    @-webkit-keyframes spinner {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }
    
    @keyframes spinner {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-6 mr-24 relative">
    <!-- Particle Effect Background -->
    <div id="particles-js" class="absolute inset-0 z-0"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ml-32 relative z-10"> <!-- Added ml-32 for right offset -->
        <!-- Header Section with enhanced styling -->
        <div class="text-center mb-12 animate__animated animate__fadeIn">
            <h1 class="text-5xl font-bold gradient-text mb-3">Dashboard Admin</h1>
            <p class="text-gray-600 text-lg">Sistem Manajemen Inventaris</p>
            <div class="mt-4 w-40 h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 mx-auto rounded-full"></div>
        </div>
        
        <!-- Notification Banner - New Feature -->
        <div id="notification-banner" class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-lg mb-8 shadow-md flex justify-between animate__animated animate__fadeIn hidden">
            <div class="flex items-center">
                <i class="fas fa-info-circle text-blue-500 mr-3 text-xl"></i>
                <span>Selamat datang di dashboard baru! Lihat fitur-fitur baru kami.</span>
            </div>
            <button id="close-notification" class="text-blue-500 hover:text-blue-700">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Date & Time - New Feature -->
        <div class="flex justify-between items-center mb-8">
            <div class="glass-card p-4 rounded-xl flex items-center space-x-3 card-hover transition-all duration-300">
                <i class="fas fa-calendar-alt text-purple-600 text-xl"></i>
                <div>
                    <h3 class="text-gray-700 font-medium" id="current-date">Loading...</h3>
                    <p class="text-gray-500 text-sm" id="current-time">Loading...</p>
                </div>
            </div>
            
            <!-- Quick Actions - New Feature -->
            <div class="flex space-x-4">
                <button id="refresh-btn" class="px-4 py-2 bg-white shadow-md rounded-lg flex items-center space-x-2 hover:bg-gray-50 transition-all card-hover">
                    <i class="fas fa-sync-alt text-blue-600"></i>
                    <span class="text-gray-700">Refresh</span>
                </button>
                <button onclick="window.location.href='{{ url('profile') }}'" 
                        class="px-4 py-2 bg-white shadow-md rounded-lg flex items-center space-x-2 hover:bg-gray-50 transition-all card-hover">
                    <i class="fas fa-cog text-gray-600"></i>
                    <span class="text-gray-700">Pengaturan</span>
                </button>
            </div>
        </div>

        <!-- Quick Summary Bar - Improved with hover effect -->
        <div class="glass-card p-5 rounded-xl shadow-lg mb-8 animate__animated animate__fadeIn transition-all duration-300 card-hover">
            <div class="flex justify-around items-center">
                <div class="text-center hover:scale-110 transition-transform duration-300 cursor-pointer" onclick="showUserDetails()">
                    <div class="text-blue-600 mb-2"><i class="fas fa-users text-3xl"></i></div>
                    <span class="text-sm font-medium text-gray-500">Total Pengguna</span>
                    <div class="text-2xl font-bold text-blue-600 counter" data-target="{{ $jumlahPengguna }}">0</div>
                </div>
                <div class="h-16 w-px bg-gray-200"></div>
                <div class="text-center hover:scale-110 transition-transform duration-300 cursor-pointer" onclick="showItemDetails()">
                    <div class="text-green-600 mb-2"><i class="fas fa-box-open text-3xl"></i></div>
                    <span class="text-sm font-medium text-gray-500">Barang Aktif</span>
                    <div class="text-2xl font-bold text-green-600 counter" data-target="{{ $totalbarang }}">0</div>
                </div>
                <div class="h-16 w-px bg-gray-200"></div>
                <div class="text-center hover:scale-110 transition-transform duration-300 cursor-pointer pulse" onclick="showPendingReturns()">
                    <div class="text-red-600 mb-2"><i class="fas fa-exclamation-circle text-3xl"></i></div>
                    <span class="text-sm font-medium text-gray-500">Pengembalian Tertunda</span>
                    <div class="text-2xl font-bold text-red-600 counter" data-target="5">0</div>
                </div>
               <!-- admin/dashboard.blade.php atau layout yang sesuai -->
<div class="h-16 w-px bg-gray-200"></div>
<div class="text-center hover:scale-110 transition-transform duration-300 cursor-pointer">
    <div class="text-yellow-600 mb-2"><i class="fas fa-hourglass-half text-3xl"></i></div>
    <span class="text-sm font-medium text-gray-500">Menunggu Persetujuan</span>
    <div class="text-2xl font-bold text-yellow-600 counter" data-target="{{ count(Session::get('pending_approvals', [])) }}">0</div>
</div>
</div>

<!-- Tambahkan script JavaScript untuk animasi counter -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.counter');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const count = 0;
        const increment = target > 0 ? Math.ceil(target / 20) : 0;
        
        function updateCount() {
            const currentCount = parseInt(counter.innerText);
            if (currentCount < target) {
                counter.innerText = Math.min(currentCount + increment, target);
                setTimeout(updateCount, 50);
            }
        }
        
        updateCount();
    });
});
</script>
        </div>

        <!-- Stats Grid with enhanced styling -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- User Card with glass morphism effect -->
            <div class="glass-card rounded-xl shadow-lg overflow-hidden card-hover transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-blue-500 opacity-10 rounded-full transform translate-x-20 -translate-y-20"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg">
                            <i class="fas fa-users text-2xl text-white"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Total Pengguna</h2>
                            <p class="text-3xl font-bold text-blue-600 mt-1 counter" data-target="{{ $jumlahPengguna }}">0</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">Aktivitas Bulan Ini</span>
                            <span class="text-sm font-medium text-blue-600">87%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 87%"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-blue-500 cursor-pointer hover:underline" onclick="showUserList()">
                        <i class="fas fa-chart-line mr-2"></i>
                        <span class="text-sm font-medium">Semua Pengguna</span>
                    </div>
                </div>
            </div>
            
            <!-- Returned Items Card -->
            <div class="glass-card rounded-xl shadow-lg overflow-hidden card-hover transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-green-500 opacity-10 rounded-full transform translate-x-20 -translate-y-20"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 576 512">
                                <path d="M248 0L208 0c-26.5 0-48 21.5-48 48l0 112c0 35.3 28.7 64 64 64l128 0c35.3 0 64-28.7 64-64l0-112c0-26.5-21.5-48-48-48L328 0l0 80c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-80z"/>
                        </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Barang Kembali</h2>
                            <p class="text-3xl font-bold text-green-600 mt-1 counter" data-target="20">0</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">Kondisi Baik</span>
                            <span class="text-sm font-medium text-green-600">95%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-600 h-2 rounded-full" style="width: 95%"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-green-500 cursor-pointer hover:underline" onclick="showReturnedItems()">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span class="text-sm font-medium">Riwayat Pengembalian</span>
                    </div>
                </div>
            </div>

            <!-- Unreturned Items Card with new design -->
            <div class="glass-card rounded-xl shadow-lg overflow-hidden card-hover transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-red-500 opacity-10 rounded-full transform translate-x-20 -translate-y-20"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg">
                            <i class="fas fa-exclamation-triangle text-2xl text-white"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Belum Kembali</h2>
                            <p class="text-3xl font-bold text-red-600 mt-1 counter" data-target="5">0</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">Telat Pengembalian</span>
                            <span class="text-sm font-medium text-red-600">3</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-red-600 h-2 rounded-full" style="width: 60%"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-red-500 cursor-pointer hover:underline" onclick="showOverdueItems()">
                        <i class="fas fa-clock mr-2"></i>
                        <span class="text-sm font-medium">Item Telat</span>
                    </div>
                </div>
            </div>

            <!-- Total Items Card with 3D effect -->
            <div class="glass-card rounded-xl shadow-lg overflow-hidden card-hover transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-purple-500 opacity-10 rounded-full transform translate-x-20 -translate-y-20"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg">
                            <i class="fas fa-box text-2xl text-white"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Total Barang</h2>
                            <p class="text-3xl font-bold text-purple-600 mt-1 counter" data-target="{{ $totalbarang }}">0</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">Tersedia</span>
                            <span class="text-sm font-medium text-purple-600">75%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-purple-600 h-2 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-purple-500 cursor-pointer hover:underline" onclick="showInventory()">
                        <i class="fas fa-database mr-2"></i>
                        <span class="text-sm font-medium">Inventaris</span>
                    </div>
                </div>
            </div>

            <!-- Approval Status Card -->
            <div class="glass-card rounded-xl shadow-lg overflow-hidden card-hover transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-yellow-500 opacity-10 rounded-full transform translate-x-20 -translate-y-20"></div>
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl shadow-lg">
                            <i class="fas fa-clipboard-check text-2xl text-white"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">Persetujuan</h2>
                            <p class="text-3xl font-bold text-yellow-600 mt-1 counter" data-target="25">0</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">Dalam Proses</span>
                            <span class="text-sm font-medium text-yellow-600">12</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-yellow-600 h-2 rounded-full" style="width: 48%"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-yellow-500 cursor-pointer hover:underline" onclick="showApprovals()">
                        <i class="fas fa-hourglass-half mr-2"></i>
                        <span class="text-sm font-medium">Tinjau Permintaan</span>
                    </div>
                </div>
            </div>

            <!-- Item Condition Summary Card -->
            <div class="glass-card rounded-xl shadow-lg overflow-hidden card-hover transition-all duration-300 animate__animated animate__fadeIn">
                <div class="p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-indigo-500 opacity-10 rounded-full transform translate-x-20 -translate-y-20"></div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">Kondisi Barang</h2>
                            <div class="mt-4 space-y-2">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                    <span class="text-sm font-medium text-gray-600">Baik: <span class="counter" data-target="{{ $jumlahBarangBaik }}">0</span></span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                                    <span class="text-sm font-medium text-gray-600">Rusak: <span class="counter" data-target="{{ $jumlahBarangRusak }}">0</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl shadow-lg">
                            <i class="fas fa-tasks text-2xl text-white"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-indigo-500 cursor-pointer hover:underline" onclick="showItemConditionReport()">
                        <i class="fas fa-chart-pie mr-2"></i>
                        <span class="text-sm font-medium">Laporan Lengkap</span>
                    </div>
                </div>
            </div>
        </div>
        
     
        
        <!-- Footer - New Feature -->
        <div class="mt-12 text-center text-gray-500 text-sm mb-6">
            <p>© 2025 Sistem Manajemen Inventaris. Semua hak dilindungi.</p>
        </div>
    </div>
</div>

<!-- ParticleJS for background effects -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>

<script>
    // Show notification banner
    setTimeout(() => {
        document.getElementById('notification-banner').classList.remove('hidden');
    }, 1000);
    
    // Close notification
    document.getElementById('close-notification').addEventListener('click', function() {
        document.getElementById('notification-banner').classList.add('hidden');
    });
    
    // Initialize Particles.js
    particlesJS("particles-js", {
        particles: {
            number: { value: 80, density: { enable: true, value_area: 800 } },
            color: { value: "#3b82f6" },
            shape: { type: "circle" },
            opacity: { value: 0.1, random: false },
            size: { value: 3, random: true },
            line_linked: {
                enable: true,
                distance: 150,
                color: "#3b82f6",
                opacity: 0.1,
                width: 1
            },
            move: {
                enable: true,
                speed: 2,
                direction: "none",
                random: false,
                straight: false,
                out_mode: "out",
                bounce: false
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: { enable: true, mode: "grab" },
                onclick: { enable: true, mode: "push" },
                resize: true
            },
            modes: {
                grab: { distance: 140, line_linked: { opacity: 0.3 } },
                push: { particles_nb: 4 }
            }
        },
        retina_detect: true
    });
    
    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    const speed = 200;
    
    counters.forEach(counter => {
        const animate = () => {
            const value = +counter.getAttribute('data-target');
            const data = +counter.innerText;
            const time = value / speed;
            
            if (data < value) {
                counter.innerText = Math.ceil(data + time);
                setTimeout(animate, 1);
            } else {
                counter.innerText = value;
            }
        }
        animate();
    });
    
    // Current Date & Time
    function updateDateTime() {
        const now = new Date();
        const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
        
        document.getElementById('current-date').textContent = now.toLocaleDateString('id-ID', dateOptions);
        document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID', timeOptions);
    }
    
    updateDateTime();
    setInterval(updateDateTime, 1000);
    
    // Refresh button functionality
    document.getElementById('refresh-btn').addEventListener('click', function() {
        // Show spinner
        this.innerHTML = '<i class="fas fa-circle-notch fa-spin text-blue-600"></i><span class="text-gray-700 ml-2">Memuat...</span>';
        
        // Simulate reload after 1 second
        setTimeout(() => {
            location.reload();
        }, 1000);
    });
    
    
    // Settings Button Action
    document.getElementById('settings-btn').addEventListener('click', function() {
        Swal.fire({
            title: 'Pengaturan',
            html: `
                <div class="text-left">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mode Tampilan</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Light Mode</option>
                            <option>Dark Mode</option>
                            <option>System Default</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Notifikasi</label>
                        <div class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded mr-2" checked>
                            <span class="text-sm text-gray-700">Aktivasi notifikasi email</span>
                        </div>
                        <div class="flex items-center mt-2">
                            <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded mr-2" checked>
                            <span class="text-sm text-gray-700">Notifikasi dalam aplikasi</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Bahasa</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Indonesia</option>
                            <option>English</option>
                        </select>
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#3b82f6'
        });
    });
    
 
</script>
@endsection