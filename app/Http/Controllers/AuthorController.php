<?php

namespace App\Http\Controllers;

// Requests
use App\Http\Requests\addAuthorRequest;
use App\Http\Requests\updateAuthorRequest;

use App\Repository\Author\AuthorInterface;

class AuthorController extends Controller {

    private $AuthorRepo;

    public function __construct(AuthorInterface $AuthorRepo) {
        $this -> AuthorRepo = $AuthorRepo;
    }

    public function index() {
        return $this -> AuthorRepo -> getAuthors();
    }

    public function store(addAuthorRequest $request) {
        return $this -> AuthorRepo -> addAuthor($request);
    }

    public function show($authorID) {
        return $this -> AuthorRepo -> showAuthor($authorID);
    }

    public function update(updateAuthorRequest $request, $authorID) {
        return $this -> AuthorRepo -> updateAuthor($request, $authorID);
    }

    public function destroy($authorID) {
        return $this -> AuthorRepo -> deleteAuthor($authorID);
    }

}
