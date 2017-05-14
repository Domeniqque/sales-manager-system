<?php

namespace Core;

class Route
{
    /**
     * @var array
     */
    protected $routes = [
        "GET" => [],
        "POST" => []
    ];

    /**
     * @param $file
     * @return Route
     */
    public static function load($file)
    {
        $router = new self;

        require $file;

        return $router;
    }

    /**
     * @param $uri
     * @param $controller
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * @param $uri
     * @param $controller
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * @param $uri
     * @param string $requestType GET | POST
     * @return mixed
     * @throws \Exception
     */
    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }

        throw new \Exception('No route defined!');
    }

    /**
     * @param $controller
     * @param $action
     * @return mixed
     */
    private function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        return $controller->$action();
    }

    /**
     * @param $uri
     * @param string $requestType GET | POST
     * @return bool
     */
    public function exists($uri, $requestType = 'GET')
    {
        return array_key_exists($uri, $this->routes[$requestType]);
    }
}