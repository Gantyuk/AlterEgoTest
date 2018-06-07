<?php require_once "DB.php";

//echo $somevar[0].$somevar[1];
if ($somevar[1] != "contact") {
    $errors = [];
    $count = $mysqli->query("SELECT count(`log`) AS count_log FROM `user` WHERE `log`='" . $somevar[1] . "'")->fetch_assoc()['count_log'];
    if ($count == 0) {
        $errors[] = "користувач з таким логіном '" . $somevar[1] . "' не найдений !";
    } else {
        $user = $mysqli->query("SELECT * FROM `user` WHERE `log`='" . $somevar[1] . "'")->fetch_assoc();
    }

    if (empty($errors)) {
        $mesage = str_replace("~", " ", $somevar[3]);
        $mysqli->query("INSERT INTO 
                              `mesages`( `token`, `id_user_resive`, `mesage`) 
                          VALUES 
                            ('" . $somevar[2] . "','" . $user['id_user'] . "','" . $mesage . "')");
        $count = $mysqli->query("SELECT count(`log_anozer_user`) AS coun FROM `contact` WHERE `id_user` = '" . $user['id_user'] . "' AND `log_anozer_user`='" . $somevar[4] . "'")->fetch_assoc()['coun'];
        if ($count == 0) {
            $mysqli->query("INSERT INTO `contact`(`id_user`, `log_anozer_user`) VALUES ('" . $user['id_user'] . "','" . $somevar[4] . "')");
        }
        echo json_encode(['mesage' => 'Повідомлення успішно відправлене']);
    } else {
        echo json_encode(['errors' => $errors[0]]);
    }
} else {
    $user = $mysqli->query("SELECT * FROM `user` WHERE `log`='" . $somevar[2] . "'")->fetch_assoc();
    $mesages = $mysqli->query("SELECT `mesage`, `Date_create`  FROM `mesages` WHERE `id_user_resive` = " . $user['id_user'] . " AND `token`='" . $somevar[3] . "' ORDER BY `Date_create` ");
    $ansver = [];
    while ($mesage = $mesages->fetch_assoc()) {
        $ansver[] = $mesage;
    }
    if (!empty($ansver)) {
        echo json_encode(['ansver'=>$ansver,'token'=>$user['token']]);
    } else {
        echo json_encode(['ansver'=>"no mesage",'token'=>$user['token']]);
    }
}