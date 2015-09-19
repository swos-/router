<?php

namespace Framework;

class Request {
    private $method;
    private $path;
    private $query;
    private $basePath = '/sandbox/routing';

    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->parsePath();
        echo 'Request constructor called<br>';
    }

    private function parsePath() {
        $this->path = str_replace($this->basePath, '', $_SERVER['REQUEST_URI']);
    }

    public function _getPath() {
        return $this->path;
    }

    public function _getMethod() {
        return $this->method;
    }

    public function _getQuery() {
        return $this->query;
    }
}