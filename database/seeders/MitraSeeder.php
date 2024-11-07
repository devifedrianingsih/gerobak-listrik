<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mitra;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh data calon mitra
        Mitra::insert([
            [
                'nomor' => 'MT001',
                'nama' => 'Ahmad Taufiq',
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Merpati No. 3, Jakarta',
                'berkas' => 'berkas_ahmad.pdf',
                'status' => 'belum_diproses', // status default
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor' => 'MT002',
                'nama' => 'Siti Rahmawati',
                'no_hp' => '081987654321',
                'alamat' => 'Jl. Kenanga No. 10, Bandung',
                'berkas' => 'berkas_siti.pdf',
                'status' => 'belum_diproses',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor' => 'MT003',
                'nama' => 'Budi Santoso',
                'no_hp' => '082345678912',
                'alamat' => 'Jl. Melati No. 5, Surabaya',
                'berkas' => 'berkas_budi.pdf',
                'status' => 'belum_diproses',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}