<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'manual_address' => 'nullable|string',
            'city' => 'required|string|max:255',
            'postal' => 'required|string|max:10',
            'phone' => 'required|string|max:15',
            'payment_method' => 'required|string|max:50',
            'pickup_delivery' => 'required|string|max:50',
            'total' => 'required|numeric|min:0',
            'upload_bukti' => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:2048',
            'produk_list' => 'required|json', // Validasi produk
        ]);

        // Bersihkan string 'Rp' dari total dan ubah menjadi angka
        $validated['total'] = str_replace(['Rp', ',', ' '], '', $validated['total']);

        // Pastikan total adalah angka setelah dibersihkan
        if (!is_numeric($validated['total'])) {
            return redirect()->back()->withErrors(['total' => 'Total harus berupa angka setelah prefiks "Rp".']);
        }

        // Upload file bukti transfer jika ada
        if ($request->hasFile('upload_bukti')) {
            $validated['upload_bukti'] = $request->file('upload_bukti')->store('bukti-transfers', 'public');
        }

        // Simpan data ke database
        $pembayaran = Pembayaran::create($validated);

        // Ambil data produk dari JSON
        $produkList = json_decode($request->input('produk_list'), true);

        // Simpan setiap produk ke tabel pembayaran_produk
        foreach ($produkList as $produk) {
            $pembayaran->produkPembayaran()->create([
                'nama_produk' => $produk['nama_produk'],
                'harga_produk' => $produk['harga_produk'],
                'kuantitas' => $produk['kuantitas'],
                'total_harga' => $produk['harga_produk'] * $produk['kuantitas'], // Hitung total_harga
            ]);
        }        

        return redirect()->back()->with('success', 'Pembayaran berhasil disimpan!');
    }
}
