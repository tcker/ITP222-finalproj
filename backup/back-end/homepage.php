<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php?uri=login");
    exit;
}
$user = $_SESSION['user'];
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Homepage</title>
</head>
<body>
  <p>You are now logged in.</p>
  <form action="logout.php" method="POST">
    <button type="submit">Logout</button>
  </form>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Compass Landing Page</title>
  <link rel="stylesheet" href="CSS/Style.css" />
</head>
<body>
  <h2>Welcome, <?= htmlspecialchars($user['username']) ?>!</h2>
  <p>You are now logged in.</p>
  <form action="logout.php" method="POST">
    <button type="submit">Logout</button>
  </form>

  <header>
    <div class="logo">
      <img src="CSS/Assets/Minimal Logo.png" alt="Compass Logo" class="logo-img" />
      <span class="brand-name">COMPASS</span>
    </div>
    <nav class="nav-buttons">
      <button class="nav-btn">TRIP PLANNER</button>
      <button class="nav-btn">DESTINATION</button>
      <button class="nav-btn">TRIP LOG</button>
    </nav>
  </header>

  <main>
    <div class="content">
      <p class="learn-more">LEARN MORE?</p>
      <img src="CSS/Assets/CompassLogo.png" alt="Compass" id="compass" />
    </div>
  </main>

  <script>
    const compass = document.getElementById('compass');
    compass.addEventListener('click', () => {
      compass.classList.toggle('glow');
    });

    document.querySelectorAll('.nav-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        btn.classList.add('glow');
        setTimeout(() => btn.classList.remove('glow'), 500);
      });
    });
  </script>
</body>
</html>

