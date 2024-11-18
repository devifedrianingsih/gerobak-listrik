<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function indexMitra()
    {
        // Ambil semua data mitra yang sudah diterima
        $mitras = Mitra::all(); // Mengambil data dari model Mitra

        // Kirim data ke view
        return view('ecommerce-customers', compact('mitras')); // Kirim $mitras ke view ecommerce-customers
    }
}
