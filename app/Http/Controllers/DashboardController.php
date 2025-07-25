<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // 1. 📈 Statistik Ringkasan (Card di atas)
        // Tampilkan dalam bentuk kotak kecil (stat box/card), misal 4–6 card:
        // 🔢 Total Produk (products)
        // 👥 Total Mitra Aktif (mitra)
        // 📦 Total Pesanan (orders)
        // 💸 Total Pembayaran Berhasil (pembayaran)
        // 📊 Total Pendapatan Hari Ini / Bulan Ini (pembayaran_produk atau orders)

        // 2. 🕐 Aktivitas Terbaru
        // 🛒 Pesanan terbaru (dari orders)
        // 👤 Mitra yang baru daftar / baru di-approve (dari mitra)

        // 3. 📊 Grafik / Visualisasi
        // Grafik Penjualan:
        // Line chart jumlah pesanan per hari/minggu (orders)
        // Bar chart total pendapatan per kategori (categories + products + orders)
        // Pie chart Kategori Produk Terlaris (products + orders)
        // Grafik Jumlah Mitra Baru per Bulan (mitra)

        $topCard = $this->topCard();
        $secondCard = $this->secondCard();
        $thirdCard = $this->thirdCard();
        $fourthCard = $this->fourthCard();
        $fifthCard = $fourthCard->sortByDesc('percentage')->values()->take(5);
        $labels = $fourthCard->map(function($sale) {
            return $sale->mitra->kode_mitra; // Ambil kode_mitra untuk label
        })->toArray();

        return view('gerobaklistrik-dashboard', compact('topCard', 'secondCard', 'thirdCard', 'fourthCard', 'fifthCard', 'labels'));
    }

    public function root(Request $request)
    {
        if(view()->exists($request->path())) {
            return view($request->path());
        } else {
            return abort(404);
        }
    }
    
    private function topCard()
    {
        return [
            'product_count' => Product::count(),
            'mitra_count' => Mitra::count(),
            'monthly_order_count' => Order::whereMonth('created_at', date('m'))->count(),
            'monthly_success_order_count' => Order::where('status', 'sudah diambil')->whereMonth('created_at', date('m'))->count(),
            'monthly_revenue_sum' => Order::whereMonth('created_at', date('m'))->sum('total'),
        ];
    }

    private function secondCard()
    {
        return [
            'mitra_per_month' => $this->getMitraMonthlyCount(),
        ];
    }

    private function thirdCard()
    {
        return [
            'monthly_income' => $this->getMonthlyIncome(),
            'monthly_income_average' => round(collect($this->getMonthlyIncome())->avg(), 2)
        ];
    }

private function getMitraMonthlyCount()
{
    $year = now()->year;

    $data = Mitra::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
        ->where('status', 'diterima') // ✅ hanya mitra yang diterima
        ->whereYear('created_at', $year)
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->pluck('total', 'month');

    // Lengkapi data jadi 12 bulan
    $result = [];
    for ($i = 1; $i <= 12; $i++) {
        $result[] = $data[$i] ?? 0;
    }

    return $result;
}


    private function getMonthlyIncome()
    {
        $year = now()->year;

        $data = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->whereYear('created_at', $year)
            ->where('status', 'sudah diambil')
            ->groupByRaw('MONTH(created_at)')
            ->pluck('total', 'month');

        // Lengkapi data jadi 12 bulan
        $result = [];
        for ($i = 1; $i <= 12; $i++) {
            $result[] = $data[$i] ?? 0;
        }

        return $result;
    }

    private function fourthCard()
    {
        // Ambil total penjualan per mitra (status 'sudah diambil')
        $salesData = Order::where('status', 'sudah diambil')
            ->select(DB::raw('kode_mitra, SUM(total) as total_sales'))
            ->groupBy('kode_mitra')
            ->get();

        $salesData->load('mitra');

        // Ambil total penjualan keseluruhan untuk menghitung persentase
        $totalSales = Order::where('status', 'sudah diambil')->sum('total');

        // Hitung persentase per mitra
        $percentages = $salesData->map(function ($sale) use ($totalSales) {
            $sale->percentage = ($sale->total_sales / $totalSales) * 100;
            $sale->percentage = intval(number_format(($sale->total_sales / $totalSales) * 100, 0));
            return $sale;
        });

        return $percentages;
    }
}
