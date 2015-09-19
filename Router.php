<?php

namespace Framework;

class Router {
    private $routes;
    private $matched_route;
    private $controller;
    private $action;

    public function __construct() {
        $this->routes = yaml_parse_file('route.yml');
        echo 'Router constructor called';
    }

    public function match($request) {
        $path = $request->_getPath();
        foreach($this->routes as $key => $value) {
            echo "looping over routes<br>";
            if($value['url'] === $path) {
                echo "found path<br>";
                $this->_setRoute($value);
                continue;
            }
        }
    }

    private function _setRoute($value) {
        echo "setting route<br>";
        $this->matched_route = $value;
    }

    public function _getRoute() {
        return $this->matched_route;
    }

    public function _getController() {
        $action = $this->matched_route['action'];
        $controller_string = explode(':', $action);
        return $controller_string[0];
    }

    public function _getAction() {
        $action = $this->matched_route['action'];
        $action_string = explode(':', $action);
        return $action_string[1];
    }
}