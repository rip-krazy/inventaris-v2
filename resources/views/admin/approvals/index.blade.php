@extends('main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<body class="bg-gray-50">
    <div class="w-100 mt-12 mx-24 animate__animated animate__fadeIn">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-green-400 to-green-500 p-6">
                <h2 class="text-2xl font-bold text-white text-center">
                    <i class="fas fa-clipboard-check mr-2"></i>Pending Approvals
                </h2>
            </div>

            <!-- Requests List -->
            <div class="p-6">
                <ul id="pendingList" class="space-y-4">
                    @foreach ($pendingApprovals as $index => $entry)
                        <li class="bg-gray-50 border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-all duration-200">
                            <div class="p-4">
                                <div class="flex flex-col lg:flex-row justify-between gap-4">
                                    <!-- Request Details -->
                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 flex-1">
                                        <div>
                                            <span class="text-sm text-gray-500">Nama:</span>
                                            <p class="text-gray-800 font-medium">{{ $entry['name'] }}</p>
                                        </div>
                                        <div>
                                            <span class="text-sm text-gray-500">Mapel:</span>
                                            <p class="text-gray-800 font-medium">{{ $entry['mapel'] }}</p>
                                        </div>
                                        <div>
                                            <span class="text-sm text-gray-500">Barang atau Tempat:</span>
                                            <p class="text-gray-800 font-medium">{{ $entry['barangTempat'] }}</p>
                                        </div>
                                        <div>
                                            <span class="text-sm text-gray-500">Jam:</span>
                                            <p class="text-gray-800 font-medium">{{ $entry['jam'] }}</p>
                                        </div>
                                    </div>

                                    <!-- Status Badge -->
                                    <div class="flex items-center justify-end min-w-[100px]">
                                        @if ($entry['status'] == 'Pending')
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-yellow-50 text-yellow-700">
                                                <i class="fas fa-clock mr-2"></i>Pending
                                            </span>
                                        @elseif ($entry['status'] == 'Approved')
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-50 text-green-700">
                                                <i class="fas fa-check mr-2"></i>Approved
                                            </span>
                                        @elseif ($entry['status'] == 'Rejected')
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-red-50 text-red-700">
                                                <i class="fas fa-times mr-2"></i>Rejected
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex space-x-3 mt-4 lg:mt-0">
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
                        </li>
                    @endforeach
                </ul>

                <!-- Empty State -->
                @if(count($pendingApprovals) === 0)
                    <div class="text-center py-12">
                        <i class="fas fa-inbox text-gray-400 text-4xl mb-3"></i>
                        <p class="text-gray-500 text-lg">No pending approvals</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>

@endsection
