<?php

namespace Core;

use Core\Middleware\Guest;
use Core\Middleware\Auth;
use Core\Middleware\Middleware;

class Router
{
    public $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => null
        ];

        return $this;
    }


    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }
    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }
    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }
    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }
    public function patch($uri, $controller)
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function only($key)
    {
        $middlewareMap = [
            'guest' => Guest::class,
            'auth' => Auth::class,
        ];
        $middlewareClass = $middlewareMap[$key] ?? $key;
        $this->routes[array_key_last($this->routes)]['middleware'] = $middlewareClass;
        return $this;
    }

    public function route($uri, $method)
    {
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['uri'] === $uri) {

                //apply middleware 

              if ($route['middleware']) {
                  (new $route['middleware']())->handle();
              }

                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }



    protected function abort($code = 404)
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }
}
// $routes = require 'routes.php';

// function routeToController($uri, $routes){
//     if(array_key_exists($uri, $routes)){
//         return require base_path($routes[$uri]);
//     }
//     abort();
// }
