<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 0;
        $employer_types = [1 => 'public', 2 => 'private'];

        while ($count < 10) {

            $count = $count + 1;
            $customer = Customer::find(random_int(1, 100));
            $user = User::find(random_int(1, 10));
            $branch_id = 1;
            $branch = Branch::find(1);

            if ($user && $branch) {
                $order_code = ucwords($branch->code) . '-' . $count . '-' . 'USR' . $user->id;
            }


            DB::table('orders')->insert([
                'order_code' => $order_code,
                'order_status_id' => random_int(1, 6),
                'customer_id' => $customer->id,
                'user_id' => $user->id,
                // 'offer_id' => ,
                'customer_name' => $customer->name,
                'customer_phone' => $customer->phone,
                'employer_name' => Str::random(7),
                'employee_type' => $employer_types[random_int(1, 2)],
                'support_eskan' => random_int(1, 2),
                'property_type_id' => random_int(1, 5),
                'city_id' => random_int(1, 6),
                'area' => random_int(100, 300),
                'price_from' => random_int(100, 1000),
                'price_to' => random_int(1200, 3000),
                'avaliable_amount' => random_int(100, 1000),
                'purch_method_id' => random_int(1, 4),
                'desire_to_buy_id' => random_int(1, 3),
                // 'assign_to' =>
                'branch_id'  => $branch_id,
                'notes' => Str::random(16),
                'who_add' => 1,
                'created_at' => now()->addDays(random_int(1, 30)),
                // 'closed_date',
                // 'assign_to_date'
                // 'who_edit',
                // 'who_cancel',
            ]);
        }
    }
}
