@extends('main')

@section('content')
<div class="max-w-6xl mt-32 mx-auto bg-white rounded-lg shadow-lg p-10 my-10">
    <h1 class="text-2xl font-bold mb-6 text-center">Edit Data Ruang</h1>

    <form action="{{ route('ruang.update', $ruang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nama Ruangan</label>
            <input type="text" name="name" id="name" class="border rounded-lg w-full p-2" value="{{ $ruang->name }}" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Keterangan</label>
            <input type="text" name="description" id="description" class="border rounded-lg w-full p-2" value="{{ $ruang->description }}">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Update</button>
    </form>
</div>
@endsection
