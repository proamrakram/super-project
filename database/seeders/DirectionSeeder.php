<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directions = [
            'Street 1',
            'Street 2',
            'Street 3'
        ];

        foreach ($directions as $direction) {
            DB::table('directions')->insert([
                'name' => $direction,
                'created_at' => now(),
            ]);
        }
    }
}
