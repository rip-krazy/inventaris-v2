@extends ('home')
@section ('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow-md p-20 my-4">
        <h1 class="text-2xl font-bold mb-4">User Input Form</h1>
        <form action="{{ route('persetujuan.store') }}" method="POST">
            @csrf
            <input type="text" name="nama" placeholder="Enter approval name" required>
            <ul id="pendingList" class="list-disc pl-5 text-gray-700">
                @foreach($pendingApprovals as $approval)
                    <li>{{ $approval->nama }}</li>
                @endforeach
            </ul>
            <div>
                <input type="text" name="mapel" placeholder="Enter approval Mapel" required>
                <ul class="list-disc pl-5 text-gray-700">
                    @foreach($pendingApprovals as $approval)
                        <li>{{ $approval->mapel }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <input type="text" name="barangtempat" placeholder="Enter approval barang/tempat" required>
                <ul class="list-disc pl-5 text-gray-700">
                    @foreach($pendingApprovals as $approval)
                        <li>{{ $approval->barangtempat }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <input type="time" name="jam" required>
                <ul class="list-disc pl-5 text-gray-700">
                    @foreach($pendingApprovals as $approval)
                        <li>{{ $approval->jam }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white rounded-md py-2 hover:bg-blue-700">Submit</button>
        </form>
    </div>
</div>
    <script src="app.js"></script>
</body>




@endsection