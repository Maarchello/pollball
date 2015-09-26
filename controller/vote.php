<?php

require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/Poll.php';

function setNull($option){
//    $option = trim($option);
    if(empty($option)) $option='';
    return $option;
}

$question = $_POST['question'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];
$option5 = $_POST['option5'];
$question = setNull($question);
$option3 = setNull($option3);
$option4 = setNull($option4);
$user_id = User::getUserId($_COOKIE['email']);


if(!empty($question)){
    if(!empty($option1)){
        if(!empty($option2)){
            if(Poll::addPoll($question, $option1, $option2, $option3, $option4, $option5, $user_id)){
                echo 1;
            }else echo -1;
        }else echo 2;
    }else echo 3;
}else echo 4;
//4-нету вопроса
//3 - нету первого варинта
//2 - нету второго варианта
//1 - все ок
//-1 - не добавилось


?>