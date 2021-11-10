<?php

namespace App\Core;
use App\Exceptions\ViewException;

class View {
    protected $view ; 
    protected $params;

    public function __construct($viewname , $parameters=[])
    {
        $this->view = $viewname;
        $this->params = $parameters;
    }
    public function render(){
        extract($this->params);
        $viewPath = "../View/".$this->view.".php";
        extract($this->params);
        if(!file_exists($viewPath))
            throw new ViewException();
        ob_start();
        require_once $viewPath;
        $child = ob_get_clean();
        echo $child;
    }
}