<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CalonMitra;
use App\Models\Mitra;

class MitraSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua calon mitra yang statusnya 'belum diproses'
        $calonMitraList = CalonMitra::where('status', 'belum diproses')->get();

        // Iterasi setiap calon mitra dan ubah statusnya menjadi 'terima' serta tambahkan ke tabel mitra
        foreach ($calonMitraList as $calonMitra) {

            // Ambil inisial kota dari alamat calon mitra (3 huruf pertama)
            $inisialKota = strtoupper(substr($calonMitra->kota_calon_mitra, 0, 3));

            // Ambil nomor urut terakhir berdasarkan inisial kota
            $lastMitra = Mitra::where('id_mitra', 'LIKE', "{$inisialKota}%")
                ->orderBy('id_mitra', 'desc')
                ->first();

            // Tentukan nomor urut berikutnya
            $nextNumber = $lastMitra ? (int) substr($lastMitra->id_mitra, 3) + 1 : 1;

            // Format ID dengan inisial kota dan nomor urut
            $idMitraBaru = sprintf("%s%03d", $inisialKota, $nextNumber);

            // Tambahkan calon mitra ke tabel mitra
            Mitra::create([
                'id_mitra' => $idMitraBaru,
                'nama_mitra' => $calonMitra->nama_calon_mitra,
                'alamat_mitra' => $calonMitra->alamat_calon_mitra,
                'email_mitra' => $calonMitra->email_calon_mitra,
                'no_hp_mitra' => $calonMitra->no_hp_calon_mitra,
                'status' => 'aktif',
            ]);

            // Ubah status calon mitra menjadi 'terima'
            $calonMitra->update([
                'status' => 'terima',
                'id_mitra' => $idMitraBaru, // Simpan ID Mitra yang baru
            ]);
        }
    }
}
