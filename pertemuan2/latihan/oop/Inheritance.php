<?php
// PARENT CLASS
// Class ini berisi properti/method
// yang SAMA untuk SEMUA turunan
class Produk
{
    // Properti Umum
    public $judul,
        $penulis,
        $penerbit,
        $harga;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Method milik Parent
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }
}

// CHILD CLASS 1
class Komik extends Produk
{
    public $jmlHalaman;

    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman)
    {
        // Memanggil constructor milik PARENT
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk()
    {
        // Mengambil method getLabel() dari PARENT
        $str = "Komik: " . parent::getLabel() . " | Rp. {$this->harga} - ({$this->jmlHalaman}) Halaman.";
        return $str;
    }
}

// CHILD CLASS 2
class Game extends Produk
{
    public $waktuMain;

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function getInfoProduk()
    {
        $str = "Game: " . parent::getLabel() . " | Rp. {$this->harga} - [{$this->waktuMain} Jam.";
        return $str;
    }
}

// --- BAGIAN OBJECT ---
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
