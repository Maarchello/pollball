<?php

require_once __DIR__ . '/../classes/DataBase.php';

class Poll {

    public $id;
//    public $question;
    public $option1;
    public $option2;
    public $option3;
    public $option4;
    public $option5;
    public $user_id;

    public static function getRatingById($poll_id){
        $db = new DataBase();
        return $db->query("select rating from poll where id = '$poll_id'");
    }

    public static function getAllForFeed($num){
        $db = new DataBase();
        $result = $db->query("select * from poll where flag = 0 order by datetime DESC limit $num, 10", 'Poll');
        return $result;
    }

    public static function getAllForSandbox($num){
        $db = new DataBase();
        $result = $db->query("select * from poll where flag = 1 order by id DESC limit $num, 20", 'Poll');
        return $result;
    }


    public static function getAuthor($user_id){

        $db = new DataBase();
        $res = $db->query("select name from user where id = '$user_id'");
        foreach ($res as $need) {
            $name = $need->name;
            return $name;
        }
        return "Не удалось распознать имя, сообщите об это администратору";
    }

    public static function addPoll($question, $opt1, $opt2, $opt3, $opt4, $opt5, $user_id){
        $db = new DataBase();
        $result = $db->insert("insert into poll (question, opt1, opt2, opt3, opt4, opt5, user_id) values ('$question', '$opt1', '$opt2', '$opt3', '$opt4', '$opt5', '$user_id')");
        return $result;
    }

    public static function ratingUp($poll_id){
        $db = new DataBase();
        return $db->update("update poll set rating = rating+1 where id = '$poll_id'");
    }

    public static function ratingDown($poll_id){
        $db = new DataBase();
        return $db->update("update poll set rating = rating-1 where id = '$poll_id'");
    }

    public static function ratingOptUp($poll_id, $result){
        $db = new DataBase();
        return $db->update("update poll set $result = $result+1 where id = '$poll_id'");
    }

    public static function getOne($poll_id){
        $db = new DataBase();
        return $db->query("select * from poll where id = '$poll_id'");
    }

}