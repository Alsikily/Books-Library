<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Auth;

class BooksExport implements FromCollection, WithHeadings {

    public function collection() {
        return Book::where('author_id', Auth::user() -> id)
                    -> get()
                    -> makeHidden(['id', 'cover', 'cat_id', 'author_id']);
    }

    public function headings(): array {
        return [
            'Title',
            'Description',
            'Published At',
            'Bio',
            'Created_at',
            'Updated_at'
        ];
    }

}