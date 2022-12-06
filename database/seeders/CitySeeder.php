<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            'QTF' =>  'القطيف',
            'TRT' =>  'جزيرة تاروت',
            'SYHT' => 'سيهات',
            'ANK' => 'عنك',
            'SFWA' => 'صفوى',
            'BMM' => 'الدمام',
            'KHBR' => 'الخبر',
            'DHRN' => 'الظهران',
            'RYD' => 'الرياض',
        ];

        foreach ($cities as $code => $city) {

            DB::table('cities')->insert([
                'name' => $city,
                'code' => $code,
                'status' => 1,
                'created_at' => now(),
            ]);
        }
    }
}
