<head>
    <meta charset="utf-8">
</head>

<?php
require_once __DIR__ . '/../model/Poll.php';
require_once __DIR__ . '/../model/Comments.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/Results.php';
if(isset($_POST['numPolls'])){
    $num = $_POST['numPolls'];
    $inter = Poll::getAllForFeed($num);
  foreach ($inter as $polls): ?>
    <div class="feed_cart">
        <div id="feed_profile">
            <?php $userId = $polls->user_id;
            $author = Poll::getAuthor($userId);
            echo  '<a href="'.$author.'">' .  $author . '</a>'; ?></div>
        <div id="feed_question"><?php echo $polls->question; ?></div><br>

        <?php if(Results::exist(User::getUserId($_COOKIE['email']), $polls->id)) {?>

        <div id="answers<?php echo $polls->id ?>" class="answers"><?php
            if(!empty($polls->opt1)){?>
                <input type="radio" name="answer" value="<?php echo 'opt1' ?>"><?php echo $polls->opt1 ?><br><br>
            <?php }
            if(!empty($polls->opt2)) {?>
                <input type="radio" name="answer" value='<?php echo 'opt2' ?>'><?php echo $polls->opt2 ?><br><br>
            <?php }
            if(!empty($polls->opt3)) {?>
                <input type="radio" name="answer" value="<?php echo 'opt3' ?>"><?php echo $polls->opt3 ?><br><br>
            <?php }
            if(!empty($polls->opt4)) {?>
                <input type="radio" name="answer" value="<?php echo 'opt4' ?>"><?php echo $polls->opt4 ?><br><br>
            <?php }
            if(!empty($polls->opt5)) {?>
                <input type="radio" name="answer" value="<?php echo 'opt5' ?>"><?php echo $polls->opt5 ?><br><br>
            <?php }
            $polls_id = $polls->id;
            $GLOBALS['poll_id'] = $polls_id;
            $comments = Comments::get($polls_id, 0);?>

            <input type="button" id="sendResult<?php echo $polls->id; ?>" class="sendResult" onclick="sendResult(<?php echo $polls->id; ?>, <?php echo User::getUserId($_COOKIE['email']); ?>)" value="Голосовать"><br><br><br></div><br>

          <div id="block<?php echo $polls_id; ?>" class="block">
            <?php foreach ($comments as $comment){
                echo "<strong><a href='profile/?name=$comment->name'>$comment->name</a></strong>: $comment->text <br>";
            }?>
        </div><br>
        <?php
        $countComment = Comments::countComments($polls_id);
        if($countComment>10){
        ?>
            <div id="loadComments<?php echo $polls_id; ?>" class="loadComments" onclick="loadComments(<?php echo $polls_id; ?>);">Загрузить все</div>
        <?php } ?>

        <input type="button" class="add_comment2" id="btnid<?php echo $polls_id; ?>" onclick="ajax('<?php echo $_COOKIE['name'] ?>', '<?php echo $polls_id; ?>', document.getElementsByClassName('add_comment'), document.getElementById('comment'+'<?php echo $polls_id; ?>').value, document.getElementById('block'+'<?php echo $polls_id; ?>'));">
        <input type="text" class="add_comment" id="comment<?php echo $polls_id; ?>"  placeholder="Поделись своим мнением">
        <?php } else {
            $r1 = $polls->result1;
            $r2 = $polls->result2;
            $r3 = $polls->result3;
            $r4 = $polls->result4;
            $r5 = $polls->result5;
            $sum = $r1+$r2+$r3+$r4+$r5;
            ?>
            <div id="results<?php echo $polls->id ?>" class="results">

                <strong><?php echo $polls->opt1 ?>:<br></strong>
                <?php if($polls->result1!=0) {?><div class="progress" style="width:<?php echo ($polls->result1*100)/($sum); ?>%"><?php echo $polls->result1; ?> - <?php echo round(($polls->result1*100)/($sum),2); ?>%</div><br>
                <?php }else { ?>
                    <div class="progress" style="width: 9%; background: lightskyblue">0 - <?php echo round(($polls->result1*100)/($sum),2); ?>%</div><br>
                <?php } ?>


                <strong><?php echo $polls->opt2 ?>:<br></strong>
                <?php if($polls->result2!=0) { ?><div class="progress" style="width:<?php echo ($polls->result2*100)/($sum); ?>%"><?php echo $polls->result2 ?> - <?php echo round(($polls->result2*100)/($sum),2); ?>%</div><br>
                <?php }else { ?>
                    <div class="progress" style="width: 9%; background: lightskyblue">0 - <?php echo round(($polls->result2*100)/($sum),2); ?>%</div><br>
                <?php } ?>

                <strong><?php if(empty($polls->opt3)) {echo '3';} else echo $polls->opt3 ?>:<br></strong>
                <?php if($polls->result3!=0) { ?><div class="progress" style="width:<?php echo ($polls->result3*100)/($sum); ?>%"><?php echo $polls->result3 ?> - <?php echo round(($polls->result3*100)/($sum),2); ?>%</div><br>
                <?php }else { ?>
                    <div class="progress" style="width: 9%; background: lightskyblue">0 - <?php echo round(($polls->result3*100)/($sum),2); ?>%</div><br>
                <?php } ?>


                <strong><?php if(empty($polls->opt4)) {echo '4';} else echo $polls->opt4 ?>:<br></strong>
                <?php if($polls->result4!=0) { ?><div class="progress" style="width:<?php echo ($polls->result4*100)/($sum); ?>%"><?php echo $polls->result4 ?> - <?php echo round(($polls->result4*100)/($sum),2); ?>%</div><br>
                <?php }else { ?>
                    <div class="progress" style="width: 9%; background: lightskyblue">0 - <?php echo round(($polls->result4*100)/($sum),2); ?>%</div><br>
                <?php } ?>


                <strong><?php if(empty($polls->opt5)) {echo '5';} else echo $polls->opt5 ?>:<br></strong>
                <?php if($polls->result5!=0) { ?><div class="progress" style="width:<?php echo ($polls->result5*100)/($sum); ?>%"><?php echo $polls->result5 ?> - <?php echo round(($polls->result5*100)/($sum),2); ?>%</div><br>
                <?php }else { ?>
                    <div class="progress" style="width: 9%; background: lightskyblue">0 - <?php echo round(($polls->result5*100)/($sum),2); ?>%</div><br>
                <?php } ?>
            </div><br>
            <?php
            $polls_id = $polls->id;
            $GLOBALS['poll_id'] = $polls_id;
            $comments = Comments::get($polls_id, 0);
            ?>

            <div id="block<?php echo $polls_id; ?>" class="block">
                <?php foreach ($comments as $comment){
                    echo "<strong><a href='profile/?name=$comment->name'>$comment->name</a></strong>: $comment->text <br>";
                }?>
            </div><br>
            <?php
            $countComment = Comments::countComments($polls_id);
            if($countComment>10){
                ?>
                <div id="loadComments<?php echo $polls_id; ?>" class="loadComments" onclick="loadComments(<?php echo $polls_id; ?>);">Загрузить все</div><br>
            <?php } ?>

            <input type="text" class="add_comment" id="comment<?php echo $polls_id; ?>"  placeholder="Поделись своим мнением">
            <input type="button" class="add_comment2" id="btnid<?php echo $polls_id; ?>" onclick="ajax('<?php echo $_COOKIE['name'] ?>', '<?php echo $polls_id; ?>', document.getElementsByClassName('add_comment'), document.getElementById('comment'+'<?php echo $polls_id; ?>').value, document.getElementById('block'+'<?php echo $polls_id; ?>'));">

        <?php }?>
    </div>

<?php endforeach; } ?>

