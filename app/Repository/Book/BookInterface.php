<?php

namespace App\Repository\Book;

interface BookInterface {

    public function showBooks();
    public function addBook($request);
    public function showBook($CatID);
    public function updateBook($request, $CatID);
    public function deleteBook($CatID);
    public function exportBook();
    public function importBook($request);

}
