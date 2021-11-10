<?php

namespace App\Models;

use \App\Core\Model;
use App\Core\Database\MySql\Database;

class Admin extends Model {

    protected $table = 'admins';

    public static function getProfile(){
        $id = $_SESSION['loggedIn'];
        return Database::onTable('admin_details')->read(['adminId' => $id]);
    }

}