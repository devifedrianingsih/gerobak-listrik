<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Customer;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    // Fungsi untuk menampilkan daftar calon mitra
    public function indexCalonMitra()
    {
        dd("test");
        $mitras = Mitra::all(); // Ambil semua data calon mitra
        dd($mitras); // Ini akan menghentikan eksekusi dan menampilkan data
        return view('ecommerce-potential-partners', compact('mitras')); // Kirim data ke view
    }

    // Fungsi untuk menerima calon mitra dan mengubahnya menjadi customer
    public function terima($id)
    {
        // Temukan calon mitra berdasarkan ID
        $mitra = Mitra::findOrFail($id);
        
        // Periksa apakah calon mitra sudah diterima sebelumnya
        if ($mitra->status === 'terima') {
            return redirect()->route('calon-mitra.index')->with('error', 'Mitra ini sudah diterima sebagai customer.');
        }

        // Ubah status calon mitra menjadi 'terima'
        $mitra->update(['status' => 'terima']);

        // Tambahkan calon mitra ke daftar customer
        Customer::create([
            'nomor' => $mitra->nomor,
            'nama' => $mitra->nama,
            'no_hp' => $mitra->no_hp,
            'alamat' => $mitra->alamat,
        ]);

        // Redirect ke halaman calon mitra dengan pesan sukses
        return redirect()->route('calon-mitra.index')->with('success', 'Mitra diterima dan ditambahkan sebagai customer.');
    }

    // Fungsi untuk menolak calon mitra
    public function tolak($id)
    {
        // Temukan calon mitra berdasarkan ID
        $mitra = Mitra::findOrFail($id);

        // Ubah status calon mitra menjadi 'tolak'
        $mitra->update(['status' => 'tolak']);

        // Redirect ke halaman calon mitra dengan pesan sukses
        return redirect()->route('calon-mitra.index')->with('success', 'Mitra telah ditolak.');
    }
}
