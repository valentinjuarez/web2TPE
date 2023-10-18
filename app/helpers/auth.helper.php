<?php

class AuthHelper {

    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }else{
            return true;
        }
    }

    public static function login($user) {
        AuthHelper::init();
        $_SESSION['email'] = $user->email;
        $_SESSION['password'] = $user->password;
        
    }

    public static function logout() {
        AuthHelper::init();
        session_destroy();
        header('Location: ' . BASE_URL);
    }

    public static function verify() {
        AuthHelper::init();
        if (isset($_SESSION['user'])) {
            if($_SESSION['tipouser']=="administrador"){
                return "administrador";
            }
            else if($_SESSION['tipouser']=="Usuario"){
                return "Usuario";
            }
        }
        else {
            return "anonimo";
        }
    }

    public static function checkSession(){
        AuthHelper::init();
        if(isset($_SESSION['user'])){
            return true;
        }
        return false;     
    }
}
?>