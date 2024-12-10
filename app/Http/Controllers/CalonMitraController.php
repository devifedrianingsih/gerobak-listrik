<?php

namespace App\Http\Controllers;

use App\Models\CalonMitra;
use App\Models\Mitra;
use Illuminate\Http\Request;

class CalonMitraController extends Controller
{
    public function index()
    {
        $calonMitra = CalonMitra::where('status', 'belum diproses')->get();
        return view('ecommerce-potential-partners', compact('calonMitra'));
    }

    public function terimaMitra($nomor)
    {
        // Temukan calon mitra berdasarkan nomor (bukan id)
        $calonMitra = CalonMitra::findOrFail($nomor);
    
        // Memeriksa apakah calon mitra sudah diterima sebelumnya
        if ($calonMitra->status === 'terima') {
            return redirect()->route('calon-mitra.index')->with('error', 'Mitra ini sudah terdaftar.');
        }
    
        // Ambil inisial kota dari alamat calon mitra
        $inisialKota = strtoupper(substr($calonMitra->kota_calon_mitra, 0, 3)); 
    
        // Ambil nomor urut terakhir berdasarkan inisial kota
        $lastMitra = Mitra::where('id_mitra', 'LIKE', "{$inisialKota}%")
            ->orderBy('id_mitra', 'desc')
            ->first();
    
        // Tentukan nomor urut berikutnya
        $nextNumber = $lastMitra ? (int) substr($lastMitra->id_mitra, 3) + 1 : 1;
    
        // Format ID dengan inisial kota dan nomor urut
        $idMitraBaru = sprintf("%s%03d", $inisialKota, $nextNumber);
    
        // Menambahkan calon mitra ke daftar mitra
        Mitra::create([
            'id_mitra' => $idMitraBaru,
            'nama_mitra' => $calonMitra->nama_calon_mitra,
            'alamat_mitra' => $calonMitra->alamat_calon_mitra,
            'email_mitra' => $calonMitra->email_calon_mitra,
            'no_hp_mitra' => $calonMitra->no_hp_calon_mitra,
            'status' => 'aktif'     // Status aktif
        ]);
    
        // Mengubah status calon mitra menjadi 'terima' dan menyimpan ID Mitra baru
        $calonMitra->update([
            'status' => 'diterima',
            'id_mitra' => $idMitraBaru
        ]);
    
        // Redirect ke halaman calon mitra dengan pesan sukses
        return redirect()->route('calon-mitra.index')->with('success', 'Calon Mitra diterima dan ditambahkan sebagai Mitra.');
    }

    public function tolakMitra($nomor)
    {
        // Temukan calon mitra berdasarkan nomor (bukan id)
        $calonMitra = CalonMitra::where('nomor', $nomor)->firstOrFail();
    
        // Mengubah status calon mitra menjadi 'ditolak'
        $calonMitra->update(['status' => 'ditolak']);
    
        // Redirect ke halaman calon mitra dengan pesan sukses
        return redirect()->route('calon-mitra.index')->with('success', 'Calon Mitra ditolak.');
    }

    public function post(Request $request)
    {
        $data = [
            'nama_calon_mitra' => $request->nama,
            'email_calon_mitra' => $request->email,
            'no_hp_calon_mitra' => $request->telp,
            'kota_calon_mitra' => $request->kota,
            'alamat_calon_mitra' => $request->alamat,
            'status' => $request->status,
            'tanggal_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jk,
            'domisili' => $request->dom,
            'provinsi' => $request->prov,
            'kode_pos' => $request->pos,
            'status' => "Belum Diproses",
            'negara' => $request->negara,
            'latitude' => $request->lat,
            'longitude' => $request->lon,
        ];

        CalonMitra::create($data);

        // Redirect ke halaman konfirmasi
        return view('post-mitra');
    }
    
    public function show($nomor)
    {
        // Cari data berdasarkan nomor
        $calonMitra = CalonMitra::where('nomor', $nomor)->first();

        if (!$calonMitra) {
            return response()->json(['message' => 'Mitra tidak ditemukan.'], 404);
        }

        // Kembalikan data dalam format JSON
        return response()->json($calonMitra);
    }
}
