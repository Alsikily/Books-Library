<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Admin\AdminInterface;
use App\Repository\Admin\AdminRepository;

class AdminProvider extends ServiceProvider {

    public function register(): void {
        $this -> app -> bind(AdminInterface::class, AdminRepository::class);
    }

    public function boot(): void {
        
    }

}
