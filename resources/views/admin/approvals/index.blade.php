@extends('main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<body class="bg-gray-50 font-sans">
    <div class="w-100 mx-24 bg-gradient-to-br from-white to-green-50 rounded-xl shadow-2xl p-10 my-10 animate__animated animate__fadeIn">
        <!-- Header Section -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                <i class="fas fa-clipboard-check text-green-500 mr-2"></i>Persetujuan yang Tertunda
            </h1>
            <p class="text-gray-600">Tinjau dan kelola permintaan yang menunggu</p>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-clock text-white mr-3 text-xl"></i>
                    <h2 class="text-xl font-semibold text-white">Menunggu Persetujuan Anda</h2>
                </div>
                <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm text-white">
                    {{ count($pendingApprovals) }} permintaan
                </span>
            </div>

            <!-- Requests List -->
            <div class="p-6">
                @if(count($pendingApprovals) > 0)
                <div class="space-y-4">
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
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Pelajaran</p>
                                        <p class="text-gray-800 font-medium flex items-center">
                                            <i class="fas fa-book text-blue-500 mr-2 mt-1"></i>
                                            {{ $entry['mapel'] }}
                                        </p>
                                    </div>
                                    <div class="flex flex-col justify-center space-y-1">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            @if (!empty($entry['barangTempat'])) Barang 
                                            @elseif (!empty($entry['ruangTempat'])) Ruang 
                                            @else Lokasi @endif
                                        </p>
                                        <p class="text-gray-800 font-medium flex items-center">
                                            <i class="fas fa-map-marker-alt text-purple-500 mr-2 mt-1"></i>
                                            @if (!empty($entry['barangTempat']))
                                                {{ $entry['barangTempat'] }}
                                            @elseif (!empty($entry['ruangTempat']))
                                                {{ $entry['ruangTempat'] }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                    <div class="flex flex-col justify-center space-y-1">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</p>
                                        <p class="text-gray-800 font-medium flex items-center">
                                            <i class="far fa-clock text-amber-500 mr-2 mt-1"></i>
                                            {{ $entry['jam'] }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex flex-col justify-center space-y-3 lg:w-48">
                                    @if (!empty($entry['catatan']))
                                    <button onclick="openNoteModal(`{{ addslashes($entry['catatan']) }}`)"
                                        class="flex items-center justify-center px-3 py-2 bg-amber-50 border border-amber-100 text-amber-700 text-sm font-medium rounded-lg hover:bg-amber-100 transition">
                                        <i class="fas fa-sticky-note mr-2"></i> Lihat Catatan
                                    </button>
                                    @endif

                                    <div class="flex space-x-2">
                                        <form action="{{ route('approvals.approve', $index) }}" method="POST" class="flex-1">
                                            @csrf
                                            <button type="submit" 
                                                class="approve-btn w-full flex items-center justify-center px-3 py-2 bg-green-600 text-sm font-medium text-white 
                                                       rounded-lg hover:bg-green-700 transition shadow-sm"
                                                data-id="{{ $index }}">
                                                <i class="fas fa-check-circle mr-2"></i> Approve
                                            </button>
                                        </form>

                                        <button type="button" data-id="{{ $index }}" 
                                            class="reject-btn flex-1 flex items-center justify-center px-3 py-2 bg-red-50 border border-red-100 text-red-600 text-sm font-medium 
                                                   rounded-lg hover:bg-red-100 transition">
                                            <i class="fas fa-times-circle mr-2"></i> Reject
                                        </button>
                                    </div>
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
                    <h3 class="text-lg font-medium text-gray-700 mb-1">Tidak ada permintaan tertunda</h3>
                    <p class="text-gray-500">Semua permintaan telah diproses</p>
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
                        <i class="fas fa-sticky-note text-amber-500 mr-2"></i> Catatan Permintaan
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
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Rejection Modal -->
    <div id="rejectModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md transform transition-all">
            <form id="rejectForm" method="POST">
                @csrf
                <input type="hidden" name="reject_index" id="reject_index">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">
                            <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i> Tolak Permintaan
                        </h3>
                        <button type="button" onclick="closeRejectModal()" class="text-gray-400 hover:text-gray-500">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="mb-4">
                        <label for="reject_reason" class="block text-sm font-medium text-gray-700 mb-2">
                            Alasan penolakan <span class="text-red-500">*</span>
                        </label>
                        <textarea name="alasan" id="reject_reason" rows="4" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" 
                                  required></textarea>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeRejectModal()" 
                                class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">
                            Batal
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition flex items-center">
                            <i class="fas fa-ban mr-2"></i> Konfirmasi Penolakan
                        </button>
                    </div>
                </div>
            </form>
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

        function closeRejectModal() {
            document.getElementById('rejectModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Handle reject button
            document.querySelectorAll('.reject-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const index = this.getAttribute('data-id');
                    document.getElementById('reject_index').value = index;
                    document.getElementById('rejectForm').action = "{{ route('approvals.reject', '') }}/" + index;
                    document.getElementById('rejectModal').classList.remove('hidden');
                    document.body.classList.add('overflow-hidden');
                });
            });

            // Add animation before approve
            document.querySelectorAll('.approve-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('.approve-btn');
                    if (button) {
                        const id = button.getAttribute('data-id');
                        const item = document.getElementById(`approval-${id}`);
                        if (item) {
                            e.preventDefault();
                            item.classList.add('animate__fadeOut');
                            setTimeout(() => this.submit(), 300);
                        }
                    }
                });
            });
        });
    </script>
</body>

@endsection