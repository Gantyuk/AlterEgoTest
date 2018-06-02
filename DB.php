<?php
	$mysqli =  new mysqli("localhost", "root", "", "Sistem_1");

	if (mysqli_connect_error()) {
        die('Ошибка подключения (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }
	$mysqli->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
	$mysqli->query("SET CHARACTER SET 'utf8'");
	$request = $mysqli->query("SELECT mesage       
                                        FROM mesages
                                        WHERE token = 'token1'")->fetch_assoc();