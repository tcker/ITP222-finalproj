<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php?uri=login");
    exit;
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Homepage</title>
</head>
<body>
  <h2>Welcome, <?= htmlspecialchars($user['username']) ?>!</h2>
  <p>You are now logged in.</p>
  <form action="logout.php" method="POST">
    <button type="submit">Logout</button>
  </form>
</body>
</html>
