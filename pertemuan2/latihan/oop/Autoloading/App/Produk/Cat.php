<?php
// Inheritance animal dengan sebuah abstract method
class Cat extends Animal
{
    // Wajib di kontrak/interface
    public function run()
    {
        return "$this->name itu Berlari";
    }
}
