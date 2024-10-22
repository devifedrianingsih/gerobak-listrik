<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str; // Tambahkan ini

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat user testing dengan email unik
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'unique_email_' . Str::random(5) . '@example.com', // Membuat email unik
        ]);

        // Memanggil seeder untuk model Admin
        $this->call(AdminSeeder::class);

        // Memanggil seeder untuk model Customer
        $this->call(CustomerSeeder::class);
        
        // Tambahkan pemanggilan seeder untuk Category
        $this->call(CategorySeeder::class); // Pastikan CategorySeeder sudah ada
    }
}
