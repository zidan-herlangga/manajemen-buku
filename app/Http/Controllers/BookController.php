<?php

namespace App\Http\Controllers;

use App\Models\Book;        // Model untuk tabel 'books'
use App\Models\Category;    // Model untuk tabel 'categories'
use Illuminate\Http\Request;

class BookController extends Controller
{
    // ✅ Menampilkan semua buku (dengan fitur pencarian & filter kategori)
    public function index(Request $request)
    {
        $query = Book::with('category'); // Ambil relasi kategori agar lebih efisien

        // Jika ada pencarian judul atau penulis
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('author', 'like', '%' . $request->search . '%');
            });
        }

        // Jika difilter berdasarkan kategori
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Ambil data buku terbaru, paginasi 10 per halaman
        $books = $query->latest()->paginate(10)->withQueryString();

        // Ambil semua kategori untuk dropdown filter
        $categories = Category::all();

        // Tampilkan ke view books.index
        return view('books.index', compact('books', 'categories'));
    }

    // ➕ Menampilkan form tambah buku
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('books.create', compact('categories')); // Kirim ke view create
    }

    // 💾 Menyimpan buku baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        ]);

        // Simpan ke database
        Book::create($request->all());

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    // ✏️ Menampilkan form edit buku
    public function edit(Book $book)
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('books.edit', compact('book', 'categories')); // Kirim ke view edit
    }

    // 🔁 Menyimpan perubahan buku
    public function update(Request $request, Book $book)
    {
        // Validasi input
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        ]);

        // Update ke database
        $book->update($request->all());

        // Redirect ke halaman utama
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    // ❌ Menghapus buku
    public function destroy(Book $book)
    {
        $book->delete(); // Hapus data
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
