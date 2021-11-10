<?php

namespace App\bankAPI;


class SaderatAdapter implements PayInterface{
    protected $saderatObj;

    public function __construct()
    {
        $this->saderatObj = new Saderat();
    }

    public function doThePayment($cartNum,$cartPass){
        $cartNum = "-$cartNum-";
        $cartPass = "-$cartPass-";
        return $this->saderatObj->payTheCost($cartNum,$cartPass);
    }
}