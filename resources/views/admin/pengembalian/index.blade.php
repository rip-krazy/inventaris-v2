@extends('main')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<body class="bg-gray-100 p-6">
    <div class="w-6xl mx-auto bg-white rounded-lg shadow-md p-6 my-10">
        <h2 class="text-2xl font-bold text-gray-800 text-center">Pengembalian Tertunda</h2>

        <!-- Menampilkan pesan sukses atau gagal setelah admin melakukan aksi -->
        @if(session('status'))
            <div class="text-green-500 mt-4 rounded-md">
                {{ session('message') }}
            </div>
        @endif

        <ul id="pengembalianList" class="mt-4 space-y-4">
            @foreach ($pengembalianTertunda as $index => $entry)
            <li>
                <span>{{ $entry['name'] ?? 'Nama tidak tersedia' }}</span>
                <span>{{ $entry['mapel'] ?? 'Mapel tidak tersedia' }}</span>
                <span>{{ $entry['barangTempat'] ?? 'Barang/Tempat tidak tersedia' }}</span>

        @if ($entry['status'] == 'Pending')
                        <span class="text-gray-400 m-2">Pending</span>
                    @elseif ($entry['status'] == 'Diterima')
                        <span class="text-green-600 m-2">Diterima</span>
                    @endif

        <form action="{{ route('pengembalian.approve', $index) }}" method="POST">
            @csrf
            <button type="submit">Setujui</button>
        </form>
    </li>
@endforeach

        </ul>
    </div>
</body>

@endsection
