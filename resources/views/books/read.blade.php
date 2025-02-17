<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading: {{ $book->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <div class="w-full bg-white border-b border-gray-200 shadow-md fixed top-0 left-0 z-50">
        <div class="flex items-center justify-between py-4 px-8">
            <div class="text-2xl font-bold text-teal-700">Epistoria</div>
        </div>
    </div>

    <!-- Container -->
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md mt-24">
        <a href="{{ route('books.show', $book->id) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded inline-block mb-4">
            ← Back to Book Details
        </a>

        <h2 class="text-3xl font-bold mt-4">{{ $book->title }}</h2>
        <p class="text-gray-600 mb-4">Author: {{ $book->author }}</p>

        <!-- Isi Buku -->
        <div class="text-gray-700 leading-relaxed whitespace-pre-line">
            {{ $book->content }}
        </div>
    </div>

</body>
</html>
