<?php

namespace App\Http\Livewire;

use App\Events\NewOrder as EventsNewOrder;
use App\Http\Controllers\Services\OrderService;
use App\Models\User;
use App\Notifications\NewOrder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CustomerOrder extends Component
{
    use LivewireAlert;
    public $first = 'active';
    public $second = '';
    public $third = '';
    public $user;

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
    public $assign_to = null;
    public $notes = '';

    public $is_assignable = false;

    public $customer_id;
    public $user_id;
    public $offer_id;
    public $closed_date;
    public $who_edit;
    public $who_cancel;

    public function mount($user_id)
    {
        $this->user = User::find($user_id);
    }

    public function sequencing($form)
    {
        $this->first = '';
        $this->second = '';
        $this->third = '';
        if ($form == 'first') {
            $this->first = 'active';
        }

        if ($form == 'second') {
            $this->second = 'active';
        }

        if ($form == 'third') {
            $this->third = 'active';
        }
    }

    protected function rules()
    {
        return [
            #Form One
            'customer_name' => ['required'],
            'customer_phone' => ['required', 'min:10', 'max:10'],
            'employer_name' => ['required'],
            'employee_type' => ['required'],
            // 'order_status_id' => ['required'],
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
            // 'order_status_id.required' => 'هذا الحقل مطلوب',
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

    public function store(OrderService $orderService)
    {
        $this->avaliable_amount = (int)str_replace(',', '', $this->avaliable_amount);
        $this->price_from = (int)str_replace(',', '', $this->price_from);
        $this->price_to = (int)str_replace(',', '', $this->price_to);
        $this->area = (int)str_replace(',', '', $this->area);

        $validatedData = $this->validate();
        $validatedData['assign_to'] = $this->user_id;
        $order = $orderService->orderCustomer($validatedData);

        $this->alert('success', '', [
            'toast' => true,
            'position' => 'center',
            'timer' => 6000,
            'text' => '👍 تم إضافة طلبك بنجاح',
            'timerProgressBar' => true,
        ]);

        if ($order && $order->assign_to) {
            $this->sendNotification($order);
        }

        $this->reset();
        $this->emit('updateOrders');
        $this->emit('updateOrderMarketer');
    }

    public function sendNotification($order)
    {
        $user = User::find($order->assign_to);
        $user->notify(new NewOrder($order));
        event(new EventsNewOrder($user));
    }

    public function render()
    {
        return view('livewire.customer-order');
    }
}
