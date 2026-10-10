<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data buku dari tabel 'book'
        $book = Book::all();
        return view('book.book', compact('book')); // Mengirim data buku ke view 'book.book'
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // untuk ke form create
        return view('book.create-book');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // buat validasi
        $validated = $request->validate([
            'title' => 'required|min:3',
            'author' => 'required|min:3',
            'year' => 'required'
        ]);

        // create data baru ke database
        Book::create($validated);

        // kalau berhasil menuju halaman book.index
        return redirect()->route('book.create')->with('success', 'Success create book');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id); //Cari data by ID
        return view('book.show-book', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     // $book = Book::findOrFail($id); //Cari data by ID

    //     return view('book.edit-book', compact('book'));
    // }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);

        return view('book.edit-book', [
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. validasi
        $validated = $request->validate([
            'title' => 'required|min:3',
            'author' => 'required|min:3',
            'year' => 'required|integer|min:1900|max:2100'
        ]);

        // 2. cari buku by ID
        $book = Book::findOrFail($id);

        // update data buku
        $book->update($validated);

        // 3. arahkan ke halaman index
        return redirect()->route('book.index')->with('success', 'Success updated data book');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari buku by ID
        $book = Book::findOrFail($id);

        // Hapus data buku
        $book->delete();

        // Kembalikan ke halaman index
        return redirect()->route('book.index')->with('success', 'Success deleted data book');
    }
}
