<!-- resources/views/profile/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <div class="flex justify-center mb-4">
            <img class="w-24 h-24 rounded-full object-cover" src="{{ $user->profile_photo_url ?? 'https://via.placeholder.com/150' }}" alt="User Profile Picture">
        </div>
        <div class="text-center">
            <h2 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h2>
            <p class="text-gray-600">{{ $user->email }}</p>
        </div>
        <div class="mt-6 space-y-4">
            <div class="flex items-center justify-between">
                <span class="text-gray-600">Tanggal Pendaftaran</span>
                <span class="text-gray-800">{{ $user->created_at->format('d M Y') }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-gray-600">Nomor Telepon</span>
                <span class="text-gray-800">{{ $user->phone ?? '-' }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-gray-600">Alamat</span>
                <span class="text-gray-800">{{ $user->address ?? '-' }}</span>
            </div>
        </div>
        <div class="mt-6 flex justify-center">
            <a href="{{ route('profile.edit', $user->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                Edit Profil
            </a>
        </div>
    </div>
</body>
</html>
