<?php

namespace App\Http\Controllers;

// Requests
use App\Http\Requests\addBookRequest;
use App\Http\Requests\updateBookRequest;
use App\Http\Requests\ImportExcelRequest;

use App\Repository\Book\BookInterface;

class BookController extends Controller {

    private $BookRepo;

    public function __construct(BookInterface $BookRepo) {
        $this -> BookRepo = $BookRepo;
    }

    public function index() {
        return $this -> BookRepo -> showBooks();
    }

    public function store(addBookRequest $request) {
        return $this -> BookRepo -> addBook($request);
    }

    public function show($CatID) {
        return $this -> BookRepo -> showBook($CatID);
    }

    public function update(updateBookRequest $request, $CatID) {
        return $this -> BookRepo -> updateBook($request, $CatID);
    }

    public function destroy($CatID) {
        return $this -> BookRepo -> deleteBook($CatID);
    }

    public function export() {
        return $this -> BookRepo -> exportBook();
    }

    public function import(ImportExcelRequest $request) {
        return $this -> BookRepo -> importBook($request);
    }

}
