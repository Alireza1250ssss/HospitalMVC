<?php

namespace App\Core\Database\MySql;

use App\Core\Database\DatabaseInterface;
use App\Core\Database\DatabaseConnectionInterface;

class Database implements DatabaseInterface{

    public $connection ; 
    private $table;

    public function __construct()
    {
        $this->connection = DatabaseConnection::getInstance();
    }

    public static function onTable(string $table) {
        $db = new self();
        $db->setTable($table);
        return $db;
    }

    public function setTable(string $table){
        $this->table = $table;
    }
    
    public function insert(array $data){
        array_walk($data, function(&$value) {
            $value = "'" . $value . "'";
        });

        $query = sprintf(
            "INSERT INTO %s(%s) VALUES (%s)", 
            $this->table, 
            implode(',', array_keys($data)), 
            implode(',', $data)
        );
        return $this->exec($query);
    }
    public function update(array $data , $where = []){
        foreach($data as $key => $value)
            $args[] = "$key='$value'";
        array_walk($where , function(&$value,$key){
            $value = "$key='$value'";
        });
        $hasCondition = $where != [] ? 'WHERE' : '';
        $query = sprintf("UPDATE %s SET %s $hasCondition %s",$this->table,implode(",",$args),implode("AND",$where));
        return $this->exec($query);
    }
    
    public function remove(array $where = []){
        array_walk($where,function(&$value,$key){
            $value = "$key='$value'";
        });
        $query = sprintf("DELETE FROM %s WHERE %s",$this->table,implode("AND",$where));
        return $this->exec($query);
    }

    public function removeSoft(array $where = []){
        array_walk($where,function(&$value,$key){
            $value = "$key = $value";
        });
        $date= date("Y-m-d H:i:s");
        $query = sprintf("UPDATE %s SET deleted_at = '%s'  WHERE %s",$this->table,$date,implode("AND",$where));
        return $this->exec($query);
    }

    public function read($where = [],$condition = "AND"){
        array_walk($where, function(&$value, $key) {
            $value = $key . "='" . $value . "'";
        });
        
        $hasCondition = $where != [] ? 'WHERE' : '';

        $query = sprintf(
            "SELECT * FROM %s $hasCondition %s", 
            $this->table, 
            implode(' ' . $condition . ' ', $where)
        );
        return $this->exec($query)->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function readIn(string $column, array $values) {
        $query = sprintf(
            "SELECT * FROM %s WHERE %s IN (%s)", 
            $this->table, 
            $column,
            implode(',', $values),
        );

        return $this->exec($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function readDeleted(){
        $query = sprintf(
            "SELECT * FROM %s WHERE deleted_at IS NOT NULL", 
            $this->table
        );

        return $this->exec($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function readNotDeleted(){
        $query = sprintf(
            "SELECT * FROM %s WHERE deleted_at IS NULL", 
            $this->table
        );

        return $this->exec($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function disable($where = []){
        array_walk($where,function(&$value,$key){
            $value = "$key = $value";
        });
        $query = sprintf(
            "UPDATE %s SET is_active = 0 WHERE %s", 
            $this->table,implode("AND",$where)
        );
        return $this->exec($query);
    }

    private function exec(string $query) {
        return $this->connection->connection()->query($query);
    }
    public function lastId(){
        return $this->connection->connection()->lastInsertId();
    }

}