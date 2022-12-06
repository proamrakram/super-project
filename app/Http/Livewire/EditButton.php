<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditButton extends Component
{
    public $customer_id;

    public function mount($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    public function render()
    {
        return view('livewire.edit-button');
    }

    public function callCustomerModal()
    {
        $this->emit('customerModal', $this->customer_id);
    }
}
