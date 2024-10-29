@extends ('home')
@section ('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

   <title>Data Barang</title>

<body class="bg-green-50 p-6">

<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-10 my-10">
        <h1 class="text-2xl font-bold mb-6 text-center">Data Barang</h1>

    <div class="button-container mt-4">
        
        <table class="min-w-full mt-2 bg-white border border-gray-300">
            <thead>
                <tr class="bg-green-200 text-gray-600">
                    <th class="py-4 px-4 border-b text-center">Nama Barang</th>
                    <th class="py-4 px-4 border-b text-center">Kode Barang</th>
                    <th class="py-4 px-4 border-b text-center">Kondisi Barang</th>
                    <th class="py-4 px-4 border-b text-center">Jumlah Barang</th>
                    <th class="py-4 px-4 border-b text-center">Lokasi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-4 border-b text-center">Laptop</td>
                    <td class="py-4 px-4 border-b text-center">LB001</td>
                    <td class="py-4 px-4 border-b text-center">Baik</td>
                    <td class="py-4 px-4 border-b text-center">10</td>
                    <td class="py-4 px-4 border-b text-center">Ruang 101</td>
                </tr>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-4 border-b text-center">Proyektor</td>
                    <td class="py-4 px-4 border-b text-center">PR002</td>
                    <td class="py-4 px-4 border-b text-center">Rusak</td>
                    <td class="py-4 px-4 border-b text-center">5</td>
                    <td class="py-4 px-4 border-b text-center">Ruang 102</td>
                </tr>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-4 border-b text-center">Meja</td>
                    <td class="py-4 px-4 border-b text-center">MJ003</td>
                    <td class="py-4 px-4 border-b text-center">Baik</td>
                    <td class="py-4 px-4 border-b text-center">20</td>
                    <td class="py-4 px-4 border-b text-center">Ruang 103</td>
                </tr>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-4 border-b text-center">Kursi</td>
                    <td class="py-4 px-4 border-b text-center">KR004</td>
                    <td class="py-4 px-4 border-b text-center">Baik</td>
                    <td class="py-4 px-4 border-b text-center">15</td>
                    <td class="py-4 px-4 border-b text-center">Ruang 104</td>
                </tr>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-4 border-b text-center">Whiteboard</td>
                    <td class="py-4 px-4 border-b text-center">WB005</td>
                    <td class="py-4 px-4 border-b text-center">Baik</td>
                    <td class="py-4 px-4 border-b text-center">8</td>
                    <td class="py-4 px-4 border-b text-center">Ruang 105</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-6">
    <a href="{{ url('admin/pengguna') }}" class="px-4 py-2 mx-1 text-white bg-blue-600 rounded-lg hover:bg-blue-700">1</a>
    <a href="{{ url('admin/data?page=2') }}" class="px-4 py-2 mx-1 text-white bg-blue-600 rounded-lg hover:bg-blue-700">2</a>
    <a href="{{ url('admin/data?page=3') }}" class="px-4 py-2 mx-1 text-white bg-blue-600 rounded-lg hover:bg-blue-700">3</a>
    <a href="{{ url('admin/data?page=1') }}" class="px-4 py-2 mx-1 text-white bg-blue-600 rounded-lg hover:bg-blue-700">4</a>
    <a href="{{ url('admin/data?page=2') }}" class="px-4 py-2 mx-1 text-white bg-blue-600 rounded-lg hover:bg-blue-700">5</a>
    <!-- Add more pages as needed -->
</div>
   
</div>
@endsection