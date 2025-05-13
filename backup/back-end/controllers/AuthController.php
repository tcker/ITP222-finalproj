<?php
require_once 'core/Controller.php';
require_once 'models/User.php';
class AuthController extends Controller {
    public function signup() {
        $this->view('signup');
    }

    public function register() {
        $user = new User();
        $user->create($_POST['username'], $_POST['email'], $_POST['password']);
        header('Location: index.php?uri=success');
    }

    public function login() {
        $this->view('login');
    }

    public function authenticate() {
        $userModel = new User();
        $user = $userModel->findByEmailOrUsername($_POST['username']);
        if ($user && password_verify($_POST['password'], $user['password'])) {
            header('Location: index.php?uri=success');
        } else {
            echo "<p style='color:red;'>Invalid credentials</p>";
            $this->view('login');
        }
    }
}
?>
