<?php
$route = $_GET['route'];

$somevar = explode('/', $route);

$result = 'slavik';
switch ($somevar[0]) {
    case 'api':
        include_once "php/api.php";
        break;
    case 'contacts':
        include_once "html/contacts.php";
        break;
    case 'contact':
        include_once "html/contact.php";
        break;
    case 'login':
        include_once "html/login.php";
        break;
    case "signup":
        include_once "html/signup.php";
        break;
    case "logout":
        include_once "php/logout.php";
        break;
    case "send":
        include_once "html/send.php";
        break;
    default:
        include_once "php/wiev.php";
}
