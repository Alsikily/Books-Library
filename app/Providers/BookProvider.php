<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Book\BookInterface;
use App\Repository\Book\BookRepository;

class BookProvider extends ServiceProvider {

    public function register(): void {
        $this -> app -> bind(BookInterface::class, BookRepository::class);
    }

    public function boot(): void {
        
    }

}
