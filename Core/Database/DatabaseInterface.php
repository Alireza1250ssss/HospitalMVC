<?php


namespace App\Core\Database;

interface DatabaseInterface {

    public function setTable(string $table);

    public function insert(array $data);

    public function update(array $data, array $where = []);

    public function remove(array $where = []);

    public function read(array $where = []);
}