<?php

namespace App\Controller;

use App\Core\View;
use App\Models\Admin;
use App\Models\Clinic;
use App\Models\Section;
use App\Core\Database\MySql\Database;
use App\Core\File;
use App\Exceptions\NoAccessException;
use App\Core\Validation;

class AdminController {

    public function handle(){

        if($_POST['action'] == 'delete-admin'){
           $path = Database::onTable('admin_details')->read(['adminId' => $_POST['id']]);
           unlink("../".$path[0]['imgpath']);
           Admin::do()->delete(['id' => $_POST['id']]);
        }
        else if($_POST['action'] == 'disable-admin'){
            Admin::do()->disableItem(['id' => $_POST['id']]);
        }
        else if($_POST['action'] == 'update'){
            $data = json_decode($_POST['data']);
            $id = array_pop($data);
            Admin::do()->update([
                'username' => $data[0],
                'is_active' => intval($data[1]),
            ], [ 'id' => intval($id) ]);
        }
        else if($_POST['action'] == 'insert'){
            $data = json_decode($_POST['data']);
            $data[1] = password_hash($data[1],PASSWORD_DEFAULT);
            if(!Validation::emailCheck($data[2])){
                addToSession('error','incorrect input');
                return;
            }
            Admin::do()->create([
                'username' => $data[0],
                'password' => $data[1],
                'email' => $data[2],
                'is_active' => intval($data[3]),
            ]);
        }
        else if($_POST['action'] == 'update-image'){
            $oldimg = Database::onTable('admin_details')->read(['adminId' => $_POST['id']]);
            $path = $this->updateImage($oldimg[0]['imgpath']);
            Database::onTable('admin_details')->update(['imgpath' => $path],['adminId' => $_POST['id']]);
            header("Location:/Hospital/adminDashboard");
        }
    }


    private function showDashboard(){
        $profileInfo = Admin::getProfile($_SESSION['loggedIn']);
        $clinicList = Clinic::do()->getNotDeleted();
        $clinicDeletedList = Clinic::do()->getDeleted();
        $sectionList = Section::do()->all();
        $adminList = Admin::do()->all();
        $c_s = Clinic::do()->getManyToMany('sections','clinic_section','id','section_id');
        (new View('AdminDashboard',[
            "clinicList" => $clinicList,
            "sectionList" => $sectionList,
            "adminList" => $adminList,
            "profileInfo" => $profileInfo[0],
            "clinicDeletedList" => $clinicDeletedList,
            "clinic_section" => $c_s
        ]))->render();
    }

    private function updateImage($oldimg){
        if(file_exists($oldimg))
            File::remove($oldimg);

        return File::getInstance($_FILES['profile'])->validate([
            'checkSize' => [4000],
            'checkType' => ['image']
        ],['callback' => 'save' , 'params' => []]);
    }

    public function __call($name, $arguments)
    {
        if(isset($_SESSION['loggedIn']))
            call_user_func_array([$this,$name], []);
        else
            throw new NoAccessException();
    }

}


