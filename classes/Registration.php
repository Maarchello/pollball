<?php

require_once __DIR__ . '/../boot.php';
require_once __DIR__ . '/../model/User.php';

class Registration {

    private static function checkLength($value, $min, $max){
        $result = (mb_strlen($value)<$min || mb_strlen($value)>$max);
        return !$result;
    }

    private static function clean($value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    private static function checkPasswords($password, $rePassword){
        if($password===$rePassword){
            return true;
        }
        return false;
    }


    public static function signup($email, $password, $rePassword, $name){

        $email = self::clean($email);
        $password = self::clean($password);
        $rePassword = self::clean($rePassword);
        $password = md5($password);
        $rePassword = md5($rePassword);
        $name = self::clean($name);
        $name = strtolower($name);

        $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);

        if(!empty($email) && !empty($password) && !empty($name)){
            if(self::checkPasswords($password, $rePassword)){
                if(self::checkLength($email, 2, 60) && self::checkLength($password, 4, 64)){
                    if($email_validate){
                        if(User::existEmail($email)){
                            if(User::existName($name)){
                                User::addNew($email, $password, $name);
                                return 1;
                            } else return 2;
                        } else return 3;
                    } else return 4;
                } else return 5;
            } else return 6;
        } else return 7;
        //7 - значений нет
        //6-пароли разные
        //5-слишком короткий пароль
        //4 - неверный емаил
        //3 - есть такой емаил
        //2- есть такое имя
        //1-все норм
    }

}
