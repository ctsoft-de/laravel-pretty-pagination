<?php

namespace CTSoft\Laravel\PrettyPagination\Pagination;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

trait GeneratePrettyUrl
{
    /**
     * The parameters to assign to all URLs.
     *
     * @var array
     */
    protected $parameters;

    /**
     * Get the URL for a given page number.
     *
     * @param int $page
     * @return string
     */
    public function url($page)
    {
        $url = $this->getPageUrl(max($page, 1));
        $url = $this->addQueryString($url);
        $url .= $this->buildFragment();

        return $url;
    }

    /**
     * Get the URL for a page.
     *
     * @param int $page
     * @return string
     */
    protected function getPageUrl(int $page): string
    {
        $route = $this->path();
        $parameters = $this->parameters();

        if ($page > 1) {
            $route .= '.page';
            $parameters['page'] = $page;
        }

        return URL::route($route, $parameters);
    }

    /**
     * Add the query string to an URL.
     *
     * @param string $url
     * @return string
     */
    protected function addQueryString(string $url): string
    {
        if (!$this->query) {
            return $url;
        }

        return sprintf('%s%s%s',
            $url,
            Str::contains($url, '?') ? '&' : '?',
            Arr::query($this->query)
        );
    }

    /**
     * Get the parameters for paginator generated URLs.
     *
     * @return array
     */
    protected function parameters(): array
    {
        if (!isset($this->parameters)) {
            $this->parameters = static::resolveCurrentParameters();
        }

        return $this->parameters;
    }
}
