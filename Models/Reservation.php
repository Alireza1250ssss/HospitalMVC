<?php

namespace App\Models;

use App\core\Model;

class Reservation extends Model {


    protected $table = 'users';

    public function getList(){
       $pdo = $this->db->connection->connection(); 
       $sql = "SELECT user_id,first_name,last_name,start_time,end_time,week_day FROM users INNER JOIN shift_works AS sh ON users.id=sh.user_id ";
       return $pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getBlocked(){
        $pdo = $this->db->connection->connection();
        $sql = "SELECT weekday,user_id,COUNT(user_id) as visit FROM patient_user GROUP BY user_id,weekday HAVING visit > 4 ";
        return $pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getPrice($id){
        $pdo = $this->db->connection->connection();
        $sql = "SELECT cost FROM users WHERE id=$id";
        return $pdo->query($sql)->fetch(\PDO::FETCH_ASSOC);
    }

}