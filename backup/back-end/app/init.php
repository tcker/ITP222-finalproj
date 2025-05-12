<?php

// Autoload core classes
spl_autoload_register(function ($class) {
    $file = '../app/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Load config
require_once 'config/config.php';
