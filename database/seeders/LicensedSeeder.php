<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LicensedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $licenseds = [
            'سكني',
            'سكني استثماري',
            'تجاري استثماري',
            'خدمات'
        ];

        foreach ($licenseds as $licensed) {
            DB::table('licenseds')->insert([
                'name' => $licensed,
                'created_at' => now(),
            ]);
        }
    }
}
