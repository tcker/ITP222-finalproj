<?php
require_once './core/Model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $city = $_POST['city'] ?? '';
    $country = $_POST['country'] ?? '';
    $activities = isset($_POST['activities']) ? implode(',', $_POST['activities']) : '';
    $info_type = isset($_POST['info_type']) ? implode(',', $_POST['info_type']) : '';

    try {
        $model = new Model();
        $db = $model->getDB();

        $stmt = $db->prepare("INSERT INTO trips (city, country, activities, info_type) VALUES (?, ?, ?, ?)");
        $stmt->execute([$city, $country, $activities, $info_type]);

        echo "Trip data saved successfully!";
    } catch (PDOException $e) {
        echo "Error saving data: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
