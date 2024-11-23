<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Author\AuthorInterface;
use App\Repository\Author\AuthorRepository;

class AuthorProvider extends ServiceProvider {

    public function register(): void {
        $this -> app -> bind(AuthorInterface::class, AuthorRepository::class);
    }

    public function boot(): void {
        
    }

}
