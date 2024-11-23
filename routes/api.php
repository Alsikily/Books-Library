<?php

use Illuminate\Support\Facades\Route;

// Controlles
use App\Http\Controllers\{
    UserController,
    AuthorController,
    BookController,
    CategoryController,
    AdminBookController
};

Route::post('/login', [UserController::class, 'login']) -> middleware('guest'); // Login (Admin & Author) Route
Route::get('/books/search', [UserController::class, 'search']);

Route::middleware('user-access:admin') -> group(function() {
    Route::apiResource('authors', AuthorController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::get('admin/books', [AdminBookController::class, 'getBooks']);
});

Route::middleware('user-access:author') -> group(function() {
    Route::apiResource('books', BookController::class) -> except(['update']);
    Route::post('books/{book}', [BookController::class, 'update']) -> name('books.update');
    Route::get('author/books/export', [BookController::class, 'export']) -> name('books.export');
    Route::post('author/books/import', [BookController::class, 'import']) -> name('books.import');
});
