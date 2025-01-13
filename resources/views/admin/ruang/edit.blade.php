@extends('main')

@section('content')
<div class="max-w-4xl mx-auto mt-32 bg-white rounded-lg shadow-2xl p-8 mb-6">
    <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-8">Edit Data Ruang</h1>

    <div class="text-center mb-8">
        <p class="text-lg text-gray-600">Gunakan form di bawah ini untuk mengubah data ruang yang ada.</p>
    </div>

    <form action="{{ route('ruang.update', $ruang) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Ruangan -->
        <div class="mb-6">
            <label for="name" class="block text-gray-700 text-lg font-semibold mb-2">Nama Ruangan</label>
            <input type="text" name="name" id="name" class="border-2 border-gray-300 rounded-lg w-full p-3 focus:ring-2 focus:ring-blue-500" value="{{ $ruang->name }}" required>
        </div>

        <!-- Keterangan Ruangan -->
        <div class="mb-6">
            <label for="description" class="block text-gray-700 text-lg font-semibold mb-2">Keterangan</label>
            <input type="text" name="description" id="description" class="border-2 border-gray-300 rounded-lg w-full p-3 focus:ring-2 focus:ring-blue-500" value="{{ $ruang->description }}">
        </div>

        <!-- Update Button -->
        <div class="flex justify-center mt-6">
            <button type="submit" class="bg-blue-600 text-white text-lg px-6 py-3 rounded-full hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out transform hover:scale-105">
                Update Data Ruang
            </button>
        </div>
    </form>

    <!-- Optional Success Message -->
    @if(session('success'))
        <div class="mt-4 text-center text-green-600 text-lg font-semibold">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection
