<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Welcome to Inventaris Barang</title>
</head>
<body class="bg-gray-100 flex flex-col h-screen">
<header class="bg-gray-800 shadow p-4 flex justify-between items-center fixed top-0 left-0 right-0 z-50">
    <div class="flex items-center">
        <img src="{{ asset('assets/img/Logo_Inventaris-removebg-preview.png') }}" alt="Logo" class="h-16 w-16 mr-2"> <!-- Increased logo size here -->
        <h1 class="text-xl font-bold text-white">Inventaris Barang</h1> <!-- Increased font size to text-3xl -->
    </div>
    <div class="hidden sm:flex sm:items-center sm:ms-6 relative">
      <button id="avatarBtn" class="focus:outline-none">
        <div style="font-size: 1.25rem;" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-200 dark:text-gray-400 bg-transparent dark:bg-gray-800">
          {{ Auth::user()->name }} 
          <svg class="w-6 h-10 mt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <polygon points="12,16 6,10 18,10" />
          </svg>
        </div>
      </button>
      <div id="dropdown" 
           class="absolute right-2 mt-32 w-48 bg-white text-gray-800 rounded-lg shadow-lg hidden z-50">
        <a href="{{ url('profile') }}" style="font-size: 1rem;" class="block px-4 py-2 hover:bg-gray-200 rounded-t-lg">Profil</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-dropdown-link :href="route('logout')"
                           style="font-size: 1rem;"  class="block px-4 py-2 hover:bg-gray-200 rounded-b-lg"
                           onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-dropdown-link>
        </form>
      </div>
    </div>    
</header>

<div class="flex">
    <!-- Button to toggle sidebar -->
    
    <aside id="default-sidebar" class="w-64 h-full fixed top-20 transition-all duration-300 bg-gray-50 dark:bg-gray-800" aria-label="Sidebar">
       <div class="h-full px-3 py-4 overflow-y-auto">
       <button id="toggle-sidebar" class=" mb-6 m-1 bg-transparent text-black rounded focus:outline-none text-4xl"> <!-- Increased font size to text-2xl -->
        ☰
      </button>
      <ul class="space-y-2 font-medium">
                 <li>
                    <a href="{{ url('du') }}" class="flex items-center p-2 mb-6 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                       <svg class="flex-shrink-0 w-6 h-6  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                          <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                          <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                       </svg>
                       <span class="ml-3 sidebar-text">Dashboard</span>
                    </a>
                 </li>
                 <li>
                    <a href="{{ url('db') }}" class="flex items-center p-2 mb-6 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                       <svg class="flex-shrink-0 w-6 h-6  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                          <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                       </svg>
                       <span class="ml-3 sidebar-text">Data Barang</span>
                    </a>
                 </li>
                 <li>
                 <a href="{{ url('ru') }}" class="flex items-center mb-6 p-2  text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <svg  class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512">
                  <path d="M320 32c0-9.9-4.5-19.2-12.3-25.2S289.8-1.4 280.2 1l-179.9 45C79 51.3 64 70.5 64 92.5L64 448l-32 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l64 0 192 0 32 0 0-32 0-448zM256 256c0 17.7-10.7 32-24 32s-24-14.3-24-32s10.7-32 24-32s24 14.3 24 32zm96-128l96 0 0 352c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-32 0 0-320c0-35.3-28.7-64-64-64l-96 0 0 64z"/>
               </svg>
                   <span class="ml-3 sidebar-text">Ruangan</span>
                </a>
                 </li>
                 <li>
                    <a href="{{ url('peminjaman') }}" class="flex items-center p-2 mb-6 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                       <svg class="flex-shrink-0 w-6 h-6  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                          <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                       </svg>
                       <span class="ml-3 sidebar-text">Peminjaman</span>
                    </a>
                 </li>
                 <li>
                    <a href="{{ url('ra') }}" class="flex items-center p-2 mb-6 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-6 h-6  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 384 512">
                        <path d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64l0 11c0 42.4 16.9 83.1 46.9 113.1L146.7 256 78.9 323.9C48.9 353.9 32 394.6 32 437l0 11c-17.7 0-32 14.3-32 32s14.3 32 32 32l32 0 256 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-11c0-42.4-16.9-83.1-46.9-113.1L237.3 256l67.9-67.9c30-30 46.9-70.7 46.9-113.1l0-11c17.7 0 32-14.3 32-32s-14.3-32-32-32L320 0 64 0 32 0zM96 75l0-11 192 0 0 11c0 19-5.6 37.4-16 53L112 128c-10.3-15.6-16-34-16-53zm16 309c3.5-5.3 7.6-10.3 12.1-14.9L192 301.3l67.9 67.9c4.6 4.6 8.6 9.6 12.1 14.9L112 384z"/>
                     </svg>
                       <span class="ml-3 sidebar-text">Pending</span>
                    </a>
                 </li>
                 <li>
                     <a href="{{ url('pu') }}" class="flex items-center mb-4 p-2  text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-6 h-6  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                           <path d="M125.7 160l50.3 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L48 224c-17.7 0-32-14.3-32-32L16 64c0-17.7 14.3-32 32-32s32 14.3 32 32l0 51.2L97.6 97.6c87.5-87.5 229.3-87.5 316.8 0s87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3s-163.8-62.5-226.3 0L125.7 160z"/>
                        </svg>
                           <span class="ml-3 sidebar-text">Pengembalian</span>
                     </a>
                  </li>
                 <li>
                    <a href="#" class="flex items-center  p-2 mb-6 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                       <svg class="flex-shrink-0 w-6 h-6  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                       </svg>
                       <span class="ml-3 sidebar-text">Sign In</span>
                    </a>
                 </li>
              </ul>
       </div>
    </aside>
    @yield('content')
</div>

<style>
    /* Style sidebar untuk teks saat sidebar minimalis */
    .minimized .sidebar-text {
        display: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const avatarBtn = document.getElementById('avatarBtn');
        const dropdown = document.getElementById('dropdown');
        const sidebar = document.getElementById('default-sidebar');
        const toggleSidebarBtn = document.getElementById('toggle-sidebar');

        // Toggle dropdown menu
        avatarBtn.addEventListener('click', function () {
            dropdown.classList.toggle('hidden');
        });

        window.addEventListener('click', function (event) {
            if (!avatarBtn.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });

        // Toggle sidebar
        toggleSidebarBtn.addEventListener('click', function () {
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-16');
            sidebar.classList.toggle('minimized');
        });
    });
</script>
</body>
</html>
