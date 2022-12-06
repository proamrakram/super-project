<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            1 => 'office',
            2 => 'individual'
        ];

        foreach (range(1, 100) as $i) {
            DB::table('mediators')->insert([
                'user_id' => 1,
                'name' => 'proamrakram',
                'phone_number' => '059' . random_int(1111111, 9999999),
                'type' => $types[random_int(1, 2)],
                'status' => random_int(1, 2),
                'created_at' => now(),
            ]);
        }
    }
}
