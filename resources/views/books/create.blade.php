<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tambah Buku</title>
</head>

<body class="bg-gray-50">
    <div class="max-w-md mx-auto mt-12 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-teal-700 mb-4 text-center">Tambah Buku</h2>

        <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Judul Buku</label>
                <input type="text" name="title" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Author</label>
                <input type="text" name="author" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Isi Buku</label>
                <textarea name="content" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" rows="5" required></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Cover Buku</label>
                <input type="file" name="cover" class="w-full border px-3 py-2 rounded-md">
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg w-full font-semibold">
                Simpan Buku
            </button>
        </form>
</body>

</html>