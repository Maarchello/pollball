<?php
require_once __DIR__ . '/../model/Poll.php';
require_once __DIR__ . '/../model/Rating.php';
if(isset($_POST['poll_idDown']) && isset($_POST['user_idDown'])){
    $polls_id = $_POST['poll_idDown'];
    $user_id = $_POST['user_idDown'];

    if(Rating::add($user_id, $polls_id)){
        if(Poll::ratingDown($polls_id)){
            $rate = Poll::getRatingById($polls_id);
            $rating = 0;
            foreach ($rate as $ratingg) {
                $rating = $ratingg->rating;
            }
            echo $rating;
        }
    }else echo 33;
}else echo 3;
