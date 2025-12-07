<?php
// PARENT CLASS
class Produk
{
    public $judul, $penulis, $penerbit;

    // INI MATERI: VISIBILITY
    // Diubah menjadi "private"
    // Private hanya bisa diakses di class ini saja
    private $harga;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Method ini dipindah ke Produk agar bisa
    // mengakses property private $harga
    public function getHarga()
    {
        return $this->harga;
    }

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduk()
    {
        // $this->harga BISA diakses dari dalam class ini
        return "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    }
}

// CHILD CLASS
class Komik extends Produk
{
    public $jmlHalaman;

    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk()
    {
        $infoParent = parent::getInfoProduk();
        return "Komik: {$infoParent} - {$this->jmlHalaman} Halaman.";
    }
}

// CHILD CLASS
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
        $infoParent = parent::getInfoProduk();
        return "Game: {$infoParent} - {$this->waktuMain} Jam.";
    }
}

// --- BAGIAN OBJECT ---
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil", "Sony", 250000, 50);

echo $produk1->getInfoProduk();
echo "<br/>";
echo $produk2->getInfoProduk();
echo "<hr/>";

// Sudah tidak bisa mengakses dan mengubah harga
// $produk2->harga = 12000; // INI AKAN FATAL ERROR
// echo $produk2->harga; // INI AKAN FATAL ERROR

// Cara akses harga yang benar
echo $produk2->getHarga();
