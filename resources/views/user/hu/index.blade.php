@extends('home')

@section('content')
    <div class="container mx-14 my-5 px-6 mt-32">
        <!-- Tittle -->
        <h2 class="text-center text-3xl font-bold text-green-600 mb-8">History Transaksi</h2>

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nama Transaksi</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Jumlah</th>
                        <th class="px-4 py-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-100">
                    <!-- Example Row 1 -->
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">1</td>
                        <td class="px-4 py-2">Pembelian Barang</td>
                        <td class="px-4 py-2">2025-02-01</td>
                        <td class="px-4 py-2">Rp 500,000</td>
                        <td class="px-4 py-2">Sukses</td>
                    </tr>
                    <!-- Example Row 2 -->
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">2</td>
                        <td class="px-4 py-2">Pembayaran Listrik</td>
                        <td class="px-4 py-2">2025-02-02</td>
                        <td class="px-4 py-2">Rp 150,000</td>
                        <td class="px-4 py-2">Sukses</td>
                    </tr>
                    <!-- Example Row 3 -->
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">3</td>
                        <td class="px-4 py-2">Transfer Uang</td>
                        <td class="px-4 py-2">2025-02-03</td>
                        <td class="px-4 py-2">Rp 1,000,000</td>
                        <td class="px-4 py-2">Pending</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Optional Pagination -->
        <div class="mt-4 text-center">
            <!-- Pagination Placeholder -->
            <nav class="inline-flex mt-4">
                <a href="#" class="px-4 py-2 border bg-gray-800 text-white rounded-l-md">Previous</a>
                <a href="#" class="px-4 py-2 border bg-gray-800 text-white">1</a>
                <a href="#" class="px-4 py-2 border bg-gray-800 text-white">2</a>
                <a href="#" class="px-4 py-2 border bg-gray-800 text-white rounded-r-md">Next</a>
            </nav>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        body {
            background-color: #111827;
        }
    </style>
@endsection
