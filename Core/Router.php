<?php
namespace Core;
class Router{
    public $routes =[];
    
    public function add($method, $uri, $controller){
       $this->routes[]= compact('method', 'uri', 'controller');
    }

    public function get($uri, $controller){
       $this->add('GET', $uri, $controller);
    }
    public function post($uri, $controller){
        $this->add('POST', $uri, $controller);
    }
    public function delete($uri, $controller){
        $this->add('DELETE', $uri, $controller);
            
    }
    public function put($uri, $controller){
        $this->add('PUT', $uri, $controller);
    }
    public function patch($uri, $controller){
        $this->add('PATCH', $uri, $controller);
    }

    public function route($uri, $method){
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            // if (!isset($route['method'], $route['uri'], $route['controller'])) {
            //     continue;
            // }

            if ($route['method'] === $method && $route['uri'] === $uri) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }



    protected function abort($code = 404){
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


