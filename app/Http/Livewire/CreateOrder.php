<?php

namespace App\Http\Livewire;

use App\Events\NewOrder as EventsNewOrder;
use App\Http\Controllers\Services\OrderService;
use App\Models\Customer;
use App\Models\User;
use App\Notifications\NewOrder;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CreateOrder extends Component
{
    use LivewireAlert;

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

    #message search
    public $customers = [];
    public $success = false;
    public $failure = false;
    public $search_customer_value = '';
    public $selected_customer_value = '';


    public $info_active = 'active';
    public $home_active = '';
    public $note_active = '';

    public function render()
    {
        if ($this->search_customer_value) {
            if ($this->search_customer_value !== $this->selected_customer_value) {
                $customers = Customer::search(['phone', 'nationality_id'], $this->search_customer_value)->paginate(10);

                if ($customers->count()) {
                    $this->customers = $customers->items();
                    $this->success = true;
                    $this->failure = false;
                } else {
                    $this->customers = [];
                    $this->success = false;
                    $this->failure = true;

                    $this->customer_phone = $this->search_customer_value;
                    $this->selected_customer_value = $this->search_customer_value;
                    $this->customer_name = '';
                }
            }
        } else {
            $this->customers = [];
        }

        return view('livewire.create-order');
    }

    public function step($form)
    {
        $this->info_active = '';
        $this->home_active = '';
        $this->note_active = '';

        if ($form == 'info_active') {
            $this->info_active = 'active';
        }

        if ($form == 'home_active') {
            $this->home_active = 'active';
        }

        if ($form == 'note_active') {
            $this->note_active = 'active';
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
        if ($propertyName == 'is_assignable') {
            $marketers = getUserMarketers();
            if ($marketers->count()) {
                $this->assign_to = $marketers->first()->id;
            }
        }

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
        // $this->resetPage();
    }

    public function store(OrderService $orderService)
    {
        $this->avaliable_amount = (int)str_replace(',', '', $this->avaliable_amount);
        $this->price_from = (int)str_replace(',', '', $this->price_from);
        $this->price_to = (int)str_replace(',', '', $this->price_to);
        $this->area = (int)str_replace(',', '', $this->area);

        $validatedData = $this->validate();
        $order = $orderService->store($validatedData);

        $this->alert('success', '', [
            'toast' => true,
            'position' => 'center',
            'timer' => 3000,
            'text' => '👍 تم تحديث الطلبات بنجاح',
            'timerProgressBar' => true,
        ]);

        if ($order && $order->assign_to) {
            $this->sendNotification($order);
        }

        $this->reset();
        $this->emit('updateOrders');
        $this->emit('updateOrderMarketer');
    }

    public function updateField($customer_id)
    {
        $customer = Customer::find($customer_id);
        $this->customer_phone = $customer->phone;
        $this->customer_name = $customer->name;
        $this->employer_name = $customer->employer_name;
        $this->employee_type = $customer->employee_type ?? 'public';
        $this->support_eskan = $customer->support_eskan;
        $this->city_id = $customer->city_id;

        $this->search_customer_value = '';
        $this->customers = [];
    }

    public function sendNotification($order)
    {
        $user = User::find($order->assign_to);
        $user->notify(new NewOrder($order));
        event(new EventsNewOrder($user));
    }
}
