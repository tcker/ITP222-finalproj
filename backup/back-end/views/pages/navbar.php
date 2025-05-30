
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header("Location: index.php?uri=login");
    exit;
}
$user = $_SESSION['user'];
$basePath = '/ITP222-finalproj/backup/back-end/';
?>

<script src="https://cdn.tailwindcss.com"></script>
    <style>
        nav a,
        nav div > a {
            color: #FFFFFF;
            text-decoration: none;
            margin-right: 3rem;
            text-transform: uppercase;
            font-weight: 400;
            transition: color 0.3s;
        }

        nav a:hover,
        nav div > a:hover {
            color: #FFCC66; 
        }

        header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 20;
            padding: 1.5rem 3rem;
            background: transparent; /* or #333333 for solid bg */
        }
    </style>
</head>
<body>
      <header>
    <nav class="flex w-full items-center text-white text-sm font-normal max-w-7xl mx-auto">
<div class="flex items-center space-x-2">
    <a href="<?= $basePath ?>homepage.php">
    <img src="<?= $basePath ?>CSS/Assets/compass_logo.gif" alt="Compass Logo" />
    </a>
</div>  


    <div class="flex mx-auto space-x-24 uppercase tracking-widest font-normal">
    <a href="<?= $basePath ?>views/pages/trip-planner.php" class="hover:text-yellow-400">Trip Planner</a>
    <a href="<?= $basePath ?>views/pages/destinations.php" class="hover:text-yellow-400">Destinations</a>
    <a href="<?= $basePath ?>views/pages/travel-logs.php" class="hover:text-yellow-400">Travel Logs</a>
    </div>

        <div class="flex items-center space-x-4 font-normal h-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 1118.878 6.196 9 9 0 015.12 17.804z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <div>Welcome, <?= htmlspecialchars($user['username']) ?> !</div>
        <form action="logout.php" method="POST" class="flex items-center">
            <button type="submit" class="mt-3 bg-yellow-400 text-black px-3 py-2 rounded hover:bg-yellow-300 transition text-md font-medium">
            Logout
            </button>
        </form>
        </div>
    </nav>
  </header>

  
</body>
</html>