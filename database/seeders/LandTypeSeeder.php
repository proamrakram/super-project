<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $land_types = [
            'بطن',
            'زاوية',
            'واجهتان',
            'رأس بلوك'
        ];

        foreach ($land_types as $land_type) {
            DB::table('land_types')->insert([
                'name' => $land_type,
                'created_at' => now(),
            ]);
        }
    }
}
