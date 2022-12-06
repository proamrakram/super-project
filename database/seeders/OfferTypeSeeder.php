<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offer_types = [
            'مباشر',
            'غير مباشر',
            'مكتب',
        ];

        foreach ($offer_types as $offer_type) {
            DB::table('offer_types')->insert([
                'name' => $offer_type,
                'created_at' => now(),
            ]);
        }
    }
}
