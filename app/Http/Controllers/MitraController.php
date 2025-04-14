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
        $calonMitra->update($request->all());
        return redirect()->route('mitra.index')->with('success', 'Data mitra berhasil di update.');
    }
}
