<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CalonMitra;

class CalonMitraSeeder extends Seeder
{
    public function run()
    {
        // Menghitung nomor terakhir yang ada di tabel calon_mitra
        $lastNomor = CalonMitra::max('nomor'); // Ambil nilai nomor tertinggi

        // Jika tidak ada data, mulai dari 1
        $nextNomor = $lastNomor ? $lastNomor + 1 : 1;

        // Menambahkan data dummy ke tabel calon_mitra dengan nomor yang otomatis
        CalonMitra::create([
            'nomor' => $nextNomor,
            'nama_calon_mitra' => 'Devi Fedrianingsih',
            'email_calon_mitra' => 'devifn@example.com',
            'no_hp_calon_mitra' => '081234567890',
            'kota_calon_mitra' => 'Jakarta',
            'alamat_calon_mitra' => 'Jl. Raya No. 10, Jakarta',
            'status' => 'belum diproses',
        ]);

        // Menambahkan data lainnya dengan nomor yang terurut
        $nextNomor++;

        CalonMitra::create([
            'nomor' => $nextNomor,
            'nama_calon_mitra' => 'Shereen Alen',
            'email_calon_mitra' => 'shereenalen@example.com',
            'no_hp_calon_mitra' => '082345678901',
            'kota_calon_mitra' => 'Bandung',
            'alamat_calon_mitra' => 'Jl. Merdeka No. 15, Bandung',
            'status' => 'belum diproses',
        ]);

        
        // Menambahkan data lainnya dengan nomor yang terurut
        $nextNomor++;

        CalonMitra::create([
            'nomor' => $nextNomor,
            'nama_calon_mitra' => 'Meilani Jesica',
            'email_calon_mitra' => 'meilanijesica@example.com',
            'no_hp_calon_mitra' => '081278563218',
            'kota_calon_mitra' => 'Bogor',
            'alamat_calon_mitra' => 'Jl. Surya Kencana No. 1, Bogor',
            'status' => 'belum diproses',
        ]);
    }
}

