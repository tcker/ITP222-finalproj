<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php?uri=login");
    exit;
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Compass Landing Page</title>
  <link rel="stylesheet" href="CSS/homepage.css"/>
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="min-h-screen relative">

  <!-- Background Slider -->
  <div id="background-slider">
    <img src="CSS/Assets/arthur.png" alt="Slide 1" class="opacity-100" />
    <img src="CSS/Assets/japan.jpg" alt="Slide 2" />
    <img src="CSS/Assets/mayon.png" alt="Slide 3" />
  </div>

  <header class="w-full py-6 flex justify-center relative z-20">
    <nav class="relative w-full flex items-center text-white text-sm font-normal px-6 max-w-7xl mx-auto">
      <div class="absolute left-6 flex items-center space-x-2">
        <img src="CSS/Assets/compass_logo.gif" alt="Compass Logo" />
      </div>

      <div class="flex mx-auto space-x-24 uppercase tracking-widest font-normal" style="font-family: 'Neue Montreal', sans-serif; font-weight: 400;">
        <a href="trip-planner.php" class="hover:text-yellow-400">
          Trip Planner
        </a>
        <a href="destinations.php" class="hover:text-yellow-400 cursor-pointer">
          Destinations
        </a>
        <a href="travel-logs.php" class="hover:text-yellow-400 cursor-pointer">
          Travel Logs
        </a>
      </div>

      <div class="absolute right-6 flex items-center space-x-4 font-normal" style="font-family: 'Neue Montreal', sans-serif; font-weight: 400;">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 1118.878 6.196 9 9 0 015.12 17.804z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <div class="text-white text-sm">
          <p>Welcome, <?= htmlspecialchars($user['username']) ?> !</p>
        </div>
        <form action="logout.php" method="POST" class="inline">
          <button type="submit" class="bg-yellow-400 text-black px-3 py-1 rounded hover:bg-yellow-300 transition">Logout</button>
        </form>
      </div>
    </nav>
  </header>


  <main class="fixed-compass">
    <h1
      class="text-[15rem] font-extrabold leading-none drop-shadow-lg select-none"
      style="font-family: 'Neue Montreal', sans-serif;"
    >
      Compass
    </h1>
  </main>

  <div class="pt-[100vh] px-12 max-w-4xl mx-auto space-y-8 text-white z-0 relative" style="background: transparent;">
    <p class="text-lg">
      Welcome to Compass! This placeholder content allows the page to be scrollable while the big Compass text and background images remain fixed in place.
    </p>
    <p class="text-lg">
      Scroll down to see this text move, but the background and large heading stay fixed.
    </p>
    <p class="text-lg">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque fermentum, odio non sodales sollicitudin, erat lacus pulvinar nisi, ac feugiat nulla nulla a turpis.
    </p>
    <p class="text-lg">
      Vivamus luctus nec urna ut dictum. Curabitur euismod dolor vel lacus dapibus, vitae maximus nulla commodo.
    </p>
    <p class="text-lg">
      More placeholder text here to fill up space...
    </p>
    <p class="text-lg">
      Keep scrolling, keep exploring!
    </p>
    <p class="text-lg">
      The big "Compass" text and background images won’t move as you scroll.
    </p>
  </div>

  <script>
    const images = document.querySelectorAll('#background-slider img');
    let current = 0;

    function showNextImage() {
      images.forEach((img, i) => {
        img.classList.toggle('opacity-100', i === current);
        img.classList.toggle('opacity-0', i !== current);
      });
      current = (current + 1) % images.length;
    }

    setInterval(showNextImage, 4000);
  </script>

</body>
</html>

<style>
    <?php include 
        'CSS/homepage.css'; 
    ?>
</style> 