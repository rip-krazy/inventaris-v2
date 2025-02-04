<<<<<<< HEAD
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

        <!-- Pagination Navigation -->
        <div class="mt-8 flex justify-center space-x-2">
            <a href="#" class="px-4 py-2 bg-green-700 text-white rounded-md hover:bg-green-800 transition">Previous</a>
            <a href="#" class="px-4 py-2 bg-green-700 text-white rounded-md hover:bg-green-800 transition">1</a>
            <a href="#" class="px-4 py-2 bg-green-700 text-white rounded-md hover:bg-green-800 transition">2</a>
            <a href="#" class="px-4 py-2 bg-green-700 text-white rounded-md hover:bg-green-800 transition">Next</a>
        </div>
    </div>
@endsection
=======
>>>>>>> bec86c75a121267f0745348da76428b4af7a7d6a
