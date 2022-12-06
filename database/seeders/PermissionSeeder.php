<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            DB::table('permissions')->insert([
                'user_id' => $user->id,
                'manage_mediators' => 1,
                'can_add_offers' => 1,
                'can_edit_offers' => 1,
                'can_show_offers' => 1,
                'can_delete_offers' => 1,
                'can_cancel_offers' => 1,
                'can_add_orders' => 1,
                'can_edit_orders' => 1,
                'can_show_orders' => 1,
                'can_delete_orders' => 1,
                'can_cancel_orders' => 1,
                'can_add_vouchers' => 1,
                'can_edit_vouchers' => 1,
                'can_show_vouchers' => 1,
                'can_delete_vouchers' => 1,
                'can_cancel_vouchers' => 1,
                'can_add_sells' => 1,
                'can_edit_sells' => 1,
                'can_show_sells' => 1,
                'can_delete_sells' => 1,
                'can_cancel_sells' => 1,
                'can_booking' => 1,
                // 'can_send_sms' => 1,
                'can_send_sms_collection' => 1,
                'can_send_sms_individually' => 1,
                'created_at' => now()
            ]);
        }
    }
}
