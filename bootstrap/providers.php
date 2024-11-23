<?php

return [
    // Packages Providers
    Maatwebsite\Excel\ExcelServiceProvider::class,

    // Custome Providers
    App\Providers\AdminProvider::class,
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthorProvider::class,
    App\Providers\UserProvider::class,
    App\Providers\CategoryProvider::class,
    App\Providers\BookProvider::class,
];
