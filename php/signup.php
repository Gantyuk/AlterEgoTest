<?php require_once "DB.php";

$data = $_POST;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();
    if (trim($data['login']) == "") {
        $errors[] = "Введіть логін!";
    } else {
        if ($_SESSION['loget_user']['log'] != $data['login']) {
            $count = $mysqli->query("SELECT count(`log`) AS count_log FROM `user` WHERE `log`='" . $data['login'] . "'")->fetch_assoc()['count_log'];
            if ($count != 0) {
                $errors[] = "Введений логін '" . $data['login'] . "' вже існує!";
            }
        }
    }
    if (trim($data['name']) == "") {
        $errors[] = "Введіть ім'я!";
    }
    if (trim($data['surname']) == "") {
        $errors[] = "Введіть прізвише!";
    }

    if (trim($data['email']) == "") {
        $errors[] = "Введіть емайл!";
    } else {
        if ($_SESSION['loget_user']['email'] != $data['email']) {
            $count = $mysqli->query("SELECT count(`email`) AS count_mail FROM `user` WHERE `email`='" . $data['email'] . "'")->fetch_assoc()['count_mail'];
            if ($count != 0) {
                $errors[] = "Введений Email '" . $data['email'] . "' вже існує!";
            }
        }
    }

    if ($data['check'] == "value1") {

        if (!password_verify($data['password_chek'], $_SESSION['loget_user']['pass'])) {
            $errors[] = "Не правильний пароль!";
        }
        if ($data['password'] == "") {
            $errors[] = "Введіть пароль!";
        } else if (!preg_match('/^\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $data['password'])) {
            $errors[] = "Пароль повинен містити одну велику літеру ону маленьку і одне число!";
        }

        if ($data['password1'] != $data['password']) {
            $errors[] = "Повторний пароль введен не правильно!";
        }
    }
    if (!isset($_SESSION["loget_user"])) {
        if ($data['password'] == "") {
            $errors[] = "Введіть пароль!";
        } else if (!preg_match('/^\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $data['password'])) {
            $errors[] = "Пароль повинен містити одну велику літеру ону маленьку і одне число!";
        }

        if ($data['password1'] != $data['password']) {
            $errors[] = "Повторний пароль введен не правильно!";
        }
    }
    if (empty($errors)) {
        if ($_POST['chech'] == "value1") {
            $mysqli->query("UPDATE `user` 
                SET `log`='" . $data['login'] . "',`pass`='" . password_hash($data['password'], PASSWORD_DEFAULT) . "',
                `email`='" . $data['email'] . "',`SurName`='" . $data['surname'] . "',`name`='" . $data['name'] . "'
                WHERE `id_user` = " . $_SESSION['loget_user']['id_user']);
            echo json_encode(['mesage' => 'Зміни успішно збережено']);
            $user = $mysqli->query("SELECT * FROM `user` WHERE `log`='" . $data['login'] . "'")->fetch_assoc();
            $_SESSION['loget_user'] = $user;
        } elseif (isset($_SESSION["loget_user"])) {
            $mysqli->query("UPDATE `user` 
                SET `log`='" . $data['login'] . "', `email`='" . $data['email'] . "',`SurName`='" . $data['surname'] . "',
                `name`='" . $data['name'] . "'
                WHERE `id_user` = " . $_SESSION['loget_user']['id_user']);
            $user = $mysqli->query("SELECT * FROM `user` WHERE `log`='" . $data['login'] . "'")->fetch_assoc();
            $_SESSION['loget_user'] = $user;
            echo json_encode(['mesage' => 'Зміни успішно збережено']);
        } else {
            $mysqli->query("INSERT INTO `user`(`log`, `pass`, `email`, `SurName`, `token`,`name`) 
            VALUES 
            ('" . $data['login'] . "','" . password_hash($data['password'], PASSWORD_DEFAULT) . "','" . $data['email'] . "','" . $data['surname'] .
                "','" . md5($data['login']) . "','" . $data['name'] . "')");
            echo json_encode(['mesage' => 'Вітаю ви успішно зареєструвались']);
        }
    } else {
        echo json_encode(['errors' => $errors[0]]);
    }

}