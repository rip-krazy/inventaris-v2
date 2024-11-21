@extends('main')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow-md p-6 my-10">
        <h2 class="text-2xl font-bold text-gray-800 text-center">Pengembalian Tertunda</h2>

        <!-- Menampilkan pesan sukses atau gagal setelah admin melakukan aksi -->
        @if(session('status'))
            <div class="text-green-500 mt-4 rounded-md">
                {{ session('message') }}
            </div>
        @endif

        <ul id="pengembalianList" class="mt-4 space-y-4">
            @foreach ($pengembalianTertunda as $index => $entry)
                <li class="flex items-center justify-between bg-gray-50 border border-gray-300 rounded-md p-4 transition duration-200 hover:bg-gray-100">
                    <span class="text-gray-700">
                        {{ "{$entry['name']} - {$entry['mapel']} - {$entry['barangTempat']} - {$entry['jam']}"}}
                    </span>

                    <!-- Menampilkan status yang diperbarui -->
                    @if ($entry['status'] == 'Pending')
                        <span class="text-gray-400 m-2">Pending</span>
                    @elseif ($entry['status'] == 'Diterima')
                        <span class="text-green-600 m-2">Diterima</span>
                    @endif

                    <div class="flex space-x-2 m-2">
                        <form action="{{ route('pengembalian.approve', $index) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-600 text-white rounded-md px-8 py-1 hover:bg-green-700 transition duration-150">Setujui</button>
                        </form>
                    </div>                    
                </li>
            @endforeach
        </ul>
    </div>
</body>

@endsection
