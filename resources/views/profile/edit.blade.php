<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 mt-20">
        <h2 class="text-2xl font-bold text-teal-700 text-center mb-4">Edit Profil</h2>

        <!-- Display success or error messages -->
        @if(session('error'))
        <div class="bg-red-500 text-white p-3 rounded">
            {{ session('error') }}
        </div>
        @endif

        @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700">Nama:</label>
                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email:</label>
                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Bio:</label>
                <textarea name="bio" class="w-full px-4 py-2 border rounded-lg">{{ old('bio', Auth::user()->bio) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Foto Profil:</label>
                <input type="file" name="profile_picture" class="w-full px-4 py-2 border rounded-lg">
            </div>

            <button type="submit" class="w-full gradient-bg text-white px-4 py-2 rounded-lg text-lg font-semibold shadow-md hover:opacity-90">
                Simpan Perubahan
            </button>
        </form>
    </div>
</body>

</html>