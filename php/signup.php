<?php require_once "DB.php";

$data = $_POST;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();
    if(trim($data['login']) == ""){
        $errors[] = "Введіть логін!";
    } else {
        $count = $mysqli->query("SELECT count(`log`) AS count_log FROM `user` WHERE `log`='".$data['login']."'")->fetch_assoc()['count_log'];
        if ($count != 0){
            $errors[] = "Введений логін '".$data['login']."' вже існує!";
        }
    }
    if(trim($data['name']) == ""){
        $errors[] = "Введіть ім'я!";
    }
    if(trim($data['surname']) == ""){
        $errors[] = "Введіть прізвише!";
    }

    if(trim($data['email']) == ""){
        $errors[] = "Введіть емайл!";
    }else {
        $count = $mysqli->query("SELECT count(`email`) AS count_mail FROM `user` WHERE `email`='".$data['email']."'")->fetch_assoc()['count_mail'];
        if ($count != 0){
            $errors[] = "Введений Email '".$data['email']."' вже існує!";
        }
    }

    if($data['password'] == ""){
        $errors[] = "Введіть пароль!";
    } else if(!preg_match('/^\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',$data['password'])){
        $errors[] = "Пароль повинен містити одну велику літеру ону маленьку і одне число!";
    }

    if($data['password1'] != $data['password']){
        $errors[] = "Повторний пароль введен не правильно!";
    }
    if (empty($errors)){
        $mysqli->query("INSERT INTO `user`(`log`, `pass`, `email`, `SurName`, `token`,`name`) 
            VALUES 
            ('".$data['login']."','".password_hash($data['password'],PASSWORD_DEFAULT)."','".$data['email']."','".$data['surname'].
            "','".md5($data['login'])."','".$data['name']."')");
        echo json_encode(['mesage'=>'Вітаю ви успішно зареєструвались']);
    }else{
        echo json_encode(['errors'=>$errors[0]]);
    }

}