<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Memanggil seeder untuk model CalonMitra
        $this->call(CalonMitraSeeder::class); // Pastikan CalonMitraSeeder sudah ada
    }
}
