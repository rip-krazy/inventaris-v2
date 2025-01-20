@extends('home')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">


<body class="bg-gray-100 p-6">
    <div class="w-full mt-32 ml-72 mr-24 bg-white rounded-lg shadow-md p-6 mt-10 mb-10 sm:px-6 animate__animated animate__fadeIn">
        <h1 class="text-2xl font-bold text-center mb-6 text-gray-700">User Input Form</h1>

        <!-- Notification Section -->
        @if(session('notification'))
            <div class="bg-green-500 text-white p-4 rounded mb-6 text-center">
                {{ session('notification') }}
            </div>
        @endif

        <form action="{{ route('peminjaman.submit') }}" method="POST">
            @csrf
            <div class="mb-12">
                <input type="text" name="nama" placeholder="Nama" required class="border border-gray-300 rounded-lg p-4 px-60 w-full text-left focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <div class="mb-12">
                <input type="text" name="mapel" placeholder="Mapel" required class="border border-gray-300 rounded-lg p-4 px-60 w-full text-center  focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <div class="mb-12">
                <input type="text" name="barangtempat" placeholder="Barang Tempat" required class="border border-gray-300 rounded-lg p-4 px-60 w-full text-center  focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <div class="mb-12">
                <input type="time" name="jam" required class="border border-gray-300 rounded-lg p-4 px-60 w-full text-center focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <button type="submit" class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-500 transition duration-200">Submit</button>
        </form>
    </div>
</body>

@endsection
