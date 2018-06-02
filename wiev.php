<!DOCTYPE html>
<html lang="en">

<?php include("DB.php"); ?>
<head>
    <meta charset="UTF-8">
    <title>servis_0</title>
    <style>
        .form {
            width: 800px;
            margin: 10px auto;
        }

        .response {
            margin: 10px auto;
            width: 900px;
            padding: 10px;
            border: 1px solid #333333;
        }

        .response pre {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
<a href="/login">Авторизація</a><br>
<a href="/signup">Реєстрація</a>
<?php /*foreach ($request as $item) {
            echo $item;
            }
*/?><!--

</php>
<div class="form">
    <form id="apiform" method="post" action="/api.php">

        <input type="text">
        <input type="submit" value="Отправить">
    </form>
</div>

<div class="response">

</div>-->
<script type='text/javascript' src='/jquery.js'></script>
<script type='text/javascript' src='/script.js'></script>
</body>
</html>