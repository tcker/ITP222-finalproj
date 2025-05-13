<?php
require_once 'core/Controller.php';
require_once 'models/User.php';

class AuthController extends Controller {
    public function signup() {
        $this->view('signup');
    }

    public function register() {
        $user = new User();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (strlen($password) < 6) {
            echo "Password must be at least 6 characters. <a href='index.php?uri=signup'>Back</a>";
            return;
        }

        $user->create($username, $email, $password);
        header("Location: index.php?uri=login");
        exit;
    }

    public function login() {
        $this->view('login');
    }

    public function authenticate() {
        session_start();
        $user = new User();
        $input = $_POST['username'];
        $password = $_POST['password'];
        $found = $user->findByUsernameOrEmail($input);

        if ($found && password_verify($password, $found['password'])) {
            $_SESSION['user'] = $found;
            header("Location: homepage.php");
        } else {
            echo "Invalid credentials. <a href='index.php?uri=login'>Try again</a>";
        }
    }
}
