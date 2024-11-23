<?php

namespace App\Repository\Book;

use Illuminate\Support\Facades\Storage;
use App\Repository\Book\BookInterface;
use Illuminate\Support\Facades\Auth;
use App\Exports\BooksExport;
use App\Imports\BooksImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class BookRepository implements BookInterface {

    private function getBookQuery($bookID) {

        return DB::table('books')
                    -> where('id', $bookID)
                    -> where('author_id', Auth::user() -> id);

    }

    private function deleteCover($cover) {
        if ($cover) {
            Storage::disk('public') -> delete('covers/', $cover);
        }
    }

    public function showBooks() {

        $books = Book::with('category') -> where('author_id', Auth::user() -> id) -> get();

        return response() -> json([
            'status' => 'success',
            'books' => $books
        ], 200);

    }

    public function addBook($request) {

        $requestData = $request -> only('title', 'description', 'bio', 'published_at', 'cat_id');
        $coverPath = Storage::disk('public') -> put('covers', $request -> file('cover'));
        $requestData['cover'] = $coverPath;
        $requestData['author_id'] = Auth::user() -> id;

        $book = Book::create($requestData);
        return response() -> json([
            'status' => 'success',
            'message' => 'Book created successfully',
            'book' => $book
        ], 201);

    }

    public function showBook($bookID) {

        $book = Book::with('category')
                    -> where('id', $bookID)
                    -> where('author_id', Auth::user() -> id)
                    -> first();

        if ($book) {

            return response() -> json([
                'status' => 'success',
                'book' => $book
            ], 200);

        }

        return response() -> json([
            'status' => 'error',
            'message' => 'Book not found'
        ], 404);

    }

    public function updateBook($request, $bookID) {

        $book = $this -> getBookQuery($bookID) -> first();

        if ($book) {

            $requestData = $request -> only('title', 'description', 'bio', 'published_at', 'cat_id');
            $requestData['author_id'] = Auth::user() -> id;

            if ($request -> hasFile('cover')) {
                $this -> deleteCover($book -> cover); // Delete OLD Cover
                $coverPath = Storage::disk('public') -> put('covers', $request -> file('cover')); // Upload NEW Cover
                $requestData['cover'] = $coverPath;
            }

            $this -> getBookQuery($bookID) -> update($requestData);
            return response() -> json([
                'status' => 'success',
                'message' => 'Book info updated successfully'
            ], 200);

        }

        return response() -> json([
            'status' => 'error',
            'message' => 'Book not found'
        ], 404);

    }

    public function deleteBook($bookID) {

        $book = $this -> getBookQuery($bookID) -> first();

        if ($book) {
            $this -> deleteCover($book -> cover); // Delete Cover
            $this -> getBookQuery($bookID) -> delete(); // Delete Book
            return response() -> noContent();
        }

        return response() -> json([
            'status' => 'error',
            'message' => 'Book not found'
        ], 404);

    }

    public function exportBook() {
        return Excel::download(new BooksExport, 'Books.xlsx');
    }

    public function importBook($request) {

        $import = new BooksImport();

        try {
            Excel::import($import, $request -> file('ExcelFile'));
            return response() -> json([
                'status' => 'success',
                'message' => "File's data inserted successfully"
            ]);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            return response() -> json([
                'status' => 'error',
                'messages' => $e -> failures()
            ], 422);
        }

    }

}
