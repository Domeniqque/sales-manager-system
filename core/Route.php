<?php

namespace Core;

class Route
{
    protected $routes = [
        'get' => [],
        'post' => []
    ];

    /**
     * @param $file
     * @return Route
     */
    protected static function load($file)
    {
        $route = new self;
        require $file;

        return $route;
    }
}