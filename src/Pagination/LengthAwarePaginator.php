<?php

namespace CTSoft\Laravel\PrettyPagination\Pagination;

use Closure;
use Illuminate\Pagination\LengthAwarePaginator as BaseLengthAwarePaginator;

class LengthAwarePaginator extends BaseLengthAwarePaginator
{
    use GeneratePrettyUrl;

    /**
     * Resolve the current parameters or return the default value.
     *
     * @param array $default
     * @return array
     */
    public static function resolveCurrentParameters(array $default = []): array
    {
        return Paginator::resolveCurrentParameters($default);
    }

    /**
     * Set the current request parameters resolver callback.
     *
     * @param Closure $resolver
     * @return void
     */
    public static function currentParametersResolver(Closure $resolver): void
    {
        Paginator::currentParametersResolver($resolver);
    }
}
