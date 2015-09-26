<?php

require_once __DIR__ . '/../classes/DataBase.php';

class Rating {

    public static function add($user_id, $poll_id){
        $db = new DataBase();
        return $db->insert("insert into rating (user_id, poll_id) values ('$user_id', '$poll_id')");
    }

    public static function exist($user_id, $poll_id){
        $db = new DataBase();
        $rate = $db->forExist("select * from rating where user_id='$user_id' and poll_id='$poll_id'");
        $num = mysqli_num_rows($rate);
        if($num==0){
            return true;
        }
        return false;
    }

}