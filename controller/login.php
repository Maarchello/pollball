<?php
require_once '../boot.php';

$email = $_POST['email'];
$password = $_POST['password'];

if(LogInOut::login($email, $password)){
    echo 1;
}else echo 0;
?>

