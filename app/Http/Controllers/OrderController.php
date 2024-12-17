<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Mitra;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all(); // Ambil semua data orders
        return view('ecommerce-orders', compact('orders'));
    }

    public function createFromPayments()
    {
        // Ambil data dari pembayaran
        $payments = Pembayaran::where('status', 'approved')->get();

        foreach ($payments as $payment) {
            // Tentukan kategori (mitra atau non mitra)
            $isMitra = Mitra::where('name', $payment->name)->exists();
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

            // Simpan data ke tabel orders
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

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat dari pembayaran.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,sudah diambil',
        ]);
    
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
    
        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
    
    public function showDetail($id)
    {
        $order = Order::with('pembayaran', 'pembayaran.produkPembayaran')->findOrFail($id);

        if (!$order->pembayaran) {
            return response()->json(['error' => 'Data pembayaran tidak ditemukan'], 404);
        }

        return response()->json([
            'order_id' => $order->order_id,
            'tanggal' => $order->pembayaran->created_at->format('d-m-Y'),
            'name' => $order->pembayaran->name,
            'address' => $order->pembayaran->manual_address,
            'phone' => $order->pembayaran->phone,
            'category' => $order->category,
            'produk' => $order->pembayaran->produkPembayaran->map(function ($produk) {
                return [
                    'nama_produk' => $produk->nama_produk,
                    'harga_produk' => $produk->harga_produk,
                    'kuantitas' => $produk->kuantitas,
                    'total_harga' => $produk->total_harga,
                ];
            }),
            'total' => $order->pembayaran->total,
            'payment_method' => $order->pembayaran->payment_method,
            'pickup_method' => $order->pickup_method,
            'bukti_bayar_url' => asset('storage/' . $order->pembayaran->upload_bukti),
        ]);
    }

    public function showInvoice($id)
    {
        $order = Order::with('pembayaran', 'pembayaran.produkPembayaran')->findOrFail($id);
    
        if (!$order->pembayaran) {
            return response()->json(['error' => 'Data pembayaran tidak ditemukan'], 404);
        }
    
        return response()->json([
            'order_id' => $order->order_id,
            'tanggal' => $order->pembayaran->created_at->format('d-m-Y'),
            'name' => $order->pembayaran->name,
            'address' => $order->pembayaran->manual_address,
            'phone' => $order->pembayaran->phone,
            'category' => $order->category,
            'produk' => $order->pembayaran->produkPembayaran->map(function ($produk) {
                return [
                    'nama_produk' => $produk->nama_produk,
                    'harga_produk' => $produk->harga_produk,
                    'kuantitas' => $produk->kuantitas,
                    'total_harga' => $produk->total_harga,
                ];
            }),
            'total' => $order->pembayaran->total,
            'payment_method' => $order->pembayaran->payment_method,
            'pickup_method' => $order->pickup_method,
        ]);
    }

public function fetchInvoice($id)
{
    $order = Order::with('produk')->findOrFail($id);

    $items = $order->produk->map(function ($item) {
        return [
            'name' => $item->nama_produk,
            'quantity' => $item->quantity,
            'price' => $item->harga_satuan,
            'total' => $item->total_harga
        ];
    });

    return response()->json([
        'invoice_id' => $order->order_id,
        'date' => $order->created_at->format('d-m-Y'),
        'customer_name' => $order->name,
        'customer_address' => $order->address,
        'customer_phone' => $order->phone,
        'items' => $items,
        'subtotal' => $order->subtotal,
        'shipping' => $order->shipping_cost,
        'total' => $order->total
    ]);
}
}