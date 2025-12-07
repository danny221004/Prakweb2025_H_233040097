<?php
// PARENT CLASS
class Produk
{
    // INI MATERI: Setter & Getter
    // Ubah Seluruh visibility property menjadi "private"
    private $judul, $penulis, $penerbit, $harga;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // --- BAGIAN GETTER (MEMBACA) ---
    // Method Setter untuk mengubah
    public function setJudul($judulBaru)
    {
        return $this->judul = $judulBaru;
    }

    // --- BAGIAN GETTER (MEMBACA) ---
    // getJudul adalah Getter
    public function getJudul()
    {
        return $this->judul;
    }

    // getHarga adalah Getter
    public function getHarga()
    {
        return $this->harga;
    }

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    // getInfoProduk adalah Getter
    public function getInfoProduk()
    {
        // Properti private BISA diakses dari dalam class ini
        return "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    }
}

// CHILD CLASS (Tidak berubah dari latihan Overriding)
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

// CHILD CLASS (Tidak berubah dari latihan Overriding)
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
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

// Ini Setter
// Property Private yang awalnya "Naruto" berubah menjadi "Goku"
$produk1->setJudul("Goku");
echo $produk1->getInfoProduk(); // Komik: Goku | ...
echo "<br>";

// Ini Getter
// Memanggil getJudul()
echo $produk1->getJudul(); // Goku
