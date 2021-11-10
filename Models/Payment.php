<?php

namespace App\Models;

use App\Core\Model;

class Payment extends Model {
    protected $table = 'patient_user';

    public function setTheReserve($visit , $cost){
        $pdo = $this->db->connection->connection();
        $sql = "INSERT INTO payments VALUES($visit,$cost)"; 
        $pdo->query($sql);
    }

}