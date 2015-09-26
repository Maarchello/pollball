<?php

require_once __DIR__ . '/../classes/DataBase.php';

class Comments {

    public static function add($name, $text, $poll_id){
        $db = new DataBase();
        $result = $db->insert("insert into comments (name, text, poll_id) values ('$name', '$text', '$poll_id')");
        return $result;
    }

    public static function get($poll_id, $num){
        $db = new DataBase();
        return $db->query("select * from comments where poll_id = '$poll_id' limit $num, 10", 'Comments');
    }

    public static function getAll($poll_id, $num){
        $db = new DataBase();
        return $db->query("select * from comments where poll_id = '$poll_id' limit $num, 500000", 'Comments');
    }

    public static function countComments($poll_id){
        $db = new DataBase();
        $res = $db->forExist("select * from comments where poll_id = '$poll_id'");
        $count = mysqli_num_rows($res);
        return $count;
    }


}