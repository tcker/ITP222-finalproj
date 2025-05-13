<?php
require_once 'core/Model.php';
class User extends Model {
    public function create($username, $email, $password) {
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $email, password_hash($password, PASSWORD_DEFAULT)]);
    }

    public function findByEmailOrUsername($input) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$input, $input]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
