<?php

require_once 'core/Controller.php';
require_once 'models/User.php';
require_once 'mailer.php';

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
            header("Location: index.php?uri=signup&error=" . urlencode("Password must be at least 6 characters."));
            exit;
        }
        if (!preg_match('/[A-Z]/', $password)) {
            header("Location: index.php?uri=signup&error=" . urlencode("Password must contain at least one uppercase letter."));
            exit;
        }
        if (!preg_match('/[a-z]/', $password)) {
            header("Location: index.php?uri=signup&error=" . urlencode("Password must contain at least one lowercase letter."));
            exit;
        }
        if (!preg_match('/\d/', $password)) {
            header("Location: index.php?uri=signup&error=" . urlencode("Password must contain at least one number."));
            exit;
        }
        if (!preg_match('/[\W_]/', $password)) {
            header("Location: index.php?uri=signup&error=" . urlencode("Password must contain at least one special character."));
            exit;
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
            $_SESSION['login_error'] = "Your account is locked due to multiple failed login attempts. Please try again later.";
            header("Location: index.php?uri=login");
            exit;
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
                $_SESSION['login_error'] = "Your account is locked due to multiple failed login attempts. Please try again later.";
                header("Location: index.php?uri=login");
                exit;
            }

            $_SESSION['login_error'] = "Invalid credentials. You have $remainingAttempts attempt(s) remaining.";
            header("Location: index.php?uri=login");
            exit;
        }
    } else {
        $_SESSION['login_error'] = "Invalid credentials.";
        header("Location: index.php?uri=login");
        exit;
    }
}


    public function verifyOTP() {
        $this->view('verify-otp'); // Make a simple HTML form asking for OTP input
    }


    public function handleVerifyOTP() {
        session_start();

        $otpInput = $_POST['otp'] ?? null;
        $email = $_SESSION['otp_email'] ?? null;

        if (!$otpInput || !$email) {
            echo "Invalid request. <a href='index.php?uri=verify-otp'>Try again</a>";
            return;
        }

        $user = new User();
        $isValid = $user->verifyOTP($email, $otpInput);

        if ($isValid) {
            $token = bin2hex(random_bytes(16)); 
            $expires = date('Y-m-d H:i:s', strtotime('+1000 minutes'));

            $user->setResetToken($email, $token, $expires);

            $_SESSION['reset_email'] = $email;

            header("Location: index.php?uri=reset-password&token=" . urlencode($token) . "&email=" . urlencode($email));
            exit;
        } else {
            echo "Invalid OTP. <a href='index.php?uri=verify-otp'>Try again</a>";
        }
    }



    public function forgot() {
        $this->view('forgot-password');
    }




    public function handleForgot() {
    session_start();
    require_once 'mailer.php';

    $email = $_POST['email'];
    $user = new User();
    $existing = $user->findByEmail($email);

    if ($existing) {
        $otp = random_int(100000, 999999);
        $expires = date('Y-m-d H:i:s', strtotime('+1000 minutes'));

        $user->setOTP($email, $otp, $expires);

        if (sendOTPEmail($email, $otp)) {
            $_SESSION['otp_email'] = $email;

            header("Location: index.php?uri=verify-otp");
            exit;
        } else {
            echo "Failed to send OTP email. Try again.";
        }
    } else {
        echo "Email not found.";
    }
}


    public function reset() {
        date_default_timezone_set('Asia/Manila');

        session_start();

        $token = $_GET['token'] ?? null;
        $email = $_GET['email'] ?? null;  

        if (!$token || !$email) {
            echo "Invalid reset link. <a href='index.php?uri=forgot'>Try again</a>";
            return;
        }

        $user = new User();
        $found = $user->findByResetTokenAndEmail($token, $email);

        if ($found) {
            $expiresAt = strtotime($found['token_expires_at']);
            $now = time();

            if ($expiresAt < $now) {
                $newExpiry = date('Y-m-d H:i:s', strtotime('+90 minutes'));
                $user->setResetToken($email, $token, $newExpiry);
            }

            $_SESSION['reset_email'] = $email;
            $this->view('reset-password', ['email' => $email, 'token' => $token]);
        } 
        else {
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