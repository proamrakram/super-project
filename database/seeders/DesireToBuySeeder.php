<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesireToBuySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desire_to_buys = [
            'جاهز للشراء',
            'بعد 6 شهور',
            'بعد سنة',
            'بعد سنتين',
        ];

        foreach ($desire_to_buys as $desire_to_buy) {
            DB::table('desire_to_buys')->insert([
                'name' => $desire_to_buy,
                'created_at' => now(),
            ]);
        }
    }
}
