<?php
namespace App\bankAPI;

// require_once "Mellat.php";
// require_once "Melli.php";
// require_once "Saderat.php";
// require_once "SaderatAdapter.php";




class BankController
{

    public function checkCart()
    {
        
        $bankType = $_POST["banktype"];
        if($bankType =="Saderat") $bank = new SaderatAdapter;
        else if($bankType =="Melli") $bank = new Melli;
        else if($bankType== "Mellat") $bank = new Mellat;
        echo $bank->doThePayment($_POST['cartnumber'], $_POST['cartpassword'])? "1" : "0";
        return;
    }
}
