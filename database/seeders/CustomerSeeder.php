<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jika Anda ingin menghapus semua data di tabel customers setiap kali seeder dijalankan, Anda bisa menambahkan:
        // Customer::truncate(); // Hapus semua data di tabel customers

        // Tidak ada data baru yang ditambahkan karena data customer berasal dari calon mitra
    }
}
