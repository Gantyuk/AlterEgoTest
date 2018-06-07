<?php include("nav_bar.php");

$url = "http://servis1/api/contact/" . $somevar[1] . "/" . $_SESSION['loget_user']['token'];

function array_sort($array, $on, $order = SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

if ($curl = curl_init()) {
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);
    $response = curl_exec($curl);
    curl_close($curl);
    $mesages = json_decode($response, true);
    $mesages_resiv = $mysqli->query("SELECT `mesage`, `Date_create`  FROM `mesages` WHERE `id_user_resive` = " . $_SESSION['loget_user']['id_user'] . " AND `token`='" . $mesages["token"] . "' ORDER BY `Date_create` DESC ");
    $ansver = [];
    while ($mesage = $mesages_resiv->fetch_assoc()) {
        $mesage['log'] = $somevar[1];
        $ansver[] = $mesage;
    }
    if ($mesages["ansver"] != "no mesage") {
        $mesage_sends = $mesages["ansver"];
        foreach ($mesage_sends as $value) {
            $value['log'] = $_SESSION['loget_user']['log'];
            $ansver[] = $value;
        }
        $ansver = array_sort($ansver, 'log', SORT_DESC);
    }
}
?>
<div class="container">
    <?php foreach ($ansver as $mesag): ?>
        <div class="row">
            <div class="col-md-2">
                <div class="alert alert-<?php if ($mesag['log'] == $_SESSION['loget_user']['log'])
                    echo 'success';
                else
                    echo 'warning';
                ?>" role="alert"><?= $mesag['log'] ?>:
                </div>
            </div>
            <div class="col-md-7">
                <div class="alert alert-info" role="alert">
                    <?= $mesag['mesage'] ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="alert alert-warning" role="alert">
                    <?= $mesag['Date_create'] ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<script type='text/javascript' src='/jquery.js'></script>
<script type='text/javascript' src='/script.js'></script>
</body>
</html>

