<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\PembayaranProduk;
use App\Models\Mitra;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    // Tampilkan data pembayaran
    public function index()
    {
        $payments = Pembayaran::all(); // Ambil semua data dari tabel pembayaran
        return view('ecommerce-payment', compact('payments'));
    }

    // Terima pembayaran
    public function approve($id)
    {
        $payment = Pembayaran::findOrFail($id);
    
        // Pastikan status diubah menjadi 'approved'
        $payment->status = 'approved';
        $payment->save();
    
        // Cek apakah data sudah ada di tabel orders
        $existingOrder = Order::where('name', $payment->name)
            ->where('total', $payment->total)
            ->first();
    
            // Jika belum ada, buat data baru di tabel orders
            if (!$existingOrder) {

            // Tentukan kategori (Mitra atau Non Mitra)
            $isMitra = Mitra::where('nama_mitra', $payment->name)->exists();
            $category = $isMitra ? 'mitra' : 'non mitra';
        
            // Buat ID Pesanan
            // Ambil inisial dari nama (2 huruf pertama)
            $initial = strtoupper(substr($payment->name, 0, 2));

            // Tentukan kode kategori untuk ID Pesanan
            $categoryCode = $isMitra ? 'M' : 'N'; // 'M' untuk mitra, 'N' untuk non-mitra

            // Gabungkan inisial dengan kode kategori
            $prefix = $initial . $categoryCode;

            // Cari pesanan terakhir berdasarkan inisial + kode kategori
            $lastOrder = Order::where('order_id', 'LIKE', $prefix . '%')
                ->orderBy('order_id', 'desc')
                ->first();

            // Tentukan nomor berikutnya
            if ($lastOrder) {
                $lastNumber = (int) substr($lastOrder->order_id, 3); // Ambil angka dari ID Pesanan terakhir
                $nextNumber = $lastNumber + 1;
            } else {
                $nextNumber = 1; // Jika belum ada, mulai dari 1
            }

            // Format nomor menjadi 3 digit
            $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

            // Gabungkan prefix dan nomor untuk ID Pesanan
            $orderId = $prefix . $formattedNumber;
            
            // Masukkan data ke tabel orders
            Order::create([
                'order_id' => $orderId,
                'name' => $payment->name,
                'category' => $category,
                'total' => $payment->total,
                'pickup_method' => $payment->pickup_delivery,
                'status' => 'menunggu',
                'tanggal' => $payment->created_at->toDateString(), // Gunakan format ISO-8601 untuk kolom tanggal
                'payment_id' => $payment->id, // Isi relasi dengan ID pembayaran

            ]);
        }
    
        return redirect()->route('admin.payments.index')->with('success', 'Pembayaran berhasil diterima dan dipindahkan ke Orders.');
    }
    

    // Tolak pembayaran
    public function reject($id)
    {
        $payment = Pembayaran::findOrFail($id);
        $payment->status = 'rejected'; // Ubah status menjadi rejected
        $payment->save();
    
        return redirect()->route('admin.payments.index')->with('success', 'Pembayaran berhasil ditolak.');
    }
}
