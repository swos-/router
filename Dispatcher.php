<?php

namespace Framework;

DEFINE('CONTROLLERS', 'controllers/');

class Dispatcher {
    private $router;

    public function __construct(Router $router) {
        $this->router = $router;
        echo 'Dispatcher constructor called<br>';
    }

    public function handle(Request $request) {
        $this->router->match($request);
        $route = $this->router->_getRoute();
        $controller_name = $this->router->_getController() . 'Controller';
        $controller_action = $this->router->_getAction();
        $filename = CONTROLLERS . $controller_name . '.php';
        var_dump($filename);
        if(file_exists($filename)) {
            require($filename);
            $handler = new $controller_name();
            $handler->$controller_action();
        }
    }
}