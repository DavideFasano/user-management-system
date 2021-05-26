<?php

use sarassoroberto\usm\model\UserModel;
use sarassoroberto\usm\service\UserSession;
use sarassoroberto\usm\validator\bootstrap\ValidationFormHelper;

require "./__autoload.php";

//session_start();

$action = './login_user.php';
$submit = 'accedi';

if($_SERVER['REQUEST_METHOD']==='GET'){

    list($email,$emailClass,$emailClassMessage,$emailMessage) = ValidationFormHelper::getDefault();
    list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getDefault();
    $loginMessage='';

}

if($_SERVER['REQUEST_METHOD']==='POST'){

    //list($email,$emailClass,$emailClassMessage,$emailMessage) = ValidationFormHelper::getDefault();
    //list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getDefault();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cryptPassw = md5($password);
    //var_dump($email);
    //var_dump($password);
    if($email && $cryptPassw){
        $user = (new UserSession())->autenticate($email,$cryptPassw);
        if(!is_null($user)){
            header('location: ./list_users.php');
        }else{
            $loginClass = "is-invalid";
            $loginClassMessage = "Invalid-feedback";
            $loginMessage = "Email o Password errata!";
        }
    }else{
        $loginClass = "is-invalid";
        $loginClassMessage = "Invalid-feedback";
        $loginMessage = "Compila le credenziali";
    }
    

    

    //var_dump($prova->autenticate($email,$password));

    


}
include './src/view/login_user_view.php';