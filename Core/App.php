<?php

namespace App\Core;

class App {
    private $router;

    public function __construct(Router $obj)
    {
        $this->router = $obj;
    }

    public function get($uri , $action){
        $this->router->register("GET",$uri , $action);
        return $this;
    }
    public function post($uri , $action){
        $this->router->register("POST",$uri , $action);
        return $this;
    }

    public function run($method , $uri){
        $this->router->resolve($method,$uri);
    }
}