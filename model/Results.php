<?php

require_once __DIR__ . '/../classes/DataBase.php';

class Results {

    public static function add($user_id, $poll_id){
        $db = new DataBase();
        return $db->insert("insert into results (user_id, poll_id) values ('$user_id', '$poll_id')");
    }

    public static function exist($user_id, $poll_id){
        $db = new DataBase();
        $ras = $db->forExist("select * from results where user_id='$user_id' and poll_id='$poll_id'");
        $num = mysqli_num_rows($ras);
        if($num==0){
            return true;
        }
        return false;
    }

}