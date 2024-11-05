@extends('main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<title>Detail Barang di Ruang {{ $ruang->name }}</title>

<div class="max-w-6xl mx-auto bg-white rounded-lg shadow-lg p-10 my-10">
    <h1 class="text-2xl font-bold mb-6 text-center">Detail Barang di Ruang {{ $ruang->name }}</h1>

    @if($barangs->isEmpty())
        <p class="text-center text-gray-600">Tidak ada barang di ruangan ini.</p>
    @else
        <table class="min-w-full mt-2 bg-white border border-gray-300">
            <thead>
                <tr class="bg-green-200 text-gray-600">
                    <th class="py-4 px-6 border-b text-center">Nama Barang</th>
                    <th class="py-4 px-6 border-b text-center">Kode Barang</th>
                    <th class="py-4 px-6 border-b text-center">Kondisi Barang</th>
                    <th class="py-4 px-6 border-b text-center">Jumlah Barang</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $barang)
                    <tr class="hover:bg-green-100">
                        <td class="py-4 px-8 border-b text-center">{{ $barang->nama_barang }}</td>
                        <td class="py-4 px-8 border-b text-center">{{ $barang->kode_barang }}</td>
                        <td class="py-4 px-8 border-b text-center">{{ $barang->kondisi_barang }}</td>
                        <td class="py-4 px-8 border-b text-center">{{ $barang->jumlah_barang }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif


    <div class="mt-6">
        <a href="{{ route('ruang.index') }}" class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Kembali</a>
    </div>
</div>

@endsection
