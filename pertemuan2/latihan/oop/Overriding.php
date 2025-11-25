<?php
// PARENT CLASS
class Produk
{
    public $judul, $penulis, $penerbit, $harga;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    // METHOD DASAR / UMUM
    public function getInfoProduk()
    {
        // Versi PARENT
        return "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    }
}

// CHILD CLASS (CLASS ANAK)
class Komik extends Produk
{
    public $jmlHalaman;

    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    // INI MATERI: OVERRIDING
    // Kita timpa method getInfoProduk() dari Parent
    public function getInfoProduk()
    {
        // 1. Ambil method ASLI dari PARENT
        $infoParent = parent::getInfoProduk();

        // 2. Kita tambahkan info spesifik untuk Komik
        return "Komik: {$infoParent} - {$this->jmlHalaman} Halaman.";
    }
}

// CHILD CLASS KEDUA
class Game extends Produk
{
    public $waktuMain;

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    // INI MATERI: OVERRIDING
    public function getInfoProduk()
    {
        $infoParent = parent::getInfoProduk();
        return "Game: {$infoParent} - {$this->waktuMain} Jam.";
    }
}

// --- BAGIAN OBJECT ---
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
