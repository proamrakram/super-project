<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderEditor;

class OrderService extends Controller
{
    public function getCustomer($data)
    {
        $customer_phone = Customer::where('phone', $data['customer_phone'])->first();
        $customer_card = Customer::where('nationality_id', $data['customer_phone'])->first();
        if ($customer_phone) {
            return $customer_phone;
        } elseif ($customer_card) {
            return $customer_card;
        } else {
            return $this->createCustomer($data);
        }
    }

    public function createCustomer($data)
    {
        return Customer::create([
            'user_id' => auth()->id() ?? $data['assign_to'],
            'name' => $data['customer_name'],
            'phone' => $data['customer_phone'],
            'employer_name' => $data['employer_name'],
            'city_id' => $data['city_id'],
            'support_eskan' => $data['support_eskan'],
            'employee_type' => $data['employee_type'],
            'status' => '1',
            'who_add' => auth()->id() ?? $data['assign_to'],
        ]);
    }

    public function store($data)
    {
        $customer = $this->getCustomer($data);
        $user = auth()->user();

        $customer->update([
            'name' => $data['customer_name'],
            'phone' => $data['customer_phone'],
            'employer_name' => $data['employer_name'],
            // 'city_id' => $data['city_id'],
            'support_eskan' => $data['support_eskan'],
            'employee_type' => $data['employee_type'],
            'who_edit' => auth()->id(),
        ]);

        $order = Order::create([
            'order_code' => '',
            'customer_name' => $customer->name,
            'customer_phone' => $customer->phone,
            'employer_name' => $data['employer_name'],
            'employee_type' => $data['employee_type'],
            'order_status_id' => 1,
            'property_type_id' => $data['property_type_id'],
            'city_id' => $customer->city_id,
            'branch_id' => $data['branch_id'],
            'area' => $data['area'],
            'price_from' => $data['price_from'],
            'price_to' => $data['price_to'],
            'desire_to_buy_id' => $data['desire_to_buy_id'],
            'purch_method_id' => $data['purch_method_id'],
            'avaliable_amount' => $data['avaliable_amount'],
            'assign_to' => $user->user_type == 'marketer' ?  null : $data['assign_to'],
            'support_eskan' => $data['support_eskan'],
            'notes' => $data['notes'],

            'customer_id' => $customer->id,
            'user_id' => auth()->id(),
            'who_add' => auth()->id(),
            'assign_to_date' => $data['assign_to'] ? now() : null,

            // 'offer_id' => $data['offer_id'],
            // 'closed_date' => $data['closed_date'],
            // 'who_edit' => $data['who_edit'],
            // 'who_cancel' => $data['who_cancel'],
        ]);

        $branch = Branch::find($data['branch_id']);

        if ($branch && $order) {
            $order_code = ucwords($branch->code) . '-' . $order->id . '-' . 'USR' . auth()->id();
            $order->update(['order_code' => $order_code]);
        }

        if ($user->user_type == 'admin' || $user->user_type == 'superadmin') {
            $assign_to_id = $data['assign_to'];
            if ($assign_to_id) {
                $marketer_name = getUserName($assign_to_id);
                $link_ma = route('panel.user', $assign_to_id);
                $link_admin =  route('panel.user', $user->id);
                $marketer = "<a href='$link_ma'> $marketer_name</a>";
                $admin = "<a href='$link_admin'>$user->name</a>";
                $note = "تم إسناد الطلب للمسوق $marketer من المدير $admin";
            }
        }

        if ($user->user_type == 'marketer') {
            $marketer_name = getUserName($user->id);
            $link_ma = route('panel.user', $user->id);
            $marketer = "<a href='$link_ma'> $marketer_name</a>";
            $note = "قام المسوق $marketer بإضافة الطلب";
        }

        OrderEditor::create([
            'order_id' => $order->id,
            'user_id' => $user->id,
            'note' => $note,
            'action' => 'add',
        ]);

        return $order;
    }

    public function orderCustomer($data)
    {
        $customer = $this->getCustomer($data);

        $customer->update([
            'name' => $data['customer_name'],
            'phone' => $data['customer_phone'],
            'employer_name' => $data['employer_name'],
            // 'city_id' => $data['city_id'],
            'support_eskan' => $data['support_eskan'],
            'employee_type' => $data['employee_type'],
            'who_edit' => null,
        ]);

        $order = Order::create([
            'order_code' => '',
            'customer_name' => $customer->name,
            'customer_phone' => $customer->phone,
            'employer_name' => $data['employer_name'],
            'employee_type' => $data['employee_type'],
            'order_status_id' => 1,
            'property_type_id' => $data['property_type_id'],
            'city_id' => $customer->city_id,
            'branch_id' => $data['branch_id'],
            'area' => $data['area'],
            'price_from' => $data['price_from'],
            'price_to' => $data['price_to'],
            'desire_to_buy_id' => $data['desire_to_buy_id'],
            'purch_method_id' => $data['purch_method_id'],
            'avaliable_amount' => $data['avaliable_amount'],
            'assign_to' => $data['assign_to'],
            'support_eskan' => $data['support_eskan'],
            'notes' => $data['notes'],

            'customer_id' => $customer->id,
            'user_id' => $data['assign_to'],
            'who_add' => $customer->id,
            'assign_to_date' => $data['assign_to'] ? now() : null,

            // 'offer_id' => $data['offer_id'],
            // 'closed_date' => $data['closed_date'],
            // 'who_edit' => $data['who_edit'],
            // 'who_cancel' => $data['who_cancel'],
        ]);

        $branch = Branch::find($data['branch_id']);

        if ($branch && $order) {
            $order_code = ucwords($branch->code) . '-' . $order->id . '-' . 'USR' . $data['assign_to'];
            $order->update(['order_code' => $order_code]);
        }

        $marketer_name = getUserName($data['assign_to']);

        $assign_to_id = $data['assign_to'];

        $link = route('panel.user', $assign_to_id);

        $marketer = "<a href='$link'>$marketer_name</a>";

        $note = "تم إسناد الطلب للمسوق $marketer من العميل $customer->name باستخدام رابط الدعوة";

        OrderEditor::create([
            'order_id' => $order->id,
            'user_id' =>  $data['assign_to'],
            'note' => $note,
            'action' => 'add',
        ]);

        return $order;
    }

    public function update($order, $data)
    {
        $order->update([
            'customer_name' => $order->customer_name,
            'customer_phone' => $order->customer_phone,
            'employer_name' => $data['employer_name'],
            'employee_type' => $data['employee_type'],
            'order_status_id' => $data['order_status_id'],
            'property_type_id' => $data['property_type_id'],
            'city_id' => $data['city_id'],
            'branch_id' => $data['branch_id'],
            'area' => $data['area'],
            'price_from' => $data['price_from'],
            'price_to' => $data['price_to'],
            'desire_to_buy_id' => $data['desire_to_buy_id'],
            'purch_method_id' => $data['purch_method_id'],
            'avaliable_amount' => $data['avaliable_amount'],
            'assign_to' => $data['assign_to'] ?? null,
            'support_eskan' => $data['support_eskan'],
            'notes' => $data['notes'],

            'customer_id' => $order->customer_id,
            'user_id' => auth()->id(),

            // 'offer_id' => $data['offer_id'],
            // 'closed_date' => $data['closed_date'],
            'who_edit' => auth()->id(),
            // 'who_cancel' => $data['who_cancel'],
        ]);

        $customer = Customer::find($order->customer_id);

        $customer->update([
            'name' => $order->customer_name,
            'phone' => $order->customer_phone,
            'employer_name' => $data['employer_name'],
            // 'city_id' => $data['city_id'],
            'support_eskan' => $data['support_eskan'],
            'employee_type' => $data['employee_type'],
            'who_edit' => auth()->id(),
        ]);

        $user = auth()->user();

        if ($data['assign_to'] && $order->assign_to != $data['assign_to']) {
            $assign_to_id = $data['assign_to'];

            $order->update([
                'assign_to_date' => now(),
                'order_status_id' => 1,
            ]);

            $marketer_name = getUserName($assign_to_id);
            $link_ma = route('panel.user', $assign_to_id);
            $link_admin =  route('panel.user', $user->id);
            $marketer = "<a href='$link_ma'> $marketer_name</a>";
            $admin = "<a href='$link_admin'>$user->name</a>";
            $note = "تم إسناد الطلب للمسوق $marketer من المدير $admin";
        } elseif ($user->user_type == 'admin' || $user->user_type == 'superadmin') {
            $link_admin =  route('panel.user', $user->id);
            $admin = "<a href='$link_admin'>$user->name</a>";
            $note = "قام المدير $admin بتعديل الطلب";
        }

        if ($user->user_type == 'marketer') {
            $marketer_name = getUserName($user->id);
            $link_ma = route('panel.user', $user->id);
            $marketer = "<a href='$link_ma'> $marketer_name</a>";
            $note = "قام المسوق $marketer بتعديل الطلب";
        }

        OrderEditor::create([
            'order_id' => $order->id,
            'user_id' =>  $user->id,
            'note' => $note,
            'action' => 'edit',
        ]);

        return Order::find($order->id);
    }
}
