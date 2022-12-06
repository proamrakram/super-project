<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Services\MediatorService;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CreateMediator extends Component
{
    use LivewireAlert;

    public $name;
    public $code;
    public $phone_number;
    public $type = 'office';

    public function render()
    {
        return view('livewire.create-mediator');
    }

    protected function rules()
    {
        return [
            'name' => ['required'],
            'phone_number' => ['required'],
            'type' => ['nullable', 'in:office,individual'],
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'phone_number.required' => 'هذا الحقل مطلوب',
            'phone.required' => 'هذا الحقل مطلوب',
            'type.required' => 'هذا الحقل مطلوب',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->validate();
    }

    public function store(MediatorService $mediatorService)
    {
        $validatedData = $this->validate();
        $mediatorService->store($validatedData);
        $this->alert('success', '', [
            'toast' => true,
            'position' => 'center',
            'timer' => 3000,
            'text' => '👍 تم إضافة الوسيط بنجاح',
            'timerProgressBar' => true,
        ]);

        $this->emit('updateMediators');
    }
}
