<?php

require_once '../boot.php';
require_once '../model/User.php';

class LogInOut {

    public static function clean($value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }



    public static function checkUserData($email, $password){
        $user = User::getUser($email);
        if($user==false) {
            return false;
        }else {
            foreach($user as $u){
                $uPassword = $u->password;
            }
            $compare = $uPassword == $password;
            return $compare;
        }
    }

    public static function login($email, $password){
        $email = self::clean($email);
        $password = self::clean($password);
        $password = md5($password);
        $name = User::getNameByEmail($email);

        if(!empty($email) && !empty($password) && self::checkUserData($email, $password)){

            setcookie('email', $email, time()+172800, '/');
            setcookie('password', $password, time()+172800,'/');
            setcookie('name', $name, time()+172800, '/');
            return true;

        }else {
            return false;
        }
    }
    
    public static function out(){
        setcookie('email', $_COOKIE['email'], time()-173800, '/');
        setcookie('password', $_COOKIE['password'], time()-173800,'/');
        setcookie('name', $_COOKIE['name'], time()-173800, '/');
        sleep(1);
        header("Location: ../index.php");
    }

}