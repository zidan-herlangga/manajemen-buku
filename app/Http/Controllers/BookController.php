<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Barryvdh\DomPDF\Facade\Pdf;

class BookController extends Controller
{
    // ✅ Menampilkan daftar buku dengan pencarian dan filter
    public function index(Request $request)
    {
        $query = Book::with('category');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('author', 'like', '%' . $request->search . '%')
                ->orWhere('publisher', 'like', '%' . $request->search . '%')
                ->orWhere('year', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $books = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::all();

        // Hitung kategori yang sudah dipakai (distinct category_id)
        $usedCategoryCount = Book::distinct('category_id')->count('category_id');

        return view('books.index', compact('books', 'categories', 'usedCategoryCount'));
    }

    public function invoiceAll()
    {
        $books = Book::with('category')->get();

        $pdf = Pdf::loadView('books.invoice_all', compact('books'))->setPaper('A4', 'landscape');

        return $pdf->download('invoice-semua-buku.pdf');
    }

    // public function invoicePerBook(Book $book)
    // {
    //     return view('books.invoice_book', compact('book'));
    // }

    public function invoicePerBookPdf(Book $book)
    {
        $pdf = Pdf::loadView('books.invoice_book_pdf', compact('book'))->setPaper('A4');
        return $pdf->download('invoice-buku-' . $book->id . '.pdf');
    }


    // ➕ Form tambah buku
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    // 💾 Simpan buku baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    // 👁️ Detail buku
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // ✏️ Form edit buku
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    // 🔄 Update buku
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($book->cover && Storage::disk('public')->exists($book->cover)) {
                Storage::disk('public')->delete($book->cover);
            }
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    // ❌ Hapus buku
    public function destroy(Book $book)
    {
        if ($book->cover && Storage::disk('public')->exists($book->cover)) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
