<?php
// DEFINISI CLASS (DENAH)
class Rumah
{
    // Properti
    public $warna;
    public $jumlahKamar;
    public $alamat;

    // CONSTRUCTOR: OTOMATIS berjalan saat 'new Rumah()'
    public function __construct($warnaAwal, $kamarAwal, $alamatAwal)
    {
        $this->warna = $warnaAwal;
        $this->jumlahKamar = $kamarAwal;
        $this->alamat = $alamatAwal;
    }

    // Method (Perilaku)
    public function kunciPintu()
    {
        return "Pintu di $this->alamat sudah dikunci!";
    }
}

// --- BAGIAN OBJECT (RUMAH JADI) ---
// Saat membuat object, kita WAJIB mengisi parameter constructor
$rumahSaya = new Rumah("Biru", 4, "Jln. Merdeka No. 10");
$rumahTetangga = new Rumah("Kuning", 2, "Jln. Sudirman No. 20");

//--- MEMBACA DATA ---
echo "Warna Rumah Saya: " . $rumahSaya->warna;
echo "<br>";
echo "Jumlah Kamar Rumah Saya: " . $rumahSaya->jumlahKamar;
echo "<br>";
echo "Alamat Rumah Tetangga: " . $rumahTetangga->alamat;
echo "<br>";
echo $rumahTetangga->kunciPintu();
