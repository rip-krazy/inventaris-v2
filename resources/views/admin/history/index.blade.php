@extends('main')

@section('content')

<div class="w-screen mt-24 ml-72 mr-10 bg-white rounded-lg shadow-lg p-10 my-10 animate__animated animate__fadeIn">
    <!-- Title -->
    <h2 class="text-center text-4xl font-extrabold text-green-600 mb-10" style="color: #16a34a;">Riwayat Pengembalian</h2>

    <!-- Table Container -->
    <div class="overflow-hidden bg-white shadow-xl rounded-lg">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-green-700 text-white">
                <tr>
                    <th class="px-6 py-4 text-left font-semibold">No</th>
                    <th class="px-6 py-4 text-left font-semibold">Nama User</th>
                    <th class="px-6 py-4 text-left font-semibold">Tanggal Pengembalian</th>
                    <th class="px-6 py-4 text-left font-semibold">Nama Barang/Tempat</th>
                    <th class="px-6 py-4 text-left font-semibold">Mapel</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($pengembalianHistory as $index => $entry)
                <tr class="bg-gray-50 hover:bg-green-100 transition duration-150">
                    <td class="px-6 py-4 text-center">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">{{ $entry['name'] }}</td>
                    <td class="px-6 py-4">{{ $entry['tanggal_pengembalian'] }}</td>
                    <td class="px-6 py-4">{{ $entry['barangTempat'] }}</td>
                    <td class="px-6 py-4">{{ $entry['mapel'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
