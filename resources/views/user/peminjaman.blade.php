@extends ('home')
@section ('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow-md p-20 my-4">
        <h1 class="text-2xl font-bold mb-4">User Input Form</h1>
        <form id="userInputForm" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
                <input type="text" id="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-blue-500">
            </div>

            <div>
                <label for="mapel" class="block text-sm font-medium text-gray-700">Mapel:</label>
                <input type="text" id="mapel" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-blue-500">
            </div>

            <div>
                <label for="barangTempat" class="block text-sm font-medium text-gray-700">Barang/Tempat:</label>
                <input type="text" id="barangTempat" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-blue-500">
            </div>

            <div>
                <label for="jam" class="block text-sm font-medium text-gray-700">Jam:</label>
                <input type="time" id="jam" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700">Submit</button>
        </form>
    </div>

    <script src="app.js"></script>
</body>
    </div>




@endsection