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

    public function forgot() {
        $this->view('forgot-password');
    }

    public function handleForgot() {
        session_start(); 

        $email = $_POST['email'];
        $user = new User();
        $existing = $user->findByEmail($email);

        if ($existing) {
            $token = bin2hex(random_bytes(16));
            $expires = date('Y-m-d H:i:s', strtotime('+10 hour'));

            $user->setResetToken($email, $token, $expires);

            $_SESSION['reset_email'] = $email;

            // Output reset link (for testing)
            $link = "http://localhost/ITP222-finalproj/backup/back-end/index.php?uri=reset&token=$token";
            echo "Reset link (for testing): <a href='$link'>$link</a>";
        } else {
            echo "Email not found. <a href='index.php?uri=forgot'>Try again</a>";
        }
    }


    public function reset() {
        date_default_timezone_set('Asia/Manila'); 

        session_start();

        if (!isset($_GET['token'])) {
            echo "Invalid reset link. <a href='index.php?uri=forgot'>Try again</a>";
            return;
        }

        // Debugging puposes
        echo "PHP Timezone: " . date_default_timezone_get();
        echo "<br>PHP Time Now: " . date('Y-m-d H:i:s') . "<br>";

        $token = $_GET['token'];

        if (!isset($_SESSION['reset_email'])) {
            echo "Email session expired. Please try again.";
            return;
        }

        $email = $_SESSION['reset_email'];
        $user = new User();
        $found = $user->findByResetTokenAndEmail($token, $email);

        if ($found) {
            echo "Token valid for: " . $found['email'];
            $this->view('reset-password');
        } else {
            echo "Invalid or expired token. <a href='index.php?uri=forgot'>Try again</a>";
        }
    }

    public function handleReset() {
        session_start();

        $token = $_POST['token'] ?? null;
        $newPassword = $_POST['new_password'] ?? '';

        if (!$token) {
            echo "Missing token. <a href='index.php?uri=forgot'>Try again</a>";
            return;
        }

        if (strlen($newPassword) < 6) {
            echo "Password must be at least 6 characters. <a href='index.php?uri=reset&token=$token'>Back</a>";
            return;
        }

        $user = new User();
        $found = $user->findByResetToken($token);

        if (!$found) {
            echo "Invalid or expired token. <a href='index.php?uri=forgot'>Try again</a>";
            return;
        }

        $email = $found['email'];

        $user->updatePassword($email, $newPassword);
        $user->clearResetToken($email);

        echo "Password updated successfully. <a href='index.php?uri=login'>Login</a>";
    }
}
?>
