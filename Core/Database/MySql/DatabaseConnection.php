<?php

namespace App\Core\Database\MySql;

use \App\Core\Database\DatabaseConnectionInterface;
use PDO;

class DatabaseConnection implements DatabaseConnectionInterface{

    private static $instance = null;
    private  $connectionInstance;

    private function __construct()
    {
        $this->connectionInstance = new \PDO("mysql:host=localhost;dbname=clinic_management","root","");
    }

    public static function getInstance(){
        if(is_null(self::$instance))
            self::$instance = new DatabaseConnection;
        return self::$instance;
    }

    public function connection(): PDO
    {
        return $this->connectionInstance;
    }
}