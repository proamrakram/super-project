<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $property_types = [
            'ارض',
            'فيلا',
            'شقة',
            'شاليه',
            'عمارة'
        ];

        foreach ($property_types as $property_type) {
            DB::table('property_types')->insert([
                'name' => $property_type,
                'created_at' => now(),
            ]);
        }
    }
}
