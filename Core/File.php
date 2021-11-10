<?php

namespace App\Core;

use App\Exceptions\FileUploadException;

class File{

    protected $file;
    protected $path='../files/';
    protected $temp;


    private function __construct($file)
    {
        $this->file = $file;
        $this->temp = $file['tmp_name'];
    }

    public static function getInstance($file){
        return new static($file);
    }

    public function save($path=''){
        $this->path .= $path;
        $this->path .= uniqid();
        move_uploaded_file($this->temp,$this->path);
        return $this->path;
    }

    public static function remove($path){
        unlink($path);
    }

    public function validate(array $rules,array $success) {
        $result = true;
        foreach($rules as $rule => $params) {
            $result = call_user_func_array([$this, $rule], $params);
    
            if(!$result)
                break;
        }

        if ($result) {
            return call_user_func_array([$this,$success['callback']], $success['params']);
        }
        else{
            throw new FileUploadException();
        }
    }

    private function checkSize($max, $min = 0) {
        $size = $this->file['size'] / 1000;
        if ($size > $max || $size < $min)
            return false;

        return true;
    }

    private function checkType($type) {
        return !(strpos($this->file['type'], $type) === false);
    }



}