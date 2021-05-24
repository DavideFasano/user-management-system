<?php

namespace sarassoroberto\usm\service;

use sarassoroberto\usm\model\UserModel;

class UserSession {

    //session_start();
    //istruzione per accendere la sessione

    public function __construct() {
        session_start();
    }

    public function autenticate(string $email, string $password)
    {
        $um = new UserModel();
        $user = $um->autenticate($email,$password);

        if(!is_null($user)){
            $_SESSION['user_autenticated'] = $user;
            return $user;
        }else{
            //unset distrugge una variabile
            unset($_SESSION['user_autenticated']);
        }
    }

    public function isAutenticated(){
        if(isset($_SESSION['user_autenticated'])){
            return true;
        }else{
            return false;
        }
    }

    public function redirect(){
        if(!$this->isAutenticated()){
            header('location: login_user.php');
        }
    }

    public function logOut(){
        unset($_SESSION['user_autenticated']);
    }

}