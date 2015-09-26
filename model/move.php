<?php

require_once __DIR__ . '/../classes/DataBase.php';
require_once __DIR__ . '/../model/Rating.php';
require_once __DIR__ . '/../model/Poll.php';
require_once __DIR__ . '/../model/User.php';

$db = new DataBase();
$pol = $db->query("select * from poll where flag=1 order by rating DESC limit 10");

foreach ($pol as $pp) {
    $date = @date("ymdhis");
    $id = $pp->id;
    $db->update("update poll set flag=0, datetime = '$date' where id = '$id'");
}
