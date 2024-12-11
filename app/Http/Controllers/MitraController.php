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
        $mitras = Mitra::with('calonMitra')->get();

        // Kirim data ke view
        return view('ecommerce-customers', compact('mitras'));
    }

    public function getCalonMitraData($nomor)
    {
        $calonMitra = CalonMitra::where('nomor', $nomor)->first();

        if (!$calonMitra) {
            return response()->json(['error' => 'Calon mitra tidak ditemukan'], 404);
        }

        return response()->json($calonMitra);
    }
}