<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Services\MediatorService;
use App\Models\Mediator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EditMediator extends Component
{
    use LivewireAlert;
    public $listeners = ["mediatorModal"];

    public $name;
    public $code;
    public $phone_number;
    public $type = 'office';

    public $mediator;

    public function render()
    {
        return view('livewire.edit-mediator');
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

    public function mediatorModal($mediator_id)
    {
        $mediator = Mediator::find($mediator_id);
        $this->name = $mediator->name;
        $this->code = $mediator->id;
        $this->phone_number = $mediator->phone_number;
        $this->type = $mediator->type;

        $this->mediator = $mediator;
    }

    public function update(MediatorService $mediatorService)
    {
        $validatedData = $this->validate();
        $mediatorService->update($this->mediator, $validatedData);
        $this->alert('success', '', [
            'toast' => true,
            'position' => 'center',
            'timer' => 3000,
            'text' => '👍 تم تحديث الوسيط بنجاح',
            'timerProgressBar' => true,
        ]);

        $this->emit('updateMediators');
    }
}
