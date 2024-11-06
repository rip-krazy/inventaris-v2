@extends ('main')
@section ('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<form id="approve-form" action="{{ url('approvals/index') }}" method="POST" style="display: none;">
    @csrf
</form>
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow-md p-6 my-10">
        <h2 class="text-2xl font-bold text-gray-800 text-center">Pending Approvals</h2>
        <ul id="pendingList" class="mt-4 space-y-4">
            @foreach ($pendingApprovals as $index => $entry)
                <li class="flex items-center justify-between bg-gray-50 border border-gray-300 rounded-md p-4 transition duration-200 hover:bg-gray-100" data-index="{{ $index }}">
                    <span class="text-gray-700">
                        {{ htmlspecialchars("{$entry['name']} - {$entry['mapel']} - {$entry['barangTempat']} - {$entry['jam']} [{$entry['status']}]") }}
                    </span>
                    <div class="flex space-x-2">
                        <button class="approve-btn bg-green-600 text-white rounded-md px-8 py-1 hover:bg-green-700 transition duration-150" data-index="{{ $index }}">Approve</button>
                        <button class="reject-btn bg-red-600 text-white rounded-md px-8 py-1 hover:bg-red-700 transition duration-150" data-index="{{ $index }}">Reject</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Fungsi untuk meng-handle klik tombol approve
    $(document).on('click', '.approve-btn', function() {
    var index = $(this).data('index'); // Ambil index dari data-index
    console.log('Approve button clicked for index:', index); // Debug log
    $('.approve-btn').click(function() {
    alert("Approve button clicked!");
});


    $.ajax({
        url: '{{ url('approvals/approve') }}/' + index,
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            console.log(response); // Log response dari server
            alert(response.message);  // Tampilkan pesan sukses
            $('#pendingList').html(generatePendingList(response.pendingApprovals)); // Update daftar pending
        },
        error: function(xhr, status, error) {
            console.error(error); // Tangani error jika ada
        }
    });
});

    // Fungsi untuk meng-handle klik tombol reject
    $(document).on('click', '.reject-btn', function() {
        var index = $(this).data('index'); // Ambil index dari data-index

        // Kirim request ke server menggunakan Ajax
        $.ajax({
            url: '{{ url('approvals/reject') }}/' + index,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                // Jika berhasil, update tampilan list pending
                alert(response.message);  // Tampilkan pesan gagal
                $('#pendingList').html(generatePendingList(response.pendingApprovals)); // Update daftar pending
            },
            error: function(xhr, status, error) {
                console.error(error); // Tangani error jika ada
            }
        });
    });

    // Fungsi untuk menghasilkan tampilan daftar pending
    function generatePendingList(pendingApprovals) {
        var listHtml = '';
        $.each(pendingApprovals, function(index, entry) {
            listHtml += '<li class="flex items-center justify-between bg-gray-50 border border-gray-300 rounded-md p-4 transition duration-200 hover:bg-gray-100" data-index="' + index + '">' +
                '<span class="text-gray-700">' + entry.name + ' - ' + entry.mapel + ' - ' + entry.barangTempat + ' - ' + entry.jam + ' [' + entry.status + ']</span>' +
                '<div class="flex space-x-2">' +
                '<button class="approve-btn bg-green-600 text-white rounded-md px-8 py-1 hover:bg-green-700 transition duration-150" data-index="' + index + '">Approve</button>' +
                '<button class="reject-btn bg-red-600 text-white rounded-md px-8 py-1 hover:bg-red-700 transition duration-150" data-index="' + index + '">Reject</button>' +
                '</div>' +
                '</li>';
        });
        return listHtml;
    }
</script>

@endsection
