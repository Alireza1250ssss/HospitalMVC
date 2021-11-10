<?php
 
 namespace App\bankAPI;

class Mellat implements PayInterface{
    protected $fileHandle;

    protected $accounts=[
        '666555' => '1234'
    ];

    public function __construct(){
        $this->fileHandle = fopen("files/Mellat.txt","r");
    }
    public function doThePayment($cartNum,$cartPass){
        if(isset( $this->accounts[$cartNum]))
            if($this->accounts[$cartNum] == $cartPass)
                return true;
        return false;
    }
}