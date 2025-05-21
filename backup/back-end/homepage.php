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
<body>

  <header>
    <nav class="flex w-full items-center text-white text-sm font-normal max-w-7xl mx-auto">
      <div class="flex items-center space-x-2">
        <img src="CSS/Assets/compass_logo.gif" alt="Compass Logo" />
      </div>

      <div class="flex mx-auto space-x-24 uppercase tracking-widest font-normal">
        <a href="./views/pages/trip-planner.php" class="hover:text-yellow-400">Trip Planner</a>
        <a href="./views/pages/destinations.php" class="hover:text-yellow-400">Destinations</a>
        <a href="./views/pages/travel-logs.php" class="hover:text-yellow-400">Travel Logs</a>
      </div>

      <div class="flex items-center space-x-4 font-normal">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 1118.878 6.196 9 9 0 015.12 17.804z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <div>Welcome, <?= htmlspecialchars($user['username']) ?> !</div>
        <form action="logout.php" method="POST">
          <button type="submit" class="bg-yellow-400 text-black px-3 py-1 rounded hover:bg-yellow-300 transition">Logout</button>
        </form>
      </div>
    </nav>
  </header>

  <section id="background-slider">
    <img src="CSS/Assets/arthur.png" alt="Slide 1" class="opacity-100" />
    <img src="CSS/Assets/japan.jpg" alt="Slide 2" />
    <img src="CSS/Assets/mayon.png" alt="Slide 3" />
    <div class="compass-title">Compass</div>
  </section>

<div class="content-wrapper">
  <!-- <p class="text-lg">Welcome to Compass! Scroll down to explore the content.</p> -->
</div>
  <h2 class="text-3xl text-[#FFCC66] font-bold uppercase mb-8 px-6 max-w-7xl mx-auto">Learn More About:</h2>

<section class="learn-more bg-[#000000] text-white w-full border-t border-b border-[#333333] py-10">

  <article class="tooltip border-t border-[#333333] max-w-7xl mx-auto px-6 py-6 relative cursor-pointer">
    <h3 class="text-2xl font-semibold mb-2">Fly Fishing in the Mountains</h3>
    <p class="text-[#CCCCCC]">You'll get a season guide and lots of dehydrated ravioli.</p>
    <span class="tooltip-image">
      <img src="CSS/Assets/outdoor.jpg" alt="Fly Fishing" />
    </span>
  </article>

  <article class="tooltip border-t border-[#333333] max-w-7xl mx-auto px-6 py-6 relative cursor-pointer">
    <h3 class="text-2xl font-semibold mb-2">Level 5 Rapids!</h3>
    <p class="text-[#CCCCCC]">Put on your helmet and grab your wetsuit. It's time to conquer Siberia.</p>
    <span class="tooltip-image">
      <img src="CSS/Assets/rapids.jpg" alt="Level 5 Rapids" />
    </span>
  </article>

  <article class="tooltip border-t border-[#333333] max-w-7xl mx-auto px-6 py-6 relative cursor-pointer">
    <h3 class="text-2xl font-semibold mb-2">Puget Sound Kayaking</h3>
    <p class="text-[#CCCCCC]">One week of ocean kayaking in the Puget Sound.</p>
    <span class="tooltip-image">
      <img src="CSS/Assets/kayakoudoor.jpg" alt="Puget Sound Kayaking" />
    </span>
  </article>
</section>



  <script>
    const images = document.querySelectorAll('#background-slider img');
    let current = 0;

    function showNextImage() {
      images.forEach((img, i) => {
        img.classList.toggle('opacity-100', i === current);
      });
      current = (current + 1) % images.length;
    }

    setInterval(showNextImage, 4000);


  document.addEventListener("DOMContentLoaded", () => {
    const tooltips = document.querySelectorAll('.tooltip');

    tooltips.forEach(tooltip => {
      const tooltipImage = tooltip.querySelector('.tooltip-image');

      tooltip.addEventListener('mouseenter', () => {
        tooltipImage.style.visibility = 'visible';
        tooltipImage.style.opacity = '1';
      });

      tooltip.addEventListener('mousemove', (e) => {
        const offsetX = 20;
        const offsetY = -tooltipImage.offsetHeight / 2;
        let left = e.clientX + offsetX;
        let top = e.clientY + offsetY;

        if (left + tooltipImage.offsetWidth > window.innerWidth) {
          left = e.clientX - tooltipImage.offsetWidth - offsetX;
        }
        if (top < 0) top = 0;
        if (top + tooltipImage.offsetHeight > window.innerHeight) {
          top = window.innerHeight - tooltipImage.offsetHeight;
        }

        tooltipImage.style.left = left + 'px';
        tooltipImage.style.top = top + 'px';
      });

      tooltip.addEventListener('mouseleave', () => {
        tooltipImage.style.visibility = 'hidden';
        tooltipImage.style.opacity = '0';
      });
    });
  });


  </script>
</body>
</html>

<style>
    <?php include 
        'CSS/homepage.css'; 
    ?>
</style> 




<!-- Primary colors:

#993300
#333333
#000000
#FFCC66
#FFFFFF
#006699 

-->