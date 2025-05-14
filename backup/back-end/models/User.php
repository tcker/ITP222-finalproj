<?php
require_once 'core/Model.php';

class User extends Model {
    public function create($username, $email, $password) {
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $email, password_hash($password, PASSWORD_DEFAULT)]);
    }

    public function findByUsernameOrEmail($input) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$input, $input]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function setResetToken($email, $token, $expires) {
        $stmt = $this->db->prepare("UPDATE users SET reset_token = ?, token_expires_at = ? WHERE email = ?");
        return $stmt->execute([$token, $expires, $email]);
    }

    public function findByResetTokenAndEmail($token, $email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE reset_token = ? AND email = ? AND token_expires_at > NOW()");
        $stmt->execute([$token, $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByResetToken($token) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE reset_token = ? AND token_expires_at > NOW()");
        $stmt->execute([$token]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePassword($email, $password) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE users SET password = ? WHERE email = ?");
        return $stmt->execute([$hashed, $email]);
    }

    public function clearResetToken($email) {
        $stmt = $this->db->prepare("UPDATE users SET reset_token = NULL, token_expires_at = NULL WHERE email = ?");
        return $stmt->execute([$email]);
    }

    public function isAccountLocked($email) {
        $stmt = $this->db->prepare("SELECT locked_until FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result && $result['locked_until'] && strtotime($result['locked_until']) > time();
    }

    public function incrementFailedAttempts($email) {
        $stmt = $this->db->prepare("UPDATE users SET failed_attempts = failed_attempts + 1 WHERE email = ?");
        return $stmt->execute([$email]);
    }

    public function lockAccount($email, $lockDuration = '30 MINUTE') {
        $stmt = $this->db->prepare("UPDATE users SET locked_until = NOW() + INTERVAL $lockDuration WHERE email = ?");
        return $stmt->execute([$email]);
    }

    public function resetFailedAttempts($email) {
        $stmt = $this->db->prepare("UPDATE users SET failed_attempts = 0, locked_until = NULL WHERE email = ?");
        return $stmt->execute([$email]);
    }



}
?>
