<?php

namespace App\Core;

use Exception;

class Router
{
    /**
     * @var array of available routes by request method.
     */
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * Load router file and create Router object.
     *
     * @param string $file path to router file
     * @return Router
     */
    public static function load(string $file)
    {
        $router = new self;

        require $file;

        return $router;
    }

    /**
     * Handle get requests.
     *
     * @param string $uri router uri
     * @param string $controller class and method to access
     */
    public function get(string $uri, string $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Handle post requests.
     *
     * @param string $uri router uri
     * @param string $controller class and method to access
     */
    public function post(string $uri, string $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * Redirect to route if route exist.
     *
     * @param string $uri router uri
     * @param string $requestType
     * @return mixed
     *
     * @throws Exception
     */
    public function redirect(string $uri, string $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {

            return $this->callAction(

                // Split string into array and return each array variable as parameter
                ...explode('@', $this->routes[$requestType][$uri])

            );

        };

        throw new Exception('No route defined for this URI');
    }

    /**
     * Call controller method.
     *
     * @param string $controller
     * @param string $action
     * @return mixed
     *
     * @throws Exception
     */
    protected function callAction(string $controller, string $action)
    {
        $controllerObj = new $controller;

        if (!method_exists($controller, $action)) {
            throw new Exception("$controller does not respond to $action action");
        }

        return $controllerObj->$action();
    }
}