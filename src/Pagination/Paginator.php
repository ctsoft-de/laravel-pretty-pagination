<?php

namespace CTSoft\Laravel\PrettyPagination\Pagination;

use Closure;
use Illuminate\Pagination\Paginator as BasePaginator;

class Paginator extends BasePaginator
{
    use GeneratePrettyUrl;

    /**
     * The current parameters resolver callback.
     *
     * @var Closure
     */
    protected static $currentParametersResolver;

    /**
     * Resolve the current parameters or return the default value.
     *
     * @param array $default
     * @return array
     */
    public static function resolveCurrentParameters(array $default = []): array
    {
        if (isset(static::$currentParametersResolver)) {
            return call_user_func(static::$currentParametersResolver);
        }

        return $default;
    }

    /**
     * Set the current request parameters resolver callback.
     *
     * @param Closure $resolver
     * @return void
     */
    public static function currentParametersResolver(Closure $resolver): void
    {
        static::$currentParametersResolver = $resolver;
    }
}
