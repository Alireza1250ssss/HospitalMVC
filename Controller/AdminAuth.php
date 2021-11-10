<?php

namespace App\Controller;

use App\Models\Admin;
use App\Core\View;
use App\core\Validation;

class AdminAuth {
    public function showLogin(){
        if(isset($_SESSION['loggedIn'])){
            header("Location:\Hospital\adminDashboard");
        }
        (new View('AdminLogin'))->render();
    }
    public function doTheLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(!Validation::emailCheck($email))
            addToSession('error','email error');
        $result = Admin::do()->find($email, 'email');
        if(password_verify($password,$result['password']))
            addToSession('loggedIn' , $result['id']);
        header("Location:\Hospital\adminLogin");
    }
    
}