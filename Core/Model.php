<?php

namespace App\Core;

use App\Core\Database\MySql\Database;

abstract class Model {

    protected $db ; 
    protected $table ; 

    public function __construct()
    {
        $this->db = new Database;
        $this->db->setTable($this->table);
    }

    public static function do(){
        return new static;
    }
    public function create($data){
        $this->db->insert($data);
        return $this->db->lastId();
    }
    public function update(array $data, array $where) {
        $this->db->update($data, $where);
    }

    public function delete(array $where) {
        $this->db->remove($where);
    }

    public function softDelete(array $where) {
        $this->db->removeSoft($where);
    }

    public function find(string $value, string $column = 'id') {
        $model = $this->db->read([
            $column => $value
        ]);

        if (count($model) === 0)
            return null;

        return $model[0];
    }

    public function getDeleted(){
        $model = $this->db->readDeleted();

        if (count($model) === 0)
            return null;

        return $model;
    }

    public function readIn($column, $values) {
        return $this->db->readIn($column, $values);
    }

    public function all() {
        return $this->db->read();
    }
    public function getNotDeleted(){
        return $this->db->readNotDeleted();
    }
    public function disableItem($where){
        $this->db->disable($where);
    }

    public function getManyToMany($parentTable,$pivotTable,$parentCalumn,$pivotCalumn,$where=['1'=>'1']){
        $pdo = $this->db->connection->connection(); 
        array_walk($where,function(&$value,$key){
            $value = "$key = '$value'";
        });
        $sql = sprintf("SELECT * FROM $parentTable INNER JOIN $pivotTable ON
                $pivotTable.$pivotCalumn=$parentTable.$parentCalumn WHERE %s",implode("AND",$where));
        return $pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function setManyToManyRelation($clinic_id, $section_id, $pivot_table) {
        $pivot = Database::onTable($pivot_table)->insert(compact('clinic_id', 'section_id'));
    }
    

}