<?php
require_once __DIR__ . '/../boot.php';

$regEmail = $_POST['regEmail'];
$regPassword = $_POST['regPassword'];
$regRePassword = $_POST['regRePassword'];
$regUserName = $_POST['regUserName'];

//$check = Registration::signup($regEmail, $regPassword, $regRePassword, $regUserName);
//
//if($check==4) {echo 4;}
//else if ($check==3) {echo 3;}
//else if ($check==2) {echo 2;}
//else if ($check==1) {echo 1;}

if (Registration::signup($regEmail, $regPassword, $regRePassword, $regUserName) == 1) echo 1;
elseif (Registration::signup($regEmail, $regPassword, $regRePassword, $regUserName) == 2) echo 2;
elseif (Registration::signup($regEmail, $regPassword, $regRePassword, $regUserName) == 3) echo 3;
elseif (Registration::signup($regEmail, $regPassword, $regRePassword, $regUserName) == 4) echo 4;
elseif (Registration::signup($regEmail, $regPassword, $regRePassword, $regUserName) == 5) echo 5;
elseif (Registration::signup($regEmail, $regPassword, $regRePassword, $regUserName) == 6) echo 6;
elseif (Registration::signup($regEmail, $regPassword, $regRePassword, $regUserName) == 7) echo 7;
else echo 8;