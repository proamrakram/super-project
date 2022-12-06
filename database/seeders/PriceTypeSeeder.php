<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $price_types = [
            'سعر',
            'سوم'
        ];

        foreach ($price_types as $price_type) {
            DB::table('price_types')->insert([
                'name' => $price_type,
                'created_at' => now(),
            ]);
        }
    }
}
