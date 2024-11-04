@extends ('home')
@section ('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<body class="bg-gray-100 p-6">
    <h1 class="text-xl font-bold mb-4">User Input Form</h1>
    <form action="{{ route('peminjaman.submit') }}" method="POST" class="mb-4">
        @csrf
        <input type="text" name="nama" placeholder="Nama" required class="border p-2 mr-2" />
        <input type="text" name="mapel" placeholder="Mapel" required class="border p-2 mr-2" />
        <input type="text" name="barangtempat" placeholder="Barang Tempat" required class="border p-2 mr-2" />
        <input type="time" name="jam" placeholder="Jam" required class="border p-2 mr-2" />
        <button type="submit" class="bg-blue-600 text-white rounded-md px-4 py-2">Submit</button>
    </form>
</body>




@endsection