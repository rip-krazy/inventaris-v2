@extends('home')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto mt-32 bg-white rounded-lg shadow-md p-6 my-10 animate__animated animate__fadeIn">
        <h2 class="text-2xl font-bold text-gray-800 text-center">Request Approvals</h2>
        
        <!-- Menampilkan pesan sukses atau gagal setelah admin melakukan aksi -->
        @if(session('status'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4">
                {{ session('message') }}
            </div>
        @endif

        <ul id="pendingList" class="mt-4 space-y-4">
            @foreach ($pendingApprovals as $index => $entry)
                <li class="flex items-center justify-between bg-gray-50 border border-gray-300 rounded-md p-4 transition duration-200 hover:bg-gray-100">
                    <span class="text-gray-700">
                        {{ "{$entry['name']} - {$entry['mapel']} - {$entry['barangTempat']} - {$entry['jam']}"}}
                    </span>
                    <!-- Menampilkan status yang diperbarui -->
                    @if ($entry['status'] == 'Pending')
                        <span class="text-gray-400 m-2">Pending</span>
                    @elseif ($entry['status'] == 'Approved')
                        <span class="text-green-600 m-2">Approved</span>
                    @elseif ($entry['status'] == 'Rejected')
                        <span class="text-red-600 m-2">Rejected</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</body>

@endsection
