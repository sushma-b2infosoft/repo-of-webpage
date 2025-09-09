<?php
class App {
    protected $router;

    public function __construct() {
        $this->router = new Router();

        // Define routes
        $this->router->get('/user', 'UserController@index');
        $this->router->get('/user/add', 'UserController@add');

        // Get the URL from query string
        $uri = $_GET['url'] ?? '/';
        $uri = '/' . trim($uri, '/');

        $this->router->dispatch($uri);
    }
}

