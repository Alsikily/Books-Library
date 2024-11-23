<?php

namespace App\Repository\User;

use App\Repository\User\UserInterface;
use Illuminate\Support\Facades\Auth;

use App\Models\Book;

class UserRepository implements UserInterface {

    public function login($request) {

        $credentials = $request -> only('email', 'password');

        if ($token = Auth::attempt($credentials)) {

            return response() -> json([
                'status' => 'success',
                'user' => Auth::user(),
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ], 200);
        }

        return response() -> json([
            'status' => 'error',
            'message' => 'Unauthorized',
        ], 401);

    }

    public function search($request) {

        $books = Book::whereAny([
            'title',
            'description'
        ], 'LIKE', '%' . $request -> searchWord . '%') -> get();

        return response() -> json([
            'status' => 'success',
            'books' => $books
        ]);

    }

}
