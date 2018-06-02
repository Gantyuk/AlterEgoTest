<?php
require_once "DB.php";

$data = $_POST;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();
    if (trim($data['login']) == "") {
        $errors[] = "Введіть логін!";
    } else {
        $count = $mysqli->query("SELECT count(`log`) AS count_log FROM `user` WHERE `log`='" . $data['login'] . "'")->fetch_assoc()['count_log'];
        if ($count == 0) {
            $errors[] = "користувач з таким логіном '" . $data['login'] . "' не найдений !";
        } else {
            $user = $mysqli->query("SELECT * FROM `user` WHERE `log`='" . $data['login'] . "'")->fetch_assoc();
            if (!password_verify($data['password'], $user['pass'])) {
                $errors[] = "Не правильний пароль!";
            }else{
                $_SESSION['loget_user'] = $user;
            }
        }
    }
    if (empty($errors)) {
        echo json_encode(['mesage' => 'Вітаю ви успішно авторизувались!']);
    } else {
        echo json_encode(['errors' => $errors[0]]);
    }

}