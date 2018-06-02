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
        /* $data_send = [];
         $data_send['log'] = $data['login_user_resiv'];
         $data_send['mesage'] = $data['mesage'];
         $data_send['token'] = $_SESSION['loget_user']['token'];
         echo json_encode($data_send);*/

        $data_mesage = str_replace(" ", "~", $data['mesage']);
        $url = "http://servis1/api/" . $data['login_user_resiv'] . "/" . $_SESSION['loget_user']['token'] . "/" . $data_mesage ;
        if ($curl = curl_init()) {
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, $url);
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
        }
    } else {
        echo json_encode(['errors' => $errors[0]]);
    }
}



