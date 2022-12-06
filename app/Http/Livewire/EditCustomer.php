<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Services\CustomerService;
use App\Models\Customer;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EditCustomer extends Component
{
    use LivewireAlert;
    public $listeners = ["customerModal"];
    public $customer;
    public $name = '';
    public $phone = '';
    public $email = '';
    public $identification_number = '';
    public $employer_name = '';
    public $employee_type = '';
    public $is_support = '';
    public $city_id = '';
    public $building_number = '';
    public $street_name = '';
    public $neighborhood_name = '';
    public $zip_code = '';
    public $additional_number = '';
    public $unit_number = '';
    public $status = 1;

    public $basic_active = 'active';
    public $work_active = '';
    public $eskan_active = '';

    protected function rules()
    {
        return [
            'name' => ['required'],
            'phone' => ['required', 'unique:customers,phone, ' . $this->customer->id],
            'email' => ['nullable', 'unique:customers,email,' . $this->customer->id],
            'identification_number' => ['nullable', 'unique:customers,nationality_id,' . $this->customer->id],
            'employer_name' => ['nullable',],
            'employee_type' => ['nullable', 'in:public,private'],
            'is_support' => ['nullable', 'in:1,0'],
            'city_id' => ['nullable', 'exists:cities,id'],
            'building_number' => ['nullable', 'unique:customers,building_number,' . $this->customer->id],
            'street_name' => ['nullable'],
            'neighborhood_name' => ['nullable'],
            'zip_code' => ['nullable'],
            'additional_number' => ['nullable'],
            'unit_number' => ['nullable'],
            'status' => ['in:1,2']
        ];
    }

    public function step($step)
    {
        $this->basic_active = '';
        $this->work_active = '';
        $this->eskan_active = '';

        if ($step == 'basic_active') {
            $this->basic_active = 'active';
        }

        if ($step == 'work_active') {
            $this->work_active = 'active';
        }

        if ($step == 'eskan_active') {
            $this->eskan_active = 'active';
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.edit-customer');
    }

    public function customerModal($customer_id)
    {
        $customer = Customer::find($customer_id);

        $this->customer = $customer;
        $this->name = $customer->name;
        $this->phone = $customer->phone;
        $this->email = $customer->email;
        $this->identification_number = $customer->nationality_id;
        $this->employer_name = $customer->employer_name;
        $this->employee_type = $customer->employee_type;
        $this->is_support = $customer->support_eskan;
        $this->city_id = $customer->city_id;
        $this->building_number = $customer->building_number;
        $this->street_name = $customer->street_name;
        $this->neighborhood_name = $customer->neighborhood_name;
        $this->zip_code = $customer->zip_code;
        $this->additional_number = $customer->addtional_number;
        $this->unit_number = $customer->unit_number;
        $this->status = $customer->status;
    }


    protected function messages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'phone.required' => 'هذا الحقل مطلوب',
            'email.required' => 'هذا الحقل مطلوب',
            'identification_number.required' => 'هذا الحقل مطلوب كرقم',
            'employee_type.required' => 'هذا الحقل مطلوب',
            'employer_name.required' => 'هذا الحقل مطلوب',
            'is_support.required' => 'هذا الحقل مطلوب',
            'city_id.required' => 'هذا الحقل مطلوب',
            'building_number.required' => 'هذا الحقل مطلوب كرقم',
            'street_name.required' => 'هذا الحقل مطلوب',
            'neighborhood_name.required' => 'هذا الحقل مطلوب',
            'zip_code.required' => 'هذا الحقل مطلوب كرقم',
            'additional_number.required' => 'هذا الحقل مطلوب كرقم',
            'unit_number.required' => 'هذا الحقل مطلوب كرقم',

            'phone.unique' => 'هذا الرقم مستخدم مسبقا',
            'email.unique' => 'الايميل مستخدم مسبقا',
            'identification_number.unique' => 'رقم الهوية مستخدم مسبقا',
            'building_number.unique' => 'رقم المبنى موجود مسبقا',

            'employee_type.in' => 'حدث خطا في النظام',
            'is_support.in' => 'حدث خطا في النظام',

            'city_id.exists' => 'حدث خطا في النظام',

            'building_number.numeric' => 'القيمة يجب ان تكون رقم',
            'zip_code.numeric' => 'القيمة يجب ان تكون رقم',
            'additional_number.numeric' => 'القيمة يجب ان تكون رقم',
            'unit_number.numeric' => 'القيمة يجب ان تكون رقم',

        ];
    }


    public function updateCustomer(CustomerService $customerService)
    {
        $validatedData = $this->validate();
        $customerService->update($this->customer, $validatedData);
        $this->alert('success', '', [
            'toast' => true,
            'position' => 'center',
            'timer' => 3000,
            'text' => '👍 تم تحديث العميل بنجاح',
            'timerProgressBar' => true,
        ]);

        $this->emit('updateCustomers');
    }
}
