<?php

namespace App\Core;

class Router {
    private $routes;

    public function register($method , $uri , $action ){
        $this->routes[$method][$uri] = $action;
    }

    public function resolve($method , $uri){
        $action = $this->routes[$method][$uri];
        if(class_exists($action[0])){
            $action[0] = new $action[0];
            if(method_exists($action[0],$action[1])){
                call_user_func_array($action,[]);
                return;
            }
        }
        echo "404 ERROR";
    }
}
