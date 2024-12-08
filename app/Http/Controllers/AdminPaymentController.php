<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
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
        $payment->status = 'approved'; // Update status ke 'approved'
        $payment->save();

        return redirect()->route('admin.payments.index')->with('success', 'Pembayaran diterima.');
    }

    // Tolak pembayaran
    public function reject($id)
    {
        $payment = Pembayaran::findOrFail($id);
        $payment->status = 'rejected'; // Update status ke 'rejected'
        $payment->save();

        return redirect()->route('admin.payments.index')->with('success', 'Pembayaran ditolak.');
    }
}
