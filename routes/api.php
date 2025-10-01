<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('books')->group(function () {
        Route::get('/', [BookController::class, 'index']);      // GET semua buku
        Route::post('/', [BookController::class, 'store']);     // POST tambah buku
        Route::get('/{book}', [BookController::class, 'show']); // GET detail buku
        Route::put('/{book}', [BookController::class, 'update']); // PUT update buku
        Route::delete('/{book}', [BookController::class, 'destroy']); // DELETE hapus buku
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});
