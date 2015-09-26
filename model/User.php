<?php
require_once __DIR__ . '/../boot.php';
require_once __DIR__ . '/../configs/db.php';
class User {

    public $id;
    public $email;
    public $password;
    public $name;
    public $quest_id;

    public static function addNew($email, $password, $name) {
        if(self::existEmail($email)===true && self::existName($name)===true){
            $db = new DataBase();
            $db->insert("insert into user (email, password, name) VALUES ('$email', '$password', '$name')");
        }else {
            echo 'fail';
        }
    }

    public static function getUser($email){
        $db = new DataBase();

        if($user = $db->query("select * from user where email = '$email'", 'User')){
            if(empty($user)) return false;
            return $user;
        }
        return 'error';
    }

    public static function existEmail($email){
        $db = new DataBase();
        $user = $db->forExist("select * from user where email = '$email'");
        $num = mysqli_num_rows($user);
        if($num==0){
            return true;
        }
        return false;
    }

    public static function existName($name){
        $db = new DataBase();
        $user = $db->forExist("select * from user where name = '$name'");
        $num = mysqli_num_rows($user);
        if($num==0){
            return true;
        }
        return false;
    }

    public static function getUserId($email){
        $db = new DataBase();
        $res = $db->query("select id from user where email = '$email'");
        foreach ($res as $need) {
            $id = $need->id;
            return $id;
        }
        return false;
    }

    public static function getNameByEmail($email){
        $db = new DataBase();
        $res = $db->query("select name from user where email = '$email'");
        foreach ($res as $need) {
            $name = $need->name;
            return $name;
        }
        return false;
    }


}