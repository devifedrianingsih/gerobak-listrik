<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['CategoryName' => 'Paket Franchise']);
        Category::create(['CategoryName' => 'Bahan Baku Produk']);
        Category::create(['CategoryName' => 'Produk Jadi']);
    }
}
