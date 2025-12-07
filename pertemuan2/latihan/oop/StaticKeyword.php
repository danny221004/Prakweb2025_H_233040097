<?php
// Buat sebuah class untuk static
class ContohStatic
{
    // Cara penulisan property:
    // visibility + static + variable.
    public static $angka = 1;

    // Cara penulisan Method:
    // visibility + static function + nama function.
    public static function hallo()
    {
        // Akses property static menggunakan self::
        // return 'Hallo ' . $this->angka; // Tidak bisa menggunakan $this
        return 'Hallo ' . self::$angka;
    }
}

// Mengakses Static Property
// Perhatikan: Kita tidak perlu 'new ContohStatic()'
// Kita panggil Langsung Class-nya
echo ContohStatic::$angka;
echo "<br>";

// Menjalankan Static Method
echo ContohStatic::hallo();
