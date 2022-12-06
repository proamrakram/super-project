<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            DB::table('order_notes')->insert([
                'note' => Str::random(10),
                'status' => 1,
                'order_id' => $order->id,
                'user_id' => $order->user_id,
                'created_at' => now(),
            ]);
        }
    }
}
