<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\User\UserInterface;
use App\Repository\User\UserRepository;

class UserProvider extends ServiceProvider {

    public function register(): void {
        $this -> app -> bind(UserInterface::class, UserRepository::class);
    }

    public function boot(): void {
        
    }

}
