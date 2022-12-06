<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purchase_methods = [
            'نقدا',
            'تمويل بنك',
            'تمويل شركة',
            'دفعة اولى كاش والمتبقي تمويل',
        ];

        foreach ($purchase_methods as $purchase_method) {
            DB::table('purchase_methods')->insert([
                'name' => $purchase_method,
                'created_at' => now(),
            ]);
        }
    }
}
