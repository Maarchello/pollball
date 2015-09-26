<?php

require_once __DIR__ . '/../model/Comments.php';

$name = $_COOKIE['name'];
$comment = $_POST['comment'];
$poll_id = $_POST['poll_id'];

if(!empty($comment)) {
    if (Comments::add($name, $comment, $poll_id)) {
        echo 1;
    }else echo 0;
}