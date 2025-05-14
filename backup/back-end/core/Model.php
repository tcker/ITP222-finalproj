<?php
class Model {
    protected $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=compass_db", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("DB Connection Failed: " . $e->getMessage());
        }
    }
}
