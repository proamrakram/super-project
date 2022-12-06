<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderNoteStatuseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_note_statuses = [
            'تم التواصل مع العميل',
            'لم يتم التواصل مع العميل',
            'العميل لا يرغب',
            'تعليق الطلب',
        ];

        foreach ($order_note_statuses as $order_note_statuse) {
            DB::table('order_note_statuses')->insert([
                'name' => $order_note_statuse,
                'created_at' => now(),
            ]);
        }
    }
}
