<?php

namespace App\Providers;
use App\Providers\AppServiceProvider;
use App\Providers\RepositoryServiceProvider;
use App\Providers\RouteServiceProvider;

return [
    App\Providers\RouteServiceProvider::class,
    App\Providers\AppServiceProvider::class,
    App\Providers\RepositoryServiceProvider::class,
];
