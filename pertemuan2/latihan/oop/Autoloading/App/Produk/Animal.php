<?php
// Abstract class dengan 1 minimal abstract method
abstract class Animal
{
    public $name = 'Kucing';
    // Wajib dimiliki oleh child nya
    public abstract function run();
}
