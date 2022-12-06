<?php

namespace App\Http\Livewire;

use App\Models\Mediator as ModelsMediator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Mediator extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $listeners = ['updateMediators'];
    protected $paginationTheme = 'bootstrap';

    public $rows_number = 10;
    public $search;
    public $mediator_status = null;
    public $mediator_type = null;
    public $filters = [];


    public function updateMediators()
    {
        $this->reset();
    }

    public function getMediators()
    {
        $this->mediator_status == 'all' ? $this->mediator_status = null : null;
        $this->mediator_type == 'all' ? $this->mediator_type = null : null;

        $this->filters['search'] = $this->search;
        $this->filters['mediator_status'] = $this->mediator_status;
        $this->filters['mediator_type'] = $this->mediator_type;

        return ModelsMediator::data()->filters($this->filters)->paginate($this->rows_number);
    }

    public function changeMediatorStatus($mediator_id)
    {
        $mediator = ModelsMediator::find($mediator_id);
        if ($mediator) {
            if ($mediator->status == 1) {
                $mediator->update(['status' => 2]);
            } else {
                $mediator->update(['status' => 1]);
            }
        }

        $this->alert('success', '', [
            'toast' => true,
            'position' => 'center',
            'timer' => 3000,
            'text' => '👍 تم تغيير حالة الوسيط بنجاح',
            'timerProgressBar' => true,
        ]);
    }

    public function callMediatorModal($mediator_id)
    {
        return $this->emit('mediatorModal', $mediator_id);
    }

    public function render()
    {
        $mediators = $this->getMediators();
        if ($mediators->count() < 9) {
            $this->resetPage();
        }
        return view('livewire.mediator', [
            'mediators' => $mediators
        ]);
    }
}
