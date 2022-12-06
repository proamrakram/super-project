<?php

namespace App\Http\Livewire;

use App\Models\Customer as ModelsCustomer;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Customer extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $listeners = ['updateCustomers'];
    protected $paginationTheme = 'bootstrap';

    public $rows_number = 10;
    public $search;
    public $customer_status = null;
    public $customer_city_id;
    public $customer_sector;
    public $filters = [];


    public function updateCustomers()
    {
        $this->reset();
    }

    public function getCustomers()
    {
        $this->customer_status == 'all' ? $this->customer_status = null : null;
        $this->customer_sector == 'all' ? $this->customer_sector = null : null;
        $this->customer_city_id == 'all' ? $this->customer_city_id = null : null;

        $this->filters['search'] = $this->search;
        $this->filters['customer_status'] = $this->customer_status;
        $this->filters['city_id'] = $this->customer_city_id;
        $this->filters['employee_type'] = $this->customer_sector;

        return ModelsCustomer::data()->filters($this->filters)->paginate($this->rows_number);
    }

    public function changeCustomerStatus($customer_id)
    {
        $customer = ModelsCustomer::find($customer_id);
        if ($customer) {
            if ($customer->status == 1) {
                $customer->update(['status' => 2]);
            } else {
                $customer->update(['status' => 1]);
            }
        }

        $this->alert('success', '', [
            'toast' => true,
            'position' => 'center',
            'timer' => 3000,
            'text' => '👍 تم تغيير حالة العميل بنجاح',
            'timerProgressBar' => true,
        ]);
    }

    public function callCustomerModal($customer_id)
    {
        return $this->emit('customerModal', $customer_id);
    }

    public function render()
    {
        $customers = $this->getCustomers();
        if ($customers->count() < 9) {
            $this->resetPage();
        }

        return view('livewire.customer', [
            'customers' => $customers
        ]);
    }
}
