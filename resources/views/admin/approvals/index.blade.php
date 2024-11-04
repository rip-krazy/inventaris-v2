@extends ('main')
@section ('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<body class="p-6">
    

    <h2 class="text-lg font-bold">Pending Approvals</h2>
    <ul id="pendingList" class="mt-4">
        @foreach ($pendingApprovals as $index => $entry)
            <li class="flex items-center justify-between border-b border-gray-300 py-2">
                {{ htmlspecialchars("{$entry['name']} - {$entry['mapel']} - {$entry['barangTempat']} - {$entry['jam']} [{$entry['status']}]") }}
                <div>
                    <a href="{{ route('approvals.approve', $index) }}" class="ml-2 bg-green-600 text-white rounded-md px-2 py-1 hover:bg-green-700">Approve</a>
                    <a href="{{ route('approvals.reject', $index) }}" class="ml-2 bg-red-600 text-white rounded-md px-2 py-1 hover:bg-red-700">Reject</a>
                </div>
            </li>
        @endforeach
    </ul>
</body>

@endsection