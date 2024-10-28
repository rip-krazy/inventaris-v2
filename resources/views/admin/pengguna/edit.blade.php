@extends('main')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Pengguna</h1>
    <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ $pengguna->name }}" class="border rounded w-full p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Username</label>
            <input type="text" name="username" value="{{ $pengguna->username }}" class="border rounded w-full p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Mapel</label>
            <input type="text" name="mapel" value="{{ $pengguna->mapel }}" class="border rounded w-full p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Foto</label>
            <input type="file" name="photo" class="border rounded w-full p-2">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
