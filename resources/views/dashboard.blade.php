<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tambah Buku</title>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="w-full bg-white border-b border-gray-200 shadow-md fixed top-0 left-0 z-50">
        <div class="flex justify-between items-center py-4 px-8">
            <div class="text-2xl font-bold text-teal-700">Epistoria</div>
            <a href="{{ route('home') }}" class="text-teal-600 hover:underline">Kembali ke Home</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20 px-6">
        <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4 text-teal-700">Tambah Buku Baru</h2>
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                    <input type="text" id="title" name="title" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 focus:outline-teal-500" required>
                </div>
                <div class="mb-4">
                    <label for="author" class="block text-sm font-medium text-gray-700">Penulis</label>
                    <input type="text" id="author" name="author" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 focus:outline-teal-500" required>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Gambar Buku (Opsional)</label>
                    <input type="file" id="image" name="image" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 focus:outline-teal-500">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 focus:outline-teal-500"></textarea>
                </div>
                <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white px-5 py-2 rounded-lg shadow-md">Tambah Buku</button>
            </form>

        </div>
    </main>
</body>

</html>