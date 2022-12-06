<?php

namespace App\Http\Livewire;

use App\Events\NewOrder as EventsNewOrder;
use App\Http\Controllers\Services\OrderService;
use App\Models\Order;
use App\Models\User;
use App\Notifications\NewOrder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EditOrder extends Component
{
    use LivewireAlert;
    public $listeners = ["openOrderModal"];

    public $order;

    #Form One
    public $customer_name = '';
    public $customer_phone = '';
    public $employer_name = '';
    public $employee_type = 'public';
    public $order_status_id = 1;
    public $support_eskan = 1;

    #Form Two
    public $property_type_id = 1;
    public $city_id = 1;
    public $branch_id = 1;
    public $area = '';
    public $price_from = '';
    public $price_to = '';
    public $desire_to_buy_id = 1;
    public $purch_method_id = 1;
    public $avaliable_amount = '';

    #Form Three
    public $assign_to = 1;
    public $notes = '';

    public $customer_id;
    public $user_id;
    public $offer_id;
    public $closed_date;
    public $who_edit;
    public $who_cancel;

    #message search
    public $customers = [];
    public $success = false;
    public $failure = false;
    public $search_customer_value = '';
    public $selected_customer_value = '';

    public $customer_info = 'active';
    public $real_info = '';
    public $notes_info = '';

    public $is_assignable = false;

    public function render()
    {
        return view('livewire.edit-order');
    }

    public function step($form)
    {
        $this->customer_info = '';
        $this->real_info = '';
        $this->notes_info = '';

        if ($form == 'customer_info') {
            $this->customer_info = 'active';
        }

        if ($form == 'real_info') {
            $this->real_info = 'active';
        }

        if ($form == 'notes_info') {
            $this->notes_info = 'active';
        }
    }

    public function openOrderModal($order_id)
    {

        $order = Order::find($order_id);

        $this->order = $order;

        #Form One
        $this->customer_name = $order->customer_name;
        $this->customer_phone = $order->customer_phone;
        $this->employer_name = $order->employer_name;
        $this->employee_type = $order->employee_type;
        $this->order_status_id = $order->order_status_id;
        $this->support_eskan = $order->support_eskan;

        #Form Two
        $this->property_type_id = $order->property_type_id;
        $this->city_id = $order->city_id;
        $this->branch_id = $order->branch_id;
        $this->area = number_format((int)$order->area);
        $this->price_from = number_format((int)$order->price_from);
        $this->price_to = number_format((int)$order->price_to);
        $this->desire_to_buy_id = $order->desire_to_buy_id;
        $this->purch_method_id = $order->purch_method_id;
        $this->avaliable_amount = number_format((int)$order->avaliable_amount);

        #Form Three
        $assign_to = null;
        if (getUserMarketers()->first()) {
            $assign_to = getUserMarketers()->first()->id;
        }
        $this->assign_to = $order->assign_to ?? $assign_to;
        $this->notes = $order->notes;
    }

    protected function rules()
    {
        return [
            #Form One
            'customer_name' => ['required'],
            'customer_phone' => ['required', 'min:10', 'max:10'],
            'employer_name' => ['required'],
            'employee_type' => ['required'],
            'order_status_id' => ['required'],
            'support_eskan' => ['required'],

            #Form Two
            'property_type_id' => ['required'],
            'city_id' => ['required'],
            'branch_id' => ['required'],
            'area' => ['required'],
            'price_from' => ['required'],
            'price_to' => ['required'],
            'desire_to_buy_id' => ['required'],
            'purch_method_id' => ['required'],
            'avaliable_amount' => ['required'],

            #Form Three
            'assign_to' => ['nullable'],
            'notes' => ['nullable'],

        ];
    }

    protected function messages()
    {
        return [
            #Form One
            'customer_name.required' => 'هذا الحقل مطلوب',
            'customer_phone.required' => 'هذا الحقل مطلوب',
            'employer_name.required' => 'هذا الحقل مطلوب',
            'employee_type.required' => 'هذا الحقل مطلوب',
            'order_status_id.required' => 'هذا الحقل مطلوب',
            'support_eskan.required' => 'هذا الحقل مطلوب',

            'customer_phone.min' => 'يجب ان يكون رقم الجوال 10 ارقام',
            'customer_phone.max' => 'يجب ان يكون رقم الجوال 10 ارقام',

            #Form Two
            'property_type_id.required' => 'هذا الحقل مطلوب',
            'city_id.required' => 'هذا الحقل مطلوب',
            'branch_id.required' => 'هذا الحقل مطلوب',
            'area.required' => 'هذا الحقل مطلوب',
            'price_from.required' => 'هذا الحقل مطلوب',
            'price_to.required' => 'هذا الحقل مطلوب',
            'desire_to_buy_id.required' => 'هذا الحقل مطلوب',
            'purch_method_id.required' => 'هذا الحقل مطلوب',
            'avaliable_amount.required' => 'هذا الحقل مطلوب',

            #Form Three
            'assign_to.required' => 'هذا الحقل مطلوب',
            // 'notes.required' => 'هذا الحقل مطلوب',
        ];
    }

    public function updated($propertyName)
    {

        if ($propertyName == 'price_from') {
            $this->price_from = number_format((int)str_replace(',', '', $this->price_from));
        }

        if ($propertyName == 'price_to') {
            $this->price_to = number_format((int)str_replace(',', '', $this->price_to));
        }

        if ($propertyName == 'area') {
            $this->area = number_format((int)str_replace(',', '', $this->area));
        }

        if ($propertyName == 'avaliable_amount') {
            $this->avaliable_amount = number_format((int)str_replace(',', '', $this->avaliable_amount));
        }

        $this->validateOnly($propertyName);
    }

    public function update(OrderService $orderService)
    {
        $this->avaliable_amount = (int)str_replace(',', '', $this->avaliable_amount);
        $this->price_from = (int)str_replace(',', '', $this->price_from);
        $this->price_to = (int)str_replace(',', '', $this->price_to);
        $this->area = (int)str_replace(',', '', $this->area);

        $validatedData = $this->validate();
        $old_assign_to = $this->order->assign_to;
        $updated_order = $orderService->update($this->order, $validatedData);

        if ($updated_order->assign_to != $old_assign_to) {
            $this->sendNotification($updated_order);
        }

        $this->alert('success', '', [
            'toast' => true,
            'position' => 'center',
            'timer' => 3000,
            'text' => '👍 تم تحديث الطلبات بنجاح',
            'timerProgressBar' => true,
        ]);
        $this->emit('updateOrders');
        $this->emit('updateOrderMarketer');
    }

    public function sendNotification($order)
    {
        $user = User::find($order->assign_to);
        $user->notify(new NewOrder($order));
        event(new EventsNewOrder($user));
    }
}
