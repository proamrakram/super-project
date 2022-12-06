<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_statues = [
            'جديد',
            'ربط بعرض',
            'مغلق',
            'جاري متابعة الطلب',
            'لم يتم متابعة الطلب',
            'معلق',
        ];

        foreach ($order_statues as $order_statue) {
            DB::table('order_statuses')->insert([
                'name' => $order_statue,
                'created_at' => now(),
            ]);
        }
    }
}
