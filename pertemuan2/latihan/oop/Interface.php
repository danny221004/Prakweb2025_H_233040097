<?php
// 1. DEFINISI INTERFACE (KONTRAK)
// Gunakan keyword "interface"
interface BisaDimakan
{
    // ATURAN WAJIB
    // 2. Method di Interface... TIDAK PUNYA ISI (abstrak)
    // 3. Ini adalah KONTRAK WAJIB
    public function makan();
}

// CLASS PERTAMA: Menerapkan Kontrak
// Apel 'implements' (mengimplementasikan) kontrak BisaDimakan
class Apel implements BisaDimakan
{
    // 4. Implementasi wajib
    // Jika method 'makan()' ini tidak ada, PHP akan ERROR!
    // Apel mengisi kontrak 'makan()' dengan logikanya sendiri
    public function makan()
    {
        return "Apel dimakan: Langsung kunyah";
    }
}

// CLASS KEDUA: Menerapkan Kontrak yang Sama
// Jeruk juga 'implements' kontrak yang sama
class Jeruk implements BisaDimakan
{
    // 6. Implementasi wajib
    // Method-nya WAJIB ada, tapi isinya boleh berbeda
    public function makan()
    {
        return "Jeruk dimakan: Kupas dulu, baru kunyah";
    }
}

// 7. Cara Penggunaan
$apel = new Apel();
$jeruk = new Jeruk();

echo $apel->makan(); // Apel dimakan...
echo "<br>";
echo $jeruk->makan(); // Jeruk dimakan...
