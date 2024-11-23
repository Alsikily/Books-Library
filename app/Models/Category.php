<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Book;

class Category extends Model {

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function authors() {
        return $this -> hasManyThrough(User::class, Book::class, 'cat_id', 'id', 'id', 'author_id');
    }

}
