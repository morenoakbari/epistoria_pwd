<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua buku dari database berdasarkan yang terbaru
        $books = Book::latest()->get();

        return view('home', [
            'books' => $books,
        ]);
    }
}
