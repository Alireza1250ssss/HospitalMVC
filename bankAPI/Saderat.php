<?php

namespace App\bankAPI;


class Saderat {
    protected $fileHandle;

    protected $accounts =[
        "-777888-" => "-1234-"
    ];

    public function __construct(){
        $this->fileHandle = fopen("files/Saderat.txt","r");
    }
    public function payTheCost($cartNum,$cartPass){
        if(isset( $this->accounts[$cartNum]))
            if($this->accounts[$cartNum] == $cartPass)
                return true;
        return false;
    }
}