@extends('home')

@section('content')
<div class="w-screen mt-32 ml-72 mr-10 bg-white rounded-lg shadow-lg p-10 my-10 animate__animated animate__fadeIn">
    <!-- Title -->
    <h2 class="text-center text-4xl font-extrabold text-green-600 mb-10" style="color: #16a34a;">Riwayat Transaksi</h2>

    <!-- Table Container -->
    <div class="overflow-hidden bg-white shadow-xl rounded-lg">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-green-700 text-white">
                <tr>
                    <th class="px-6 py-4 text-left font-semibold">No</th>
                    <th class="px-6 py-4 text-left font-semibold">Nama Transaksi</th>
                    <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                    <th class="px-6 py-4 text-left font-semibold">mapel</th>
                    <th class="px-6 py-4 text-left font-semibold">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($pengembalianHistory as $index => $history)
                    <tr class="{{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-green-100 transition duration-150">
                        <td class="px-6 py-4 text-center">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $history['name'] }}</td>
                        <td class="px-6 py-4">{{ $history['tanggal_pengembalian'] }}</td>
                        <td class="px-6 py-4">{{ $history['mapel'] }}</td> <!-- Replace this with your amount column if needed -->
                        <td class="px-6 py-4 text-green-600 font-bold">Sukses</td> <!-- Replace this as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
