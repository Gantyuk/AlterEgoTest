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
    <input type="text" name="login" value="<?= @$_SESSION['loget_user']['log'] ?>">
    </p>
    <p>
    <p><strong>Ваше ім'я</strong></p>
    <input type="text" name="name" value="<?= @$_SESSION['loget_user']['name'] ?>">
    </p>
    <p>
    <p><strong>Ваше прізвище</strong></p>
    <input type="text" name="surname" value="<?= @$_SESSION['loget_user']['SurName'] ?>">
    </p>
    <p>
    <p><strong>Ваш Email</strong></p>
    <input type="email" name="email" value="<?= @$_SESSION['loget_user']['email'] ?>">
    </p>
    <?php if (isset($_SESSION['loget_user'])): ?>
        <p><input type="checkbox" id="chech" value="value1" name="chech"> Змінити проль</p>
        <div style="display:none" id="pass">
            <p><strong>Введіть пароль</strong></p>
            <input type="password" name="password_chek">
            </p>
            <p>
            <p><strong>Введіть новий пароль</strong></p>
            <input type="password" name="password">
            </p>
            <p><strong>Введіть новий пароль ще раз</strong></p>
            <input type="password" name="password1">
            </p>
        </div>
        <p>
            <button type="submit" name="save">Зберегти</button>
        </p>
    <?php else: ?>
        <p>
        <p><strong>Ваш пароль</strong></p>
        <input type="password" name="password">
        </p>
        <p>
        <p><strong>Введіть ваш пароль ще раз</strong></p>
        <input type="password" name="password1">
        </p>
        <p>
            <button type="submit" name="subbutton" value="clik">Зареєструватися</button>
        </p>
    <?php endif; ?>

</form>
<script type='text/javascript' src='/jquery.js'></script>
<script type='text/javascript' src='/script.js'></script>
</body>
</html>