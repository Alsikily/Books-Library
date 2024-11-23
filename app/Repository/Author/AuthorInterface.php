<?php

namespace App\Repository\Author;

interface AuthorInterface {

    public function getAuthors();
    public function addAuthor($request);
    public function showAuthor($authorID);
    public function updateAuthor($request, $authorID);
    public function deleteAuthor($authorID);

}
