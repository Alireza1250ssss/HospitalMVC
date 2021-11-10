<?php

namespace App\Controller;

use App\Models\Clinic;
use App\Core\Database\MySql\Database;

class ClinicController {


    public function handle(){
        if($_POST['action'] == 'delete-clinic')
            Clinic::do()->softDelete(['id' => $_POST['id']]);
        else if($_POST['action'] == 'disable-clinic')
            Clinic::do()->disableItem(['id' => $_POST['id']]);
        else if($_POST['action'] == 'update'){
            $data = json_decode($_POST['data']);
            $id = array_pop($data);
            Clinic::do()->update(
                [
                    'name' => $data[0],
                    'address' => $data[1],
                    'phone' => $data[2],
                    'is_active' => intval($data[3]),
                    'is_full_time' => intval($data[4]),
                ], [ 'id' => intval($id) ]
            );
            $date= date("Y-m-d H:i:s");
            Database::onTable('clinics')->update(['upadated_at' => $date],['id' => $id]);
        }
        else if($_POST['action'] == 'insert'){
            $data = json_decode($_POST['data']);
            Clinic::do()->create([
                'name' => $data[0],
                'address' => $data[1],
                'phone' => $data[2],
                'is_active' => intval($data[3]),
                'is_full_time' => intval($data[4])
            ]);
        }
    }

   
}