@extends('main')

@section('content')
<body class="bg-gray-100 p-10">
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Tambah Pengguna</h1>
    <form action="{{ route('pengguna.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block mb-2">Nama</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-2">Username</label>
            <input type="text" name="username" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-2">Password</label>
            <input type="password" name="password" class="w-full border rounded p-2" required>
        </div>        
        <div class="mb-4">
            <label class="block mb-2">Mapel</label>
            <input type="text" name="mapel" class="w-full border rounded p-2" required>
        </div>
        <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Simpan</button>
    </form>
</div>
</body>
@endsection
