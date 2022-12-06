<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $streets = [
            'Street 1',
            'Street 2',
            'Street 3'
        ];

        foreach ($streets as $index => $street) {
            DB::table('streets')->insert([
                'name' => $street,
                'street_number' => $index,
                'created_at' => now(),
            ]);
        }
    }
}
