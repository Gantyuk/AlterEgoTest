<?php include("php/DB.php");
$contacts = $mysqli->query("SELECT `log_anozer_user` FROM `contact` WHERE `id_user` =" . $_SESSION['loget_user']['id_user']);
$response = [];
while ($contact = $contacts->fetch_assoc()) {
    $response[] = $contact;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>servis_0</title>
</head>
<body>
<?php if (!empty($response)):
    foreach ($response as $contact): ?>
        <a href="/contact/<?= $contact['log_anozer_user'] ?>"><?= $contact['log_anozer_user'] ?></a>
    <?php endforeach;
else:
    echo "В вас ще нема контактів";
endif; ?>
<script type='text/javascript' src='/jquery.js'></script>
<script type='text/javascript' src='/script.js'></script>
</body>
</html>