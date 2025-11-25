<?php
// Bisa menggunakan Require manual
// require_once 'Produk/Animal.php';
// require_once 'Produk/Cat.php';

// Method khusus autoload
spl_autoload_register(function ($class) {
    require_once __DIR__ . '/Produk/' . $class . '.php';
});
