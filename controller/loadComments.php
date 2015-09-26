<?php
require_once __DIR__ .'/../model/Comments.php';


if(isset($_POST['numComments']) && isset($_POST['polls_id'])){

    $num =$_POST['numComments'];
    $polls_id = $_POST['polls_id'];
    $comments = Comments::getAll($polls_id, $num);
    foreach ($comments as $comment){
    echo "<strong><a href='profile/?name=$comment->name'>$comment->name</a></strong>: $comment->text <br>";
}
}else echo 0;