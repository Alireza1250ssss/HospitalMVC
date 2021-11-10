<?php

namespace App\Controller;

use App\Core\View;
use App\Models\Reservation;
use App\Models\Patient;
use App\core\Validation;

class ReservationController {

    public $reservation ;

    public function __construct()
    {
        $this->reservation = new Reservation();
    }


    public function showReservation(){
        if(isset($_SESSION['registered'])){
            
            (new View('ReservePage',[
                'id' => $_SESSION['registered'],
                "list" => $this->reservation->getList(),
                "blocked" => $this->reservation->getBlocked()
            ]))->render();
        }
        else
            (new View('RegisterPage'))->render();
    }

    public function setPatient(){
        if(!Validation::alphabetic($_POST['fname']) || !Validation::alphabetic($_POST['lname']) || 
        !Validation::national_check($_POST['national_code'])){
            addToSession('error','input error');
            header("Location:/Hospital/reservation");
            return;
        }
        $id = Patient::do()->create([
            'first_name' => $_POST['fname'],
            'last_name' => $_POST['lname'],
            'gender' => intval($_POST['gender']),
            'age' => intval($_POST['age']),
            'national_code' => $_POST['national_code'],
            'phone' => $_POST['phone']
        ]);
        
        addToSession('registered',$id);
        header("Location:/Hospital/reservation");
    }


}