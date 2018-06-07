<?php include("nav_bar.php");
$contacts = $mysqli->query("SELECT `log_anozer_user` FROM `contact` WHERE `id_user` =" . $_SESSION['loget_user']['id_user']);
$response = [];
while ($contact = $contacts->fetch_assoc()) {
    $response[] = $contact;
} ?>
<div class="container">
    <div class="row">
        <?php
        if (!empty($response)):
            foreach ($response as $contact): ?>
                <div class="col-md-3">
                    <h3>
                        <a class="btn btn-success"
                           href="/contact/<?= $contact['log_anozer_user'] ?>"><?= $contact['log_anozer_user'] ?></a>
                    </h3>
                </div>
            <?php endforeach;
        else:
            echo "В вас ще нема контактів";
        endif; ?>
    </div>
</div>
<script type='text/javascript' src='/jquery.js'></script>
<script type='text/javascript' src='/script.js'></script>
</body>
</html>