<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Book extends Model {

    protected $fillable = [
        'title',
        'description',
        'published_at',
        'bio',
        'cover',
        'author_id',
        'cat_id',
    ];

    public function category() {
        return $this -> belongsTo(Category::class, 'cat_id', 'id');
    }

    public function author() {
        return $this -> belongsTo(User::class, 'author_id', 'id');
    }

    public function getCoverAttribute($value) {
        if ($value) {
            return asset('storage/' . $value);
        }
        return null;
    }

}
