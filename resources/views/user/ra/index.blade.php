@extends('home')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<body class="bg-gray-50 font-sans">
    <div class="w-100 mx-24 bg-gradient-to-br from-white to-green-50 rounded-xl shadow-2xl p-10 my-10 animate__animated animate__fadeIn">
        <!-- Header Section -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                <i class="fas fa-clipboard-check text-green-500 mr-2"></i>Request Approvals
            </h1>
            <p class="text-gray-600">Review and manage your pending requests</p>
        </div>

        <!-- Notification Section -->
        @if(session('status'))
            <div class="mb-6">
                <div class="bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-lg flex items-center justify-center animate__animated animate__fadeIn">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('message') }}
                </div>
            </div>
        @endif

        <!-- Main Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-clipboard-list text-white mr-3 text-xl"></i>
                    <h2 class="text-xl font-semibold text-white">Your Approval Requests</h2>
                </div>
                <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm text-white">
                    {{ count($pendingApprovals) }} requests
                </span>
            </div>

            <!-- Requests List -->
            <div class="p-6">
                @if(count($pendingApprovals) > 0)
                <div class="space-y-4" id="pendingList">
                    @foreach ($pendingApprovals as $index => $entry)
                    <div id="approval-{{ $index }}" class="bg-white border border-gray-200 rounded-lg hover:shadow-md transition-all duration-300 ease-in-out">
                        <div class="p-5 h-full">
                            <div class="flex flex-col lg:flex-row gap-6 h-full">
                                <!-- Request Details -->
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 flex-grow">
                                    <div class="flex flex-col justify-center space-y-1">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</p>
                                        <p class="text-gray-800 font-medium flex items-center">
                                            <i class="fas fa-user-circle text-green-500 mr-2 mt-1"></i>
                                            {{ $entry['name'] }}
                                        </p>
                                    </div>
                                    <div class="flex flex-col justify-center space-y-1">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Mapel</p>
                                        <p class="text-gray-800 font-medium flex items-center">
                                            <i class="fas fa-book text-blue-500 mr-2 mt-1"></i>
                                            {{ $entry['mapel'] }}
                                        </p>
                                    </div>
                                    <div class="flex flex-col justify-center space-y-1">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            @if (!empty($entry['barangTempat']) && $entry['barangTempat'] !== "Barang Tidak Ditemukan") Barang 
                                            @elseif (!empty($entry['ruangTempat']) && $entry['ruangTempat'] !== "Ruang Tidak Ditemukan") Ruang 
                                            @else Lokasi @endif
                                        </p>
                                        <p class="text-gray-800 font-medium flex items-center">
                                            <i class="fas fa-map-marker-alt text-purple-500 mr-2 mt-1"></i>
                                            @if (!empty($entry['barangTempat']) && $entry['barangTempat'] !== "Barang Tidak Ditemukan")
                                                {{ $entry['barangTempat'] }}
                                            @elseif (!empty($entry['ruangTempat']) && $entry['ruangTempat'] !== "Ruang Tidak Ditemukan")
                                                {{ $entry['ruangTempat'] }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                    <div class="flex flex-col justify-center space-y-1">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Jam</p>
                                        <p class="text-gray-800 font-medium flex items-center">
                                            <i class="far fa-clock text-amber-500 mr-2 mt-1"></i>
                                            {{ $entry['jam'] }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Status Badge -->
                                <div class="flex flex-col justify-center space-y-3 lg:w-48">
                                    @if ($entry['status'] == 'Pending')
                                        <span class="inline-flex items-center justify-center px-4 py-2 rounded-full text-sm font-medium bg-yellow-50 text-yellow-700">
                                            <i class="fas fa-clock mr-2"></i>Pending
                                        </span>
                                    @elseif ($entry['status'] == 'Approved')
                                        <span class="inline-flex items-center justify-center px-4 py-2 rounded-full text-sm font-medium bg-green-50 text-green-700">
                                            <i class="fas fa-check-circle mr-2"></i>Approved
                                        </span>
                                    @elseif ($entry['status'] == 'Rejected')
                                        <span class="inline-flex items-center justify-center px-4 py-2 rounded-full text-sm font-medium bg-red-50 text-red-700">
                                            <i class="fas fa-times-circle mr-2"></i>Rejected
                                        </span>
                                        @if (!empty($entry['alasan']))
                                        <button onclick="openReasonModal(`{{ addslashes($entry['alasan']) }}`)"
                                            class="flex items-center justify-center px-3 py-2 bg-red-50 border border-red-100 text-red-600 text-sm font-medium rounded-lg hover:bg-red-100 transition">
                                            <i class="fas fa-sticky-note mr-2"></i> Lihat Alasan
                                        </button>
                                        @endif
                                    @endif

                                    @if (!empty($entry['catatan']))
                                    <button onclick="openNoteModal(`{{ addslashes($entry['catatan']) }}`)"
                                        class="flex items-center justify-center px-3 py-2 bg-amber-50 border border-amber-100 text-amber-700 text-sm font-medium rounded-lg hover:bg-amber-100 transition">
                                        <i class="fas fa-sticky-note mr-2"></i> Lihat Catatan
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <!-- Empty State -->
                <div class="text-center py-12">
                    <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-inbox text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-700 mb-1">No requests found</h3>
                    <p class="text-gray-500">You don't have any approval requests yet</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Note Modal -->
    <div id="noteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md transform transition-all">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">
                        <i class="fas fa-sticky-note text-amber-500 mr-2"></i> Request Notes
                    </h3>
                    <button onclick="closeNoteModal()" class="text-gray-400 hover:text-gray-500">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p id="noteText" class="text-gray-700 whitespace-pre-line"></p>
                </div>
                <div class="mt-6 flex justify-end">
                    <button onclick="closeNoteModal()" 
                            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Reason Modal -->
    <div id="reasonModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md transform transition-all">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">
                        <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i> Rejection Reason
                    </h3>
                    <button onclick="closeReasonModal()" class="text-gray-400 hover:text-gray-500">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p id="reasonText" class="text-gray-700 whitespace-pre-line"></p>
                </div>
                <div class="mt-6 flex justify-end">
                    <button onclick="closeReasonModal()" 
                            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function openNoteModal(note) {
            document.getElementById('noteText').innerText = note;
            document.getElementById('noteModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeNoteModal() {
            document.getElementById('noteModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        function openReasonModal(reason) {
            document.getElementById('reasonText').innerText = reason;
            document.getElementById('reasonModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeReasonModal() {
            document.getElementById('reasonModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Add animation to status changes if needed
            const animateStatusChange = (element) => {
                element.classList.add('animate__animated', 'animate__pulse');
                setTimeout(() => {
                    element.classList.remove('animate__animated', 'animate__pulse');
                }, 1000);
            };

            // Optional: Add animations or interactivity for the list items
            document.querySelectorAll('#pendingList > div').forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.classList.add('shadow-md');
                });
                
                item.addEventListener('mouseleave', function() {
                    this.classList.remove('shadow-md');
                });
            });
        });
    </script>
</body>

@endsection