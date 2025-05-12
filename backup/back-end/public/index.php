<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Core\App;

// Example usage
$app = new App();
// USE OF COMPOSER ONLY


// Autoloader
// spl_autoload_register(function ($class) {
//     // Convert namespace to full file path
//     $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    
//     // Construct the base path
//     $file = __DIR__ . '/../' . $class . '.php';

//     if (file_exists($file)) {
//         require_once $file;
//     } else {
//         die("Class file for {$class} not found at {$file}");
//     }
// });

// // Run the app
// $app = new Core\App();

