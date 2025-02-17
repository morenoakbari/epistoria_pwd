<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <div class="w-full bg-white border-b border-gray-200 shadow-md fixed top-0 left-0 z-50">
        <div class="flex items-center justify-between py-4 px-8">
            <!-- Logo -->
            <div class="text-2xl font-bold text-teal-700">Epistoria</div>

            <!-- Search Bar (Di Tengah) -->
            <div class="absolute left-1/2 transform -translate-x-1/2 w-full max-w-md">
                <div class="flex items-center bg-white rounded-full shadow-md px-4 py-2">
                    <input type="text" placeholder="Search" class="w-full border-none focus:outline-none">
                    <i class="fas fa-search text-gray-500 ml-2"></i>
                </div>
            </div>

            <!-- Profile Dropdown (Di Pojok Kanan) -->
            <!-- Profile Dropdown (Di Pojok Kanan) -->
            <div class="relative ml-auto" x-data="{ open: false }">
                <button @click="open = !open" class="focus:outline-none">
                    <img src="{{ Auth::check() && Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : 'https://via.placeholder.com/150' }}" alt="Profile Image" class="w-12 h-12 rounded-full object-cover">
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden border">
                    @auth
                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        My Profile
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Login
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md mt-24">
        <a href="{{ route('home') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded inline-block mb-4">
            ← Back to Home
        </a>

        <img src="{{ asset('storage/' . $book->cover) }}" class="w-full h-96 object-cover rounded-md" alt="Book Cover">

        <h2 class="text-2xl font-bold mt-4">{{ $book->title }}</h2>
        <p class="text-gray-600">Author: {{ $book->author }}</p>

        <!-- Tombol Read More -->
        <a href="{{ route('books.read', $book->id) }}" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 px-4 rounded mt-4 inline-block">
            Read More →
        </a>
    </div>

</body>

</html>