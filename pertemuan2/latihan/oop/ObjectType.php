<?php
class Rumah
{
    public $warna;
    public $alamat;

    public function __construct($warna, $alamat)
    {
        $this->warna = $warna;
        $this->alamat = $alamat;
    }
}

// INI MATERI OBJECT TYPE
// Fungsi ini HANYA menerima parameter
// yang merupakan object dari Class 'Rumah'
function pasangListrik(Rumah $dataRumah)
{
    return "Listrik sedang dipasang di rumah $dataRumah->warna yang beralamat di $dataRumah->alamat";
}

// --- BAGIAN APLIKASI / PEMAKAIAN ---
$rumahSaya = new Rumah("Merah", "Jln. Merdeka 10");

// Mengoper object $rumahSaya ke fungsi
echo pasangListrik($rumahSaya);

echo "<br>";

// Coba panggil fungsi dengan data yg SALAH
// $teksBiasa = "Ini cuma string";
// echo pasangListrik($teksBiasa); // Ini akan ERROR
