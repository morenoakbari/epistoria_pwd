<?php

namespace App\Http\Controllers; // <-- Ensure this is the very first line

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Make sure this is imported if you are using the User model explicitly
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    // Menampilkan profil pengguna
    public function show()
    {
        $user = User::with('books')->where('id', Auth::id())->firstOrFail();
        return view('profile', compact('user'));
    }

    // Menangani pengeditan profil pengguna
    public function edit()
    {
        return view('profile.edit');
    }

    // Menyimpan perubahan profil pengguna
    public function update(Request $request)
    {
        $user = User::find(Auth::id()); // Pastikan mendapatkan instance User dari database

        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'email' => 'required|string|email|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;

        if ($request->hasFile('profile_picture')) {
            // Hapus foto lama jika ada
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }
        
            // Simpan foto baru
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }
        

        try {
            $user->updated_at = now();
            $user->save();
            Auth::setUser(User::find(Auth::id()));
            return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('profile')->with('error', 'Gagal memperbarui profil: ' . $e->getMessage());
        }
    }
}
