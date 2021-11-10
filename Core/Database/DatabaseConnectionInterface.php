<?php

namespace App\Core\Database;

interface DatabaseConnectionInterface {

    public function connection() : \PDO ;
    
}