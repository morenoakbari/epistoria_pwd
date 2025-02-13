<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Profile</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #6ee7b7, #3b82f6);
        }

        .hover-scale {
            transition: transform 0.2s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-gray-50">
    <nav class="w-full bg-white border-b border-gray-200 shadow-md fixed top-0 left-0 z-50">
        <div class="flex justify-between items-center py-4 px-8">
            <div class="text-2xl font-bold text-teal-700">Epistoria</div>
            <a href="{{ route('home') }}" class="text-teal-600 hover:underline">Kembali ke Home</a>
        </div>
    </nav>

    <main class="pt-24 px-6">
        <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 text-center hover-scale">
            @if(Auth::check())
            <div class="relative w-32 h-32 mx-auto">
                <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://via.placeholder.com/150' }}"
                    alt="Profile" class="w-full h-full rounded-full object-cover border-4 border-teal-500">
            </div>

            <h2 class="text-xl font-bold text-teal-700 mt-4">{{ Auth::user()->name }}</h2>
            <p class="text-gray-600 text-sm">{{ Auth::user()->bio ?? 'Tambahkan bio...' }}</p>


            <div class="mt-6 space-y-4">
                <a href="{{ route('profile.edit') }}" class="gradient-bg text-white px-6 py-2 rounded-lg text-lg font-semibold shadow-md hover:opacity-90 transition-opacity">
                    ✏️ Edit Profil
                </a>
                <a href="{{ route('book.create') }}" class="gradient-bg text-white px-6 py-2 rounded-lg text-lg font-semibold shadow-md hover:opacity-90 transition-opacity">
                    ➕ Add Buku
                </a>
            </div>

            @else
            <p class="text-red-500 font-semibold">Kamu belum login! Silakan login terlebih dahulu.</p>
            <a href="{{ route('login') }}" class="text-teal-600 hover:underline">Login di sini</a>
            @endif
        </div>

        <div class="container mx-auto w-full max-w-4xl p-6 mt-12">
            <h3 class="text-2xl font-bold mb-4 text-teal-700">Buku Saya</h3>
            <hr class="w-full border-2 border-gray-300 mb-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @forelse ($user->books as $book)
                <div class="bg-white p-4 flex flex-col items-center rounded-lg shadow-md hover-scale">
                    <div class="w-full aspect-[4/5] overflow-hidden rounded-md">
                        <img src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://via.placeholder.com/150' }}"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="mt-3 font-semibold text-center text-lg text-teal-700">{{ $book->title }}</div>
                    <p class="text-sm text-gray-600">Author: {{ $book->author }}</p>
                </div>
                @empty
                <p class="text-gray-500 col-span-full text-center">Belum ada buku yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </main>
</body>

</html>