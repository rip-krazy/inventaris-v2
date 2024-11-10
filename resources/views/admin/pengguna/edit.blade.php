@extends('main')

@section('content')
<body class="bg-gray-100 p-10">
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Pengguna</h1>
    <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-2">Nama</label>
            <input type="text" name="name" value="{{ $pengguna->name }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-2">Username</label>
            <input type="text" name="username" value="{{ $pengguna->username }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-2">Password</label>
            <input type="text" name="password" class="w-full border rounded p-2" required>
        </div>        
        <div class="mb-4">
            <label class="block mb-2">Mapel</label>
            <input type="text" name="mapel" value="{{ $pengguna->mapel }}" class="w-full border rounded p-2" required>
        </div>
        <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Update</button>
    </form>
</div>
</body>
@endsection
