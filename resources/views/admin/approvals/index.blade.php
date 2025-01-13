@extends('main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mt-32 mx-auto bg-white rounded-lg shadow-xl p-8 my-10">
        <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">Pending Approvals</h2>
        
        <ul id="pendingList" class="space-y-6">
            @foreach ($pendingApprovals as $index => $entry)
                <li class="flex flex-col md:flex-row items-start justify-between bg-gray-50 border border-gray-300 rounded-md p-6 hover:bg-gray-100 transition duration-200">
                    <!-- Item details -->
                    <span class="text-gray-700 text-lg font-medium mb-4 md:mb-0">
                        {{ "{$entry['name']} - {$entry['mapel']} - {$entry['barangTempat']} - {$entry['jam']} [{$entry['status']}]"}}
                    </span>
                    
                    <!-- Buttons -->
                    <div class="flex space-x-4">
                        <form action="{{ route('approvals.approve', $index) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-600 text-white rounded-lg px-6 py-2 hover:bg-green-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                Approve
                            </button>
                        </form>
                        <form action="{{ route('approvals.reject', $index) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white rounded-lg px-6 py-2 hover:bg-red-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                Reject
                            </button>
                        </form>
                    </div>                    
                </li>
            @endforeach
        </ul>
    </div>
</body>

@endsection
