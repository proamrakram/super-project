<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerService extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function store($data)
    {
        $customer = Customer::create([
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'] ?? null,
            // 'employer_id' => $this->request->email,
            'employer_name' => $data['employer_name'] ?? null,
            'nationality_id' => $data['identification_number'] ?? null,
            // 'NID'  => $this->request->nationality_id,
            'city_id' => $data['city_id'] ?? null,
            'building_number' => $data['building_number'] ?? null,
            'street_name' => $data['street_name'] ?? null,
            'neighborhood_name' => $data['neighborhood_name'] ?? null,
            'zip_code' => $data['zip_code'] ?? null,
            'addtional_number' => $data['additional_number'] ?? null,
            'unit_number' => $data['unit_number'] ?? null,
            'support_eskan' => $data['is_support'] == "yes" ? 1 : 0,
            'employee_type' => $data['employee_type'] ?? null,
            'status' => $data['status']
            // 'who_add',
            // 'who_edit',
        ]);

        return $customer;
    }

    public function update($customer, $data)
    {
        $customer->update([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            // 'employer_id' => $data['email'],
            'employer_name' => $data['employer_name'],
            'nationality_id' => $data['identification_number'],
            'city_id' => $data['city_id'],
            'building_number' => $data['building_number'],
            'street_name' => $data['street_name'],
            'neighborhood_name' =>  $data['neighborhood_name'],
            'zip_code' => $data['zip_code'],
            'addtional_number' => $data['additional_number'],
            'unit_number' => $data['unit_number'],
            'support_eskan' => $data['is_support'],
            'employee_type' => $data['employee_type'],
            'who_edit' => auth()->id(),
            'status' => $data['status']
        ]);

        return true;
    }

    public function changeCustomerStatus($customer_id)
    {
        $customer = Customer::find($customer_id);
        if ($customer->status == 1) {
            $customer->update(['status' => 2]);
        } elseif ($customer->status == 2) {
            $customer->update(['status' => 1]);
        }

        return redirect()->route('panel.customers')->with('message',  '👍 تم تحديث حالة العميل بنجاح',);
    }
}
