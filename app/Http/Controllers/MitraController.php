<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\CalonMitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function indexMitra()
    {
        // Ambil data mitra beserta relasi calonMitra
        $mitra = Mitra::where('status', 'diterima')->get();

        // Kirim data ke view
        return view('ecommerce-customers', compact('mitra'));
    }

    public function updateCalonMitra(Request $request, $nomor)
    {
        $calonMitra = Mitra::findOrFail($nomor);
        $data = $request->except(['ktp', 'pas']);

        if ($request->hasFile('ktp')) {
            $data['upload_ktp'] = $request->file('ktp')->store('ktp', 'public');
        }

        if ($request->hasFile('pas')) {
            $data['upload_foto'] = $request->file('pas')->store('foto', 'public');
        }

        $calonMitra->update($data);

        return redirect()->route('mitra.index')->with('success', 'Data mitra berhasil diupdate.');
    }

    public function deleteCalonMitra(Request $request)
    {
        $mitra = Mitra::where('id', $request->id)->first();

        if ($mitra) {
            $mitra->delete();
            return redirect()->route('mitra.index')->with('success', 'Data mitra berhasil dihapus.');
        }

        return redirect()->route('mitra.index')->with('error', 'Data mitra tidak ditemukan.');
    }
}
