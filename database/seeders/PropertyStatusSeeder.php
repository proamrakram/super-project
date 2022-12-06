<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $property_statuses = [
            'شاغر',
            'محجوز',
            'تم البيع'
        ];

        foreach ($property_statuses as $property_status) {
            DB::table('property_statuses')->insert([
                'name' => $property_status,
                'created_at' => now(),
            ]);
        }
    }
}
