<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 100) as $i) {
            DB::table('reservations')->insert([
                'user_id' => 1,
                'customer_name' => 'proamrakram',
                'customer_id' => 1,
                'price' => 1000,
                'status' => random_int(1, 2),
                'date_from' => now(),
                'date_to' => now()->addDays(10),
                'note' => Str::random(16)
            ]);
        }
    }
}
