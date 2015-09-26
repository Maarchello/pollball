<?php
require_once 'boot.php';
//header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
    <script type="text/javascript" src="js/popup.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
<?php
if (empty($_COOKIE['email']) || empty($_COOKIE['password'])){
    require_once __DIR__ . '/view/signin.php';
}
else {
    require __DIR__ . '/view/feed.php';
}

?>

</html>

<script type="text/javascript">
</script>