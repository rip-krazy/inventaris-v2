@extends ('main')
@section ('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="mt-10 max-w-xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">Admin Interface</h2>
        <div>
            <h3 class="text-lg font-semibold mb-2">Pending Approvals</h3>
            <ul id="pendingList" class="list-disc pl-5 text-gray-700"></ul>
        </div>
    </div>

    <body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow-md p-20 my-4">
        <h1 class="text-2xl font-bold mb-4">Approved Permission</h1>
        
    <script src="app.js"></script>
</body>

@endsection