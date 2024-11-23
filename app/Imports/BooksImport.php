<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Auth;
use App\Rules\DateOrNumeric;
use Carbon\Carbon;

class BooksImport implements ToModel, WithValidation, WithStartRow {

    use Importable;

    public function model(array $row) {
        return new Book([
            'title'         => $row[0],
            'description'   => $row[1],
            'published_at'  => $this -> transformDate($row[2]),
            'bio'           => $row[3],
            'author_id'     => Auth::user()->id,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }

    public function startRow(): int {
        return 2;
    }

    private function transformDate($date) {
        return is_numeric($date)
        ? Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)) -> format('Y-m-d')
        : Carbon::parse($date) -> format('Y-m-d');
    }

    public function rules(): array {
        return [
            '0' => 'required|string|min:2|max:100',
            '1' => 'required|string|min:5|max:500',
            '2' => ['required', new DateOrNumeric],
            '3' => 'required|string|min:5|max:500',
        ];
    }

    public function customValidationAttributes(): array {
        return [
            '0' => 'Title',
            '1' => 'Description',
            '2' => 'Published At',
            '3' => 'Bio',
        ];
    }

}
