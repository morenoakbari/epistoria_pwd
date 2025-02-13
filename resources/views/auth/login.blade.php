<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Login</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-50 via-blue-100 to-blue-200">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center text-[#227B94] mb-6">
        <i class="fa-solid fa-user"></i> Masuk
        </h2>

        <!-- Tampilkan Pesan Error -->
        @if ($errors->any())
        <div class="bg-[#227B94]/10 text-[#227B94] p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form Login -->
        <form method="POST" action="{{ route('login.post') }}">
            @csrf <!-- CSRF token -->

            <!-- Input Email -->
            <div class="mb-4">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="w-full px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-[#227B94]" required>
            </div>

            <!-- Input Password -->
            <div class="mb-4">
                <input type="password" name="password" placeholder="Password" class="w-full px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-[#227B94]" required>
            </div>

            <!-- Link ke Halaman Register -->
            <div class="text-center mb-6">
                <span>Tidak punya akun? </span>
                <a href="{{ route('register') }}" class="text-[#227B94] font-bold underline">Daftar</a>
            </div>

            <!-- Tombol Submit -->
            <div>
                <button type="submit" class="w-full bg-[#227B94] text-white py-2 rounded-full text-lg font-bold hover:bg-[#196270]">
                <i class="fa-solid fa-user"></i> Masuk
                </button>
            </div>
        </form>
    </div>
</body>
</html>
