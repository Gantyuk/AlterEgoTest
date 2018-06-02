<?php include("php/DB.php"); ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>servis_0</title>

</head>
<body>
<div id="erorrs"></div>
<form  id ="send" action="php/send.php" method="post">
    <input type="hidden" name="token" value="<?= $_SESSION['loget_user']['token'] ?>">
    <p>
    <p><strong>Логин отримувача</strong></p>
    <input type="text" name="login_user_resiv">
    </p>
    <p>
    <p><strong>Текст</strong></p>
    <input type="text" name="mesage" id="mesage"></input>
    </p>
    <p>
    <button type="submit" >Відправити</button>
    </p>
</form>
<script type='text/javascript' src='/jquery.js'></script>
<script type='text/javascript' src='/script.js'></script>
</body>
</html>
