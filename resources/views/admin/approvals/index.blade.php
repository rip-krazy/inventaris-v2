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
        <h2 class="text-2xl font-bold text-gray-800 text-center">Pending Approvals</h2>
        <ul id="pendingList" class="mt-4 space-y-4">
            @foreach ($pendingApprovals as $index => $entry)
                <li class="flex items-center justify-between bg-gray-50 border border-gray-300 rounded-md p-4 transition duration-200 hover:bg-gray-100">
                    <span class="text-gray-700">
                        {{ "{$entry['name']} - {$entry['mapel']} - {$entry['barangTempat']} - {$entry['jam']} [{$entry['status']}]"}}
                    </span>
                    <div class="flex space-x-2 m-2">
                        <form action="{{ route('approvals.approve', $index) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-600 text-white rounded-md px-8 py-1 hover:bg-green-700 transition duration-150">Approve</button>
                        </form>
                        <form action="{{ route('approvals.reject', $index) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white rounded-md px-8 py-1 hover:bg-red-700 transition duration-150">Reject</button>
                        </form>
                    </div>                    
                </li>
            @endforeach
        </ul>
    </div>
</body>

@endsection
