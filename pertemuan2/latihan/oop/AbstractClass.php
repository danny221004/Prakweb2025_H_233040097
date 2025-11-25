<?php
// KENAPA INI ABSTRACT CLASS?
// Class 'Animal' (Hewan) adalah konsep yg terlalu umum.
// Kita tidak mungkin membuat object "new Hewan()".

// 1. Definisi Abstract Class
abstract class Animal
{
    public $name = 'Kucing';

    // === INI ABSTRACT METHOD ===
    // 2. Abstract Method
    // Method ini HANYA deklarasi, tidak punya isi ({})
    // Ini adalah "KONTRAK" atau "ATURAN WAJIB"
    public abstract function run();
}

// 3. Child Class
// Class Cat adalah class yang mewarisi (extends) Animal
class Cat extends Animal
{
    // 4. Implementasi wajib
    // Jika method 'run()' ini tidak ada, PHP akan ERROR!
    // Karena Cat "berjanji" untuk mengisi kontrak 'run()'
    public function run()
    {
        // Di sini kita definisikan perilaku 'run'
        return "$this->name itu Berlari";
    }
}

// 5. Cara Penggunaan
// Kita hanya bisa membuat object dari class turunannya (Cat)
$cat = new Cat();

// Panggil method yang sudah diisi oleh class Cat
echo $cat->run(); // Kucing itu Berlari
