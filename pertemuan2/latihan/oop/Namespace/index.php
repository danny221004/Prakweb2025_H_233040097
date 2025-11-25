<?php
require_once 'App/init.php';

// Import class User dari namespace App\Service
// dan beri alias 'ServiceUser'
use App\Service\User as ServiceUser;
// Import class User dari namespace App\Produk
// dan beri alias 'ProdukUser'
use App\Produk\User as ProdukUser;

// Sekarang kita panggil class menggunakan alias-nya
// PHP tidak akan bingung lagi
new ServiceUser();
echo "<br>";
new ProdukUser();
