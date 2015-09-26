<?php
require_once __DIR__ . '/../model/Poll.php';
require_once __DIR__ . '/../model/Rating.php';
if(isset($_POST['poll_idUp']) && isset($_POST['user_idUp'])){
    $polls_id = $_POST['poll_idUp'];
    $user_id = $_POST['user_idUp'];

    if(Rating::add($user_id, $polls_id)){
        if(Poll::ratingUp($polls_id)){
            $rate = Poll::getRatingById($polls_id);
            $rating = 0;
            foreach ($rate as $ratingg) {
                $rating = $ratingg->rating;
            }
            echo $rating;
        }
    }else echo 33;
}else echo 3;