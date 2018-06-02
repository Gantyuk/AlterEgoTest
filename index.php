<?php
$route = $_GET['route'];

$somevar = explode('/', $route);

$result = 'slavik';
switch ($somevar[0]) {
    case 'api':
        echo json_encode(['response' => $somevar]);
        break;
    case 'login':
        include_once "html/login.html";
        break;
    case "signup":
        include_once "html/signup.html";
        break;
    default:
        include_once "wiev.php";
}
