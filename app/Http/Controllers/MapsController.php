<?php

namespace App\Http\Controllers;

use App\Models\Mitra;

class MapsController extends Controller
{
    public function index()
    {
        // Ambil data calon mitra dengan status "diterima"
        $calonMitra = Mitra::where('status', 'diterima')->get();

        return view('gerobaklistrik-peta-sebaran', compact('calonMitra'));
    }
}
