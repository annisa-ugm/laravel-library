<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class BookController extends Controller
{
    /**
     * Tampilkan semua data buku
     */
    public function index(): JsonResponse
    {
        $books = Book::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar semua buku',
            'data' => $books
        ], 200);
    }

    /**
     * Simpan data buku baru
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book = Book::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil ditambahkan',
            'data'    => $book
        ], 201);
    }

    /**
     * Tampilkan detail buku
     */
    public function show(Book $book): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail buku',
            'data'    => $book
        ], 200);
    }

    /**
     * Update data buku
     */
    public function update(Request $request, Book $book): JsonResponse
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil diperbarui',
            'data'    => $book
        ], 200);
    }

    /**
     * Hapus buku
     */
    public function destroy(Book $book): JsonResponse
    {
        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil dihapus'
        ], 200);
    }
}
