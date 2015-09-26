<?php

require_once __DIR__ . '/../model/Poll.php';
require_once __DIR__ . '/../model/Results.php';

$result = $_POST['option'];
$poll_id = $_POST['poll_id'];
$user_id = $_POST['user_id'];

if($result=='opt1'){
    $result = 'result1';

    if(Results::add($user_id, $poll_id)){
        Poll::ratingOptUp($poll_id, $result);
        echo draw2($poll_id);
    }else echo 2;
}elseif($result=='opt2'){
    $result = 'result2';


    if(Results::add($user_id, $poll_id)){
        Poll::ratingOptUp($poll_id, $result);
        echo draw2($poll_id);
    }else echo 2;
}elseif($result=='opt3'){
    $result = 'result3';

    if(Results::add($user_id, $poll_id)){
        Poll::ratingOptUp($poll_id, $result);
        echo draw2($poll_id);
    }else echo 2;
}elseif($result=='opt4'){
    $result = 'result4';

    if(Results::add($user_id, $poll_id)){
        Poll::ratingOptUp($poll_id, $result);
        echo draw2($poll_id);
    }else echo 2;
}elseif($result=='opt5'){
    $result = 'result5';

    if(Results::add($user_id, $poll_id)){
        Poll::ratingOptUp($poll_id, $result);
        echo draw2($poll_id);
    }else echo 2;

}else {
    echo 5;
    return;
}

function draw($poll_id){
    $inter = Poll::getOne($poll_id);
    foreach ($inter as $poll) {
        echo $poll->opt1 . '-' . $poll->result1;
        echo '<br>';
        echo $poll->opt2 . '-' . $poll->result2;
        echo '<br>';
        if(!empty($poll->opt3)){echo $poll->opt3 . '-' . $poll->result3;}
        echo '<br>';
        if(!empty($poll->opt4)){echo $poll->opt4 . '-' . $poll->result4;}
        echo '<br>';
        if(!empty($poll->opt5)){echo $poll->opt5 . '-' . $poll->result5;}
        echo '<br>';
    }

}

function draw2($poll_id)
{
    $pollss = Poll::getOne($poll_id);
    foreach ($pollss as $polls) {
        $r1 = $polls->result1;
        $r2 = $polls->result2;
        $r3 = $polls->result3;
        $r4 = $polls->result4;
        $r5 = $polls->result5;
        $sum = $r1 + $r2 + $r3 + $r4 + $r5;?>

        <div id="results<?php echo $polls->id ?>" class="results" style="width:90%; margin-left: -5%">
        <?php echo $polls->opt1 ?>:<br>
        <?php if ($polls->result1 != 0) { ?>
            <div class="progress" style="width:<?php echo ($polls->result1 * 100) / ($sum); ?>%"><?php echo $polls->result1; ?>
            - <?php echo round(($polls->result1 * 100) / ($sum), 2); ?>%</div><br>
        <?php } else { ?>
            <div class="progress" style="width: 9%; background: lightskyblue">0
                - <?php echo round(($polls->result1 * 100) / ($sum), 2); ?>%
            </div><br>
        <?php } ?>


        <strong><?php echo $polls->opt2 ?>:<br></strong>
        <?php if ($polls->result2 != 0) { ?>
            <div class="progress"
                 style="width:<?php echo ($polls->result2 * 100) / ($sum); ?>%"><?php echo $polls->result2 ?>
            - <?php echo round(($polls->result2 * 100) / ($sum), 2); ?>%</div><br>
        <?php } else { ?>
            <div class="progress" style="width: 9%; background: lightskyblue">0
                - <?php echo round(($polls->result2 * 100) / ($sum), 2); ?>%
            </div><br>
        <?php } ?>

        <strong><?php if (empty($polls->opt3)) {
                echo '3';
            } else echo $polls->opt3 ?>:<br></strong>
        <?php if ($polls->result3 != 0) { ?>
            <div class="progress"
                 style="width:<?php echo ($polls->result3 * 100) / ($sum); ?>%"><?php echo $polls->result3 ?>
            - <?php echo round(($polls->result3 * 100) / ($sum), 2); ?>%</div><br>
        <?php } else { ?>
            <div class="progress" style="width: 9%; background: lightskyblue">0
                - <?php echo round(($polls->result3 * 100) / ($sum), 2); ?>%
            </div><br>
        <?php } ?>


        <strong><?php if (empty($polls->opt4)) {
                echo '4';
            } else echo $polls->opt4 ?>:<br></strong>
        <?php if ($polls->result4 != 0) { ?>
            <div class="progress"
                 style="width:<?php echo ($polls->result4 * 100) / ($sum); ?>%"><?php echo $polls->result4 ?>
            - <?php echo round(($polls->result4 * 100) / ($sum), 2); ?>%</div><br>
        <?php } else { ?>
            <div class="progress" style="width: 9%; background: lightskyblue">0
                - <?php echo round(($polls->result4 * 100) / ($sum), 2); ?>%
            </div><br>
        <?php } ?>


        <strong><?php if (empty($polls->opt5)) {
                echo '5';
            } else echo $polls->opt5 ?>:<br></strong>
        <?php if ($polls->result5 != 0) { ?>
            <div class="progress"
                 style="width:<?php echo ($polls->result5 * 100) / ($sum); ?>%"><?php echo $polls->result5 ?>
            - <?php echo round(($polls->result5 * 100) / ($sum), 2); ?>%</div><br>
        <?php } else { ?>
            <div class="progress" style="width: 9%; background: lightskyblue">0
                - <?php echo round(($polls->result5 * 100) / ($sum), 2); ?>%
            </div><br>
        <?php }?>
        </div><br><?php
    }
}