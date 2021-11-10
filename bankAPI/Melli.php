<?php

namespace App\bankAPI;

class Melli implements PayInterface{
    protected $fileHandle;

    protected $accounts =[
        "111122" => '1234'
    ];

    public function __construct(){
        $this->fileHandle = fopen("files/Melli.txt","r");
    }
    public function doThePayment($cartNum,$cartPass){
        if(isset( $this->accounts[$cartNum]))
            if($this->accounts[$cartNum] == $cartPass)
                return true;
        return false;
    }
}