<?php

namespace App\Core;

class Validation {

    public static function numeric($data){
        return (preg_match("/^[0-9]+$/",$data)===1)? true : false;
    }

    public static function national_check($data){
        if(self::numeric($data))
            if(strlen($data)===10)
                return true;
        return false;
    }

    public static function alphabetic($data){
        return (preg_match("/^[a-zA-Z]+$/",$data)===1)? true : false;
    }

    public static function cartnumberCheck($data){
        if(self::numeric($data))
            if(strlen($data)===6)
                return true;
        return false;
    }

    public static function emailCheck($data){
        return (preg_match("/^[a-zA-Z][a-zA-Z0-9_.]*@[a-zA-Z0-9.]+\.[a-z]{2,5}$/",$data)===1)? true : false;
    }

}