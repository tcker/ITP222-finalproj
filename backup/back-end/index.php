<?php
require_once 'core/Controller.php';
require_once 'core/Model.php';
require_once 'controllers/AuthController.php';

$uri = $_GET['uri'] ?? 'signup';
$auth = new AuthController();

switch ($uri) {
    case 'signup':
        $auth->signup();
        break;
    case 'register':
        $auth->register();
        break;
    case 'login':
        $auth->login();
        break;
    case 'authenticate':
        $auth->authenticate();
        break;
    case 'success':
        include 'views/success.php';
        break;
    default:
        echo "404 Page Not Found";
}
?>
