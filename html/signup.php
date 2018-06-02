<?php include("php/DB.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>servis_0</title>
</head>
<body>
<div id="erorrs"></div>
<form id="signup" action="php/signup.php" method="post">
    <p>
    <p><strong>Ваш логин</strong></p>
    <input type="text" name="login">
    </p>
    <p>
    <p><strong>Ваше ім'я</strong></p>
    <input type="text" name="name">
    </p>
    <p>
    <p><strong>Ваше прізвище</strong></p>
    <input type="text" name="surname">
    </p>
    <p>
    <p><strong>Ваш Email</strong></p>
    <input type="email" name="email">
    </p>
    <p>
    <p><strong>Ваш пароль</strong></p>
    <input type="password" name="password">
    </p>
    <p>
    <p><strong>Введіть ваш пароль ще раз</strong></p>
    <input type="password" name="password1">
    </p>
    <p>
        <button type="submit" >Зареєструватися</button>
    </p>
</form>
<script type='text/javascript' src='/jquery.js'></script>
<script type='text/javascript' src='/script.js'></script>
</body>
</html>