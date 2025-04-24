<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Order;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $year = now()->year;

        $year = now()->year;

        foreach (range(1, 4) as $month) { // Januari - April
            $daysInMonth = Carbon::create($year, $month)->daysInMonth;

            for ($i = 1; $i <= 10; $i++) {
                $randomDay = rand(1, $daysInMonth);
                $randomDate = Carbon::create($year, $month, $randomDay)->setTime(rand(0, 23), rand(0, 59), rand(0, 59));

                // Ambil ID terakhir dari order dan increment
                $lastId = Order::max('id') ?? 0;
                $orderId = 'DEM' . ($lastId + 1);

                Order::create([
                    'order_id'      => $orderId,
                    'tanggal'       => $randomDate->format('Y-m-d'),
                    'payment_id'    => null,
                    'name'          => 'Pelanggan ' . $i . ' - ' . $month,
                    'category'      => ['mitra', 'non mitra'][rand(0, 1)],
                    'total'         => rand(100000, 500000),
                    'pickup_method' => ['delivery', 'pickup'][rand(0, 1)],
                    'status'        => ['menunggu', 'sudah diambil'][rand(0, 1)],
                    'mitra_id'      => rand(1, 7),
                    'created_at'    => $randomDate,
                    'updated_at'    => $randomDate,
                ]);
            }
        }
    }
}
