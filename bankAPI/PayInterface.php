<?php

namespace App\bankAPI;


interface PayInterface{
    public function doThePayment($cartNum,$cartPass);
}