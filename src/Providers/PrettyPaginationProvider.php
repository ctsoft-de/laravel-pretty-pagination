<?php

namespace CTSoft\Laravel\PrettyPagination\Providers;

use CTSoft\Laravel\PrettyPagination\Routing\Route;
use Illuminate\Routing\Route as BaseRoute;
use Illuminate\Support\ServiceProvider;

class PrettyPaginationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        BaseRoute::mixin(new Route());
    }
}
