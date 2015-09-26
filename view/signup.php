<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Регистрация на NAME</title>
    <link rel="icon" href="../../sn/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../../sn/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/general.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".button_r").on("click", function(){
//                $("#registration").hide();
                $.ajax({
                    url: "../controller/reg.php",
                    type: "POST",
                    data:({regEmail: $("#regEmail").val(), regPassword: $("#regPassword").val(), regRePassword: $("#regRePassword").val(), regUserName: $("#regUserName").val()}),
                    dataType:"html",
                    success: regSuccess
                });
            });
        });

        function regSuccess(data){
            if(data==7) {$("#registration").text("Заполните все поля.")}
            else if(data==6) {$("#registration").text("Пароли не совпадают.");}
            else if(data==5) {$("#registration").text("Слишком короткий пароль.");}
            else if(data==4) {$("#registration").text("Неверный email.");}
            else if(data==3) {$("#registration").text("Пользователь с таким email уже существует, а ты еще нет.");}
            else if(data==2) {$("#registration").text("Пользователь с таким именем уже существует, а ты еще нет.");}
            else if(data==1) {
                $("#registration").hide();
                $("#success").show();}
            else if(data==8) alert('Попробуй ввести все правильно');
        }
    </script>
</head>
<body>
<div class="header">
    <a href="../index.php" class="out"><button class="button_m">На главную</button></a>
</div>

<div id="reg">
    <form method="post" action="../controller/reg.php" class="form"><br>
        <h4 class="text_about">ЗАПОЛНИТЕ ДАННЫЕ</h4>
        <input class="input" type="email" name="regEmail" id="regEmail" placeholder="email@example.com" required><span class="star">*</span><br><br>
        <input class="input" type="password" name="regPassword" id="regPassword" placeholder="Пароль" required><span class="star">*</span><br><br>
        <input class="input" type="password" name="regPassword2" id="regRePassword" placeholder="Подтвердите пароль" required><span class="star">*</span><br><br>
        <input class="input" type="text" name="regUserName" id="regUserName" placeholder="nameSurname" maxlength="30" required><span class="star">*</span><br><br>
        <div id="registration" style="display: block"><span></span></div><br>
        <div id="success" style="display: none"><span>Регистрация прошла успешно, <a href="../index.php">теперь войдите.</a></span></div><br>
        <input class="button_r" type="button" value="Зарегистрироваться">
    </form>
</div>
</body>
</html>