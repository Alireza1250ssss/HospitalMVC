<?php

namespace App\Exceptions;

class ViewException extends \Exception{
    protected $message = "View Not Found";
}