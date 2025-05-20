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
    case 'forgot':
        $auth->forgot();
        break;
    case 'handle-forgot':
        $auth->handleForgot();
        break;
    case 'reset':
        $auth->reset();
        break;
    case 'handle-reset':
        $auth->handleReset();
        break;
    case 'forgot':
        $auth->forgot();
        break;
    case 'handle-forgot':
        $auth->handleForgot();
        break;
    case 'verify-otp':
        $auth->verifyOTP(); 
        break;
    case 'handle-verify-otp':
        $auth->handleVerifyOTP();
        break;
    case 'reset-password':
        include 'views/reset-password.php'; 
        break;
    default:
        echo "404 Page Not Found";
}
?>