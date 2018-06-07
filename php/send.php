<?php include("DB.php");

$data = $_POST;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($data['login_user_resiv'] == "") {
        $errors[] = "Введіть логін отримувача";
    }
    if ($data['mesage'] == "") {
        $errors[] = "Напишіть текст";
    }

    if (empty($errors)) {
        $data_mesage = str_replace(" ", "~", $data['mesage']);
        $url = "http://servis1/api/" . $data['login_user_resiv'] . "/" . $_SESSION['loget_user']['token'] . "/" . $data_mesage . "/" . $_SESSION['loget_user']['log'];
        if ($curl = curl_init()) {
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, $url);
            $response = curl_exec($curl);
            curl_close($curl);
            $response_decod = json_decode($response);
            foreach ($response_decod as $value => $item) {
                $contact = $value;

            }
            if ($contact === "mesage") {
                $count = $mysqli->query("SELECT count(`log_anozer_user`) AS coun FROM `contact` 
                                                 WHERE `id_user` ='" . $_SESSION['loget_user']['id_user'] . "' 
                                                  AND `log_anozer_user`='" . $data['login_user_resiv'] . "'")->fetch_assoc()['coun'];

                if ($count == 0) {
                    $mysqli->query("INSERT INTO `contact`(`id_user`, `log_anozer_user`)
                                            VALUES ('" . $_SESSION['loget_user']['id_user'] . "','" . $data['login_user_resiv'] . "')");
                }
            }
            echo $response;
        }
    } else {
        echo json_encode(['errors' => $errors[0]]);
    }
}



