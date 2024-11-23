<?php

namespace App\Repository\Author;

use App\Repository\Author\AuthorInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthorRepository implements AuthorInterface {

    public function getAuthors() {

        $authors = User::where('role', 'author') -> get();

        return response() -> json([
            'status' => 'success',
            'message' => 'Author created successfully',
            'author' => $authors
        ], 201);

    }

    public function addAuthor($request) {

        $author = User::create($request -> only('name', 'email', 'password'));
        return response() -> json([
            'status' => 'success',
            'message' => 'Author created successfully',
            'author' => $author
        ], 201);

    }

    public function showAuthor($authorID) {

        $author = User::where('id', $authorID) -> where('role', 'author') -> first();

        if ($author) {

            return response() -> json([
                'status' => 'success',
                'author' => $author
            ], 200);

        }

        return response() -> json([
            'status' => 'error',
            'message' => 'Author not found'
        ], 404);

    }

    public function updateAuthor($request, $authorID) {

        $author = User::where('id', $authorID) -> where('role', 'author');

        if ($author -> first()) {
            $request['password'] = Hash::make($request -> password);
            $author -> update($request -> only('name', 'email', 'password'));
            return response() -> json([
                'status' => 'success',
                'message' => 'Author info updated successfully'
            ], 200);
        }

        return response() -> json([
            'status' => 'error',
            'message' => 'Author not found'
        ], 404);

    }

    public function deleteAuthor($authorID) {

        $author = User::where('id', $authorID) -> where('role', 'author');

        if ($author -> first()) {

            $author -> delete();
            return response() -> noContent();

        }

        return response() -> json([
            'status' => 'error',
            'message' => 'Author not found'
        ], 404);

    }

}
