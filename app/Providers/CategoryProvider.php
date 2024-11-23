<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Category\CategoryInterface;
use App\Repository\Category\CategoryRepository;

class CategoryProvider extends ServiceProvider {

    public function register(): void {
        $this -> app -> bind(CategoryInterface::class, CategoryRepository::class);
    }

    public function boot(): void {

    }

}
