<?php include("php/DB.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>servis_0</title>
</head>
<body>
<div id="erorrs"></div>
<form id="login" action="php/login.php" method="post">
    <p>
        <p><strong>Логин</strong></p>
        <input type="text" name="login">
    </p>
    <p>
    <p><strong>Пароль</strong></p>
    <input type="password" name="password">
    </p>
    <p>
    <p>
        <button type="submit" >Авторизуватися</button>
    </p>
</form>
<script type='text/javascript' src='/jquery.js'></script>
<script type='text/javascript' src='/script.js'></script>
</body>
</html>