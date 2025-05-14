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

        if ($found) {
            if ($user->isAccountLocked($found['email'])) {
                echo "Your account is locked due to multiple failed login attempts. Please try again later.";
                return;
            }

            if (password_verify($password, $found['password'])) {
                $user->resetFailedAttempts($found['email']); 
                $_SESSION['user'] = $found;
                header("Location: homepage.php");
                exit;
            } else {
                $user->incrementFailedAttempts($found['email']); 

                $remainingAttempts = 5 - $found['failed_attempts'];
                if ($remainingAttempts <= 0) {
                    $user->lockAccount($found['email']); 
                    echo "Your account is locked due to multiple failed login attempts. Please try again later.";
                    return;
                }

                echo "Invalid credentials. You have $remainingAttempts attempt(s) remaining. <a href='index.php?uri=login'>Try again</a>";
            }
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

            $link = "http://localhost/ITP222-finalproj/backup/back-end/index.php?uri=reset&token=$token";

            echo <<<HTML
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Reset Link</title>
            <script src="https://cdn.tailwindcss.com"></script>
            </head>
            <body class="bg-gray-100 flex items-center justify-center min-h-screen">
            <div class="max-w-md w-full bg-white p-6 rounded-lg shadow-md text-center space-y-4">
                <h2 class="text-xl font-semibold text-green-600">Reset Link Generated</h2>
                <p class="text-gray-700">Click the button below to reset your password:</p>
                <a 
                href="$link" 
                class="inline-block px-4 py-2 bg-blue-600 text-white font-medium rounded hover:bg-blue-700 transition"
                >
                Reset Password
                </a>
                <p class="text-xs text-gray-400">For testing purposes only — do not share this link.</p>
            </div>
            </body>
            </html>
            HTML;

        } else {
            echo <<<HTML
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email Not Found</title>
            <script src="https://cdn.tailwindcss.com"></script>
            </head>
            <body class="bg-gray-100 flex items-center justify-center min-h-screen">
            <div class="max-w-md w-full bg-white p-6 rounded-lg shadow-md text-center space-y-4">
                <h2 class="text-xl font-semibold text-red-600">Email Not Found</h2>
                <p class="text-gray-700">We couldn't find an account with that email.</p>
                <a 
                href="index.php?uri=forgot" 
                class="inline-block px-4 py-2 bg-gray-300 text-black font-medium rounded hover:bg-gray-400 transition"
                >
                Try Again
                </a>
            </div>
            </body>
            </html>
            HTML;
        }
    }


    public function reset() {
        date_default_timezone_set('Asia/Manila'); 

        session_start();

        if (!isset($_GET['token'])) {
            echo "Invalid reset link. <a href='index.php?uri=forgot'>Try again</a>";
            return;
        }

        if (!isset($_SESSION['reset_email'])) {
            echo "Email session expired. Please try again.";
            return;
        }

        $token = $_GET['token'];
        $email = $_SESSION['reset_email'];

        $user = new User();
        $found = $user->findByResetTokenAndEmail($token, $email);

        if ($found) {
            // Here, $found will be populated by the data returned from the database
            // Example of how $found can be used (assuming it's an associative array)
            // $found = ['email' => 'example@email.com'];

            // Pass the found email to the view
            $this->view('reset-password', ['email' => $found['email']]);
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

          echo <<<HTML
                      <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email Not Found</title>
            <script src="https://cdn.tailwindcss.com"></script>
            </head>
            <body>
            <div class='flex items-center justify-center min-h-screen bg-zinc-900'>
                <div class='bg-zinc-800 text-white p-8 rounded-md shadow-md max-w-sm w-full'>
                <h2 class='text-2xl font-semibold mb-4'>Password Updated Successfully</h2>
                <p class='text-sm text-gray-400 mb-4'>
                    Your password has been updated. You can now login with your new password.
                </p>
                <a href='index.php?uri=login' class='block text-center text-lg font-semibold text-white bg-blue-600 rounded-md py-2 hover:bg-blue-700 transition'>
                    Login
                </a>
                </div>
            </div>
            </body>
            </html>
            HTML;
    }
}
?>
