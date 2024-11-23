<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class AdminBookController extends Controller {

    public function getBooks(Request $request) {

        $books = Book::with('author:id,name,email')
                    -> when($request -> author_id != null, function ($query) use ($request) {
                        $query -> where('author_id', $request -> author_id);
                    })
                    -> get();

        return response() -> json([
            'status' => 'success',
            'books' => $books
        ], 200);

    }

}
