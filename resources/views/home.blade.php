<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epistoria</title>

    <!-- Fonts & Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind & Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
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
            <div class="relative ml-auto" x-data="{ open: false }">
                <button @click="open = !open" class="focus:outline-none">
                    <img src="{{ asset('images/jiro.jpeg') }}" alt="Profile" class="w-12 h-12 rounded-full object-cover">
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden border">
                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        My Profile
                    </a>


                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner Section -->
    <div class="w-full max-w-4xl mx-auto mt-24 p-6 text-center">
        @if(Auth::check())
        <h2 class="text-3xl font-bold mb-4"> Welcome, {{ Auth::user()->name }}! Ayo Membaca Buku</h2>
        @endif
        <p class="mb-6 text-lg">
            "Jangan pernah membaca karena ingin dianggap pintar. Bacalah karena kamu mau membaca dan dengan sendirinya kamu akan jadi pintar."
            <span class="font-semibold">(Ziggy Z).</span>
        </p>
        <div class="rounded-xl overflow-hidden shadow-lg">
            <img src="{{url('images/WelcomeEpis.png')}}" alt="Banner Image" class="w-full h-auto rounded-xl max-h-[500px] object-cover">
        </div>
    </div>

    <!-- Recommendation Section -->
    <div class="container mx-auto w-full max-w-4xl p-6">
        <h3 class="text-2xl font-bold mb-4">Buku Terbaru</h3>
        <hr class="w-full border-2 border-gray-300 mb-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @forelse ($books as $book)
            <div class="bg-white p-4 flex flex-col items-center rounded-lg shadow-md hover-scale">
                <img src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://via.placeholder.com/150' }}"
                    class="h-60 w-auto object-cover rounded-md">
                <div class="mt-3 font-semibold text-center text-lg">{{ $book->title }}</div>
                <p class="text-sm text-gray-600">Author: {{ $book->author }}</p>
            </div>
            @empty
            <p class="text-gray-500 col-span-full text-center">Belum ada buku yang ditambahkan.</p>
            @endforelse
        </div>
    </div>


</body>

</html>