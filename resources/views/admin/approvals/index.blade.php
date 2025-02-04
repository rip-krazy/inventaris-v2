@extends('main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<body>
    <div class="w-screen ml-72 mr-10 bg-white rounded-lg shadow-lg p-10 my-10 animate__animated animate__fadeIn">
        <div class="bg-white rounded-xl shadow-md">
            <!-- Header Section -->
            <div class="border-b border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-800 text-center">Pending Approvals</h2>
            </div>

            <!-- List Section -->
            <ul id="pendingList" class="divide-y divide-gray-100">
                @foreach ($pendingApprovals as $index => $entry)
                    <li class="hover:bg-gray-50 transition-all duration-200">
                        <div class="p-5">
                            <div class="flex flex-col md:flex-row justify-between gap-4">
                                <!-- Item Details -->
                                <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <div>
                                        <span class="text-sm text-gray-500">Nama:</span>
                                        <p class="text-gray-900 font-medium">{{ $entry['name'] }}</p>
                                    </div>
                                    <div>
                                        <span class="text-sm text-gray-500">mapel:</span>
                                        <p class="text-gray-900 font-medium">{{ $entry['mapel'] }}</p>
                                    </div>
                                    <div>
                                        <span class="text-sm text-gray-500">Barang atau Tempat:</span>
                                        <p class="text-gray-900 font-medium">{{ $entry['barangTempat'] }}</p>
                                    </div>
                                    <div>
                                        <span class="text-sm text-gray-500">Jam:</span>
                                        <p class="text-gray-900 font-medium">{{ $entry['jam'] }}</p>
                                    </div>
                                </div>

                                <!-- Status and Actions -->
                                <div class="flex flex-col sm:flex-row items-center gap-4">
                                    <!-- Status Badge -->
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        {{ $entry['status'] === 'Pending' ? 'bg-yellow-50 text-yellow-700' : 
                                           ($entry['status'] === 'Approved' ? 'bg-green-50 text-green-700' : 
                                           'bg-red-50 text-red-700') }}">
                                        {{ $entry['status'] }}
                                    </span>

                                    <!-- Action Buttons -->
                                    <div class="flex space-x-3">
                                        <form action="{{ route('approvals.approve', $index) }}" method="POST">
                                            @csrf
                                            <button type="submit" 
                                                class="inline-flex items-center px-4 py-2 bg-green-600 text-sm font-medium text-white 
                                                       rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 
                                                       focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                                                Approve
                                            </button>
                                        </form>
                                        <form action="{{ route('approvals.reject', $index) }}" method="POST">
                                            @csrf
                                            <button type="submit" 
                                                class="inline-flex items-center px-4 py-2 bg-red-600 text-sm font-medium text-white 
                                                       rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 
                                                       focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                                                Reject
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            
            <!-- Empty State -->
            @if(count($pendingApprovals) === 0)
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">No pending approvals</p>
                </div>
            @endif
        </div>
    </div>
</body>

@endsection