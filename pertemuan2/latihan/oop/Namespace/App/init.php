<?php
// Autoloader untuk class di folder Produk
spl_autoload_register(function ($class) {
    // $class akan berisi string "App\Produk\NamaClass"
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . '/Produk/' . $class . '.php';
});

// Autoloader untuk class di folder Service
spl_autoload_register(function ($class) {
    // $class akan berisi string "App\Service\NamaClass"
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . '/Service/' . $class . '.php';
});
