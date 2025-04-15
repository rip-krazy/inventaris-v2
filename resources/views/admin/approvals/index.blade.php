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
                        <li id="approval-{{ $index }}" class="approval-item bg-gray-50 border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-all duration-200">
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
                                            <span class="text-sm text-gray-500">Barang/Tempat:</span>
                                            <p class="text-gray-800 font-medium">
                                                @if (!empty($entry['barangTempat']))
                                                   {{ $entry['barangTempat'] }}
                                                @elseif (!empty($entry['ruangTempat']))
                                                    {{ $entry['ruangTempat'] }}
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </div>
                                        <div>
                                            <span class="text-sm text-gray-500">Jam:</span>
                                            <p class="text-gray-800 font-medium">{{ $entry['jam'] }}</p>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex space-x-3 mt-4 lg:mt-0">
                                        <form action="{{ route('approvals.approve', $index) }}" method="POST" class="approve-form">
                                            @csrf
                                            <button type="submit" 
                                                class="approve-btn inline-flex items-center px-4 py-2 bg-green-600 text-sm font-medium text-white 
                                                       rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 
                                                       focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200"
                                                data-id="{{ $index }}">
                                                Approve
                                            </button>
                                        </form>
                                        <form action="{{ route('approvals.reject', $index) }}" method="POST" class="reject-form">
                                            @csrf
                                            <button type="submit" 
                                                class="reject-btn inline-flex items-center px-4 py-2 bg-red-600 text-sm font-medium text-white 
                                                       rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 
                                                       focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200"
                                                data-id="{{ $index }}">
                                                Reject
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Modal Rejection -->
<div id="rejectModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-bold mb-4">Masukkan Alasan Penolakan</h2>
        <form id="rejectForm" method="POST">
            @csrf
            <input type="hidden" name="reject_index" id="reject_index">
            <textarea name="alasan" id="reject_reason" rows="3" class="w-full p-2 border rounded-md" required></textarea>
            <div class="flex justify-end mt-4">
                <button type="button" class="bg-gray-300 px-4 py-2 rounded-lg mr-2" onclick="closeModal()">Batal</button>
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg">Tolak</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".reject-btn").forEach(button => {
            button.addEventListener("click", function (event) {
                event.preventDefault();
                let index = this.getAttribute("data-id");
                document.getElementById("reject_index").value = index;
                document.getElementById("rejectModal").classList.remove("hidden");
                document.getElementById("rejectForm").action = "{{ route('approvals.reject', '') }}/" + index;
            });
        });
    });

    function closeModal() {
        document.getElementById("rejectModal").classList.add("hidden");
    }
</script>

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

    <!-- JavaScript for Auto Hide Effect -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".approve-btn, .reject-btn").forEach(button => {
                button.addEventListener("click", function (event) {
                    event.preventDefault(); // Prevent default form submission

                    let listItem = document.getElementById("approval-" + this.getAttribute("data-id"));
                    if (listItem) {
                        listItem.classList.add("animate__animated", "animate__fadeOut"); // Apply fade-out animation
                        
                        setTimeout(() => {
                            listItem.remove(); // Remove the element after animation completes
                        }, 1000; // 1 seconds delay
                    }

                    // Submit the form after 10 second to update Laravel session
                    setTimeout(() => {
                        this.closest("form").submit();
                    }, 10000);
                });
            });
        });
    </script>

</body>

@endsection
