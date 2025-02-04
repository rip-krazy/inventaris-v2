@extends('main')

@section('content')

<<<<<<< HEAD
<div class="w-screen mt-24 ml-72 mr-10 bg-white rounded-lg shadow-lg p-10 my-10 animate__animated animate__fadeIn">
    <!-- Title -->
    <h2 class="text-center text-4xl font-extrabold text-green-600 mb-10" style="color: #16a34a;">Riwayat Pengembalian</h2>
=======
        <!-- Table Container -->
        <div class="overflow-hidden bg-white shadow-xl rounded-lg">
            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-green-700 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold">No</th>
                        <th class="px-6 py-4 text-left font-semibold">Nama Transaksi</th>
                        <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                        <th class="px-6 py-4 text-left font-semibold">Jumlah</th>
                        <th class="px-6 py-4 text-left font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Example Row 1 -->
                    <tr class="bg-gray-50 hover:bg-green-100 transition duration-150">
                        <td class="px-6 py-4 text-center">1</td>
                        <td class="px-6 py-4">Pembelian Barang</td>
                        <td class="px-6 py-4">2025-02-01</td>
                        <td class="px-6 py-4">Rp 500,000</td>
                        <td class="px-6 py-4 text-green-600 font-bold">Sukses</td>
                    </tr>
                    <!-- Example Row 2 -->
                    <tr class="bg-white hover:bg-green-100 transition duration-150">
                        <td class="px-6 py-4 text-center">2</td>
                        <td class="px-6 py-4">Pembayaran Listrik</td>
                        <td class="px-6 py-4">2025-02-02</td>
                        <td class="px-6 py-4">Rp 150,000</td>
                        <td class="px-6 py-4 text-green-600 font-bold">Sukses</td>
                    </tr>
                    <!-- Example Row 3 -->
                    <tr class="bg-gray-50 hover:bg-green-100 transition duration-150">
                        <td class="px-6 py-4 text-center">3</td>
                        <td class="px-6 py-4">Transfer Uang</td>
                        <td class="px-6 py-4">2025-02-03</td>
                        <td class="px-6 py-4">Rp 1,000,000</td>
                        <td class="px-6 py-4 text-yellow-600 font-bold">Pending</td>
                    </tr>
                </tbody>
            </table>
        </div>
>>>>>>> 9851e828a1bcf70731158d2f6be278dcb6d64e4e

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
