<?php
class Router {
    private $routes = [];

    public function get($path, $callback) {
        $this->routes['GET'][$path] = $callback;
    }

    public function dispatch($uri) {
        $uri = parse_url($uri, PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset($this->routes[$method][$uri])) {
            $callback = $this->routes[$method][$uri];
            
            // Example: "UserController@index"
            if (is_string($callback)) {
                [$controller, $method] = explode('@', $callback);
                require_once "Controllers/$controller.php";
                $obj = new $controller;
                $obj->$method();
            }
        } else {
            http_response_code(404);
            echo "404 - Not Found";
        }
    }
}
