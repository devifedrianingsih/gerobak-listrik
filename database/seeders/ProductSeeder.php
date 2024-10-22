<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // Import model Product

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan beberapa produk ke database
        Product::create([
            'ProductName' => 'Gerobak A',
            'ProductDescription' => 'Gerobak untuk franchise modern',
            'Price' => 1000000,
            'Stock' => 10,
            'ProductRating' => 5.0,
            'LatestUpdate' => now(),
            'CategoryID' => 1, // Pastikan kategori dengan ID 1 sudah ada
        ]);

        Product::create([
            'ProductName' => 'Bahan Baku Puyuh',
            'ProductDescription' => 'Bahan baku unggas puyuh',
            'Price' => 500000,
            'Stock' => 20,
            'ProductRating' => 4.8,
            'LatestUpdate' => now(),
            'CategoryID' => 2, // Pastikan kategori dengan ID 2 sudah ada
        ]);

        Product::create([
            'ProductName' => 'Gerobak B',
            'ProductDescription' => 'Gerobak portabel untuk usaha makanan ringan',
            'Price' => 1200000,
            'Stock' => 15,
            'ProductRating' => 4.5,
            'LatestUpdate' => now(),
            'CategoryID' => 1, // Pastikan kategori dengan ID 1 sudah ada
        ]);
    }
}