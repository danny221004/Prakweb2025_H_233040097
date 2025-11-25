<?php
// DEFINISI CLASS (DENAH)
class Rumah
{
    // PROPERTY (DATA)
    public $warna = "Putih";
    public $jumlahKamar = 4;

    // METHOD (PERILAKU)
    public function kunciPintu()
    {
        return "Pintu sudah dikunci!";
    }

    public function gantiWarna($warnaBaru)
    {
        $this->warna = $warnaBaru;
    }
}

// --- BAGIAN OBJECT (RUMAH JADI) ---
// 1. Membuat Object
$rumahSaya = new Rumah();

// 2. Mengakses Property (Melihat data)
echo "Warna awal rumah saya: " . $rumahSaya->warna; // Output: Putih
echo "<br>";

// 3. Menggunakan Method (Melakukan sesuatu)
$rumahSaya->gantiWarna("Biru");

// 4. Melihat data lagi setelah diubah
echo "Warna baru rumah saya: " . $rumahSaya->warna; // Output: Biru
echo "<br>";

// 5. Menjalankan Method lain
echo $rumahSaya->kunciPintu();
echo "<hr>";

// Kita buat object baru
$rumahTetangga = new Rumah();
echo "Warna rumah tetangga: " . $rumahTetangga->warna; // Output: Putih
// Rumah tetangga tetap "Putih" karena dia
// adalah object yang berbeda dari $rumahSaya.
