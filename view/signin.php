<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Добро пожаловать в pollball! Войдите или зарегестрируйтесь.</title>
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <link rel="icon" href="../../sn/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../../sn/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="../../sn/js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $(".button_h").on('click', function(){
            $.ajax({
                url: "controller/login.php",
                type: "POST",
                data: ({email:$("#email").val(), password:$("#password").val()}),
                dataType: "html",
                beforeSend: wait,
                success: succ
            });
        });
        });

        function wait(){
            $("#auth").text("Проверка данных..");
        }

        function succ(data){
            if (data==1){
                location.reload();
            }else if(data==0){
                $("#auth").text("Неверный логин или пароль.");
            }else alert("ss");
        }

    </script>
</head>
<body>
<a href="/"> <div id="flogo"></div></a>
<div id="login">
    <form method="post" action="controller/login.php" id="form">
        <br>
        <span class="text_about"><h4 align="center" class="text_about">ВХОД</h4></span>
        <input class='input' type="email" id="email" name="email" placeholder="email@example.com" required><br><br>
        <br>
        <input class='input' type="password" id="password" name="password" placeholder="Пароль" required><a href="" class="forgot">Забыли пароль?</a><br><br>
        <div id="auth"></div><br>
        <input class='button_h' type="button" value="Войти">
    </form><br>
    <span class="text_about"><p align="center">Впервые у нас? <a href="view/signup.php" class="registr">Скорее регистрируйся!</a></p></span>
</div>
<div id="foot"></div>
</body>
</html>
