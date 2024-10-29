@extends ('home')
@section ('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<title>Daftar Ruangan</title>
</head>
<body class="bg-green-50 p-6">

    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-10 my-10">
        <h1 class="text-2xl font-bold mb-6 text-center">Daftar Ruangan Sekolah</h1>

        <div class="button-container mt-4">
        
        <table class="min-w-full mt-2 bg-white border border-gray-300">
            <thead>
                <tr class="bg-green-200 text-gray-600">
                    <th class="py-4 px-20 border-b text-center">No</th>
                    <th class="py-4 px-20 border-b text-center">Nama Ruangan</th>
                    <th class="py-4 px-20 border-b text-center">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-20 border-b text-center">1</td>
                    <td class="py-4 px-20 border-b text-center">Lab PPLG</td>
                    <td class="py-4 px-20 border-b text-center">Isi</td>
                </tr>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-20 border-b text-center">2</td>
                    <td class="py-4 px-20 border-b text-center">Lab TJKT</td>
                    <td class="py-4 px-20 border-b text-center">Isi</td>
                </tr>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-20 border-b text-center">3</td>
                    <td class="py-4 px-20 border-b text-center">Lab AN</td>
                    <td class="py-4 px-20 border-b text-center">isi</td>
                </tr>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-20 border-b text-center">4</td>
                    <td class="py-4 px-20 border-b text-center">Lab BR</td>
                    <td class="py-4 px-20 border-b text-center">Kosong</td>
                </tr>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-20 border-b text-center">5</td>
                    <td class="py-4 px-20 border-b text-center">Lab LPS</td>
                    <td class="py-4 px-20 border-b text-center">isi</td>
                </tr>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-20 border-b text-center">6</td>
                    <td class="py-4 px-20 border-b text-center">Lab DPB</td>
                    <td class="py-4 px-20 border-b text-center">isi</td>
                </tr>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-20 border-b text-center">7</td>
                    <td class="py-4 px-20 border-b text-center">Lab MP</td>
                    <td class="py-4 px-20 border-b text-center">Kosong</td>
                </tr>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-20 border-b text-center">8</td>
                    <td class="py-4 px-20 border-b text-center">P5</td>
                    <td class="py-4 px-20 border-b text-center">Kosong</td>
                </tr>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-20 border-b text-center">9</td>
                    <td class="py-4 px-20 border-b text-center">Perpustakaan</td>
                    <td class="py-4 px-20 border-b text-center">Kosong</td>
                </tr>
                <tr class="hover:bg-green-100">
                    <td class="py-4 px-20 border-b text-center">10</td>
                    <td class="py-4 px-20 border-b text-center">Lab Fiber Optik</td>
                    <td class="py-4 px-20 border-b text-center">isi</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>


@endsection
