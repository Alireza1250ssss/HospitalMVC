<?php

namespace App\Controller;

use App\Core\View;
use App\Models\Payment;
use App\Models\Reservation;
use App\Core\Validation;

class PaymentController
{

    public function getInfo()
    {
        [$userID, $patientID, $weekday] = explode("-", $_POST['resdetails']);
        (new \App\SMS\PayamakStrategy(new \App\SMS\SabaPayamak()))->reserve($userID,$patientID,$weekday);
        $bankType = $_POST['bank'];
        $cost = (new Reservation())->getPrice($userID)['cost'];
        addToSession('user_id', $userID);
        addToSession('patient_id', $patientID);
        addToSession('weekday', $weekday);
        addToSession('cost', $cost);
        addToSession('bankType', $bankType);
        (new View('Payment', [
            'bankType' => $bankType,
            'cost' => $cost
        ]))->render();
    }


    public function completePayment()
    {
        if(!Validation::cartnumberCheck($_POST['cartnumber'])){
            echo "300"; return;
        }
        $status = $this->bankAPI();
        if($status === '1'){
            $visitID=Payment::do()->create([
                'user_id'=>$_SESSION['user_id'],
                'patient_id'=>$_SESSION['patient_id'],
                'weekday'=>$_SESSION['weekday']
            ]);
            Payment::do()->setTheReserve($visitID,$_SESSION['cost']);
            echo "200";
        }
        else if($status==='0'){
            echo "400";
        }
    }

    private function bankAPI()
    {
        
        $curl = curl_init();
        $url = "http://localhost/Hospital/bankAPI/";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            'banktype' => $_SESSION['bankType'] , 
            'cartnumber' => $_POST['cartnumber'],
            'cartpassword' => $_POST['cartpassword']
        ]);
        $res = curl_exec($curl);
        curl_close($curl);
        
        return $res;
    }
}
