<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $branches_ids = getBranches()->pluck('id')->toArray();

        #Super Admin
        DB::table('users')->insert([
            'name' => 'عمرو اكرم',
            'phone' =>  '0599916672',
            'email' => 'proamrakram@gmail.com',
            'password' => Hash::make('0599916672'),
            'user_status' => 'active',
            // 'branches_ids' => json_encode([1, 2, 3]),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'user_type' => 'superadmin',
            'verification_code' => null,
            'created_at' => now(),
        ]);

        #Super Admin
        DB::table('users')->insert([
            'name' => 'زكي الجعفري',
            'phone' =>  '0557453000',
            'email' => 'jafaryza@gmail.com',
            'password' => Hash::make('0557453000'),
            'user_status' => 'active',
            // 'branches_ids' => json_encode([1, 2, 3]),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'user_type' => 'superadmin',
            'verification_code' => null,
            'created_at' => now(),
        ]);


        #Super Admin
        DB::table('users')->insert([
            'name' => 'خالد الشكر',
            'phone' =>  '0568860970',
            'email' => 'alshakar.khalid@gmail.com',
            'password' => Hash::make('0568860970'),
            'user_status' => 'active',
            // 'branches_ids' => json_encode([1, 2, 3]),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'user_type' => 'superadmin',
            'verification_code' => null,
            'created_at' => now(),
        ]);


        #Super Admin
        DB::table('users')->insert([
            'name' => 'زهير السكيري',
            'phone' =>  '0505859599',
            'email' => 'zuhair.alsukairi@almadaralwaad.sa',
            'password' => Hash::make('0505859599'),
            'user_status' => 'active',
            // 'branches_ids' => json_encode([1, 2, 3]),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'user_type' => 'superadmin',
            'verification_code' => null,
            'created_at' => now(),
        ]);



        #Admin
        DB::table('users')->insert([
            'name' => 'admin',
            'phone' =>  '0599916638',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'user_status' => 'active',
            // 'branches_ids' => json_encode([1, 2, 3]),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'user_type' => 'admin',
            'verification_code' => null,
            'created_at' => now(),
        ]);


        $users_types = [
            1 => 'admin',
            2 => 'marketer',
            3 => 'office'
        ];

        $count = 0;

        while ($count < 10) {
            $user_type = $users_types[random_int(1, 3)];

            $count = $count + 1;

            DB::table('users')->insert([
                'name' => Str::random(7),
                'phone' =>  '059' . random_int(1111111, 9999999),
                'email' => $user_type . $count . '@gmail.com',
                'password' => Hash::make('123456789'),
                'user_status' => 'active',
                // 'branches_ids' => json_encode([1, 2, 3]),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'user_type' => $user_type,
                'verification_code' => null,
                'created_at' => now(),
            ]);
        }
    }
}
