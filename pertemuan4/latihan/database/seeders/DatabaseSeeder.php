<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Membuat 5 User secara manual (Sesuai Tugas: 5 Users)
        // Kita gunakan loop agar username user1 s/d user5 rapi
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => 'User ' . $i,
                'username' => 'user' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        // 2. Membuat 2 Category secara otomatis (Sesuai Tugas: 2 Category)
        // Kita simpan ke variabel $categories agar bisa dipake di posts
        $categories = Category::factory(2)->create();

        // 3. Membuat 10 Post secara otomatis (Sesuai Tugas: 10 Posts)
        // recycle() digunakan agar post yang dibuat terhubung ke user dan category yang sudah ada
        Post::factory(10)->recycle(User::all())->recycle($categories)->create();
    }
}