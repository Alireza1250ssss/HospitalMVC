<?php

namespace App\Controller;

use App\Models\Section;

class SectionController {

    public function handle(){
        if($_POST['action'] == 'delete-section')
            Section::do()->delete(['id' => $_POST['id']]);
        else if($_POST['action'] == 'disable-section')
            Section::do()->disableItem(['id' => $_POST['id']]);
        else if($_POST['action'] == 'update'){
            $data = json_decode($_POST['data']);
            $id = array_pop($data);
            Section::do()->update([
                'title' => $data[0],
                'is_active' => intval($data[1])
            ], [ 'id' => intval($id) ]);
        }
        else if($_POST['action'] == 'insert'){
            $data = json_decode($_POST['data']);
            Section::do()->create([
                'title' => $data[0],
                'is_active' => intval($data[1])
            ]);
        }
    }

}