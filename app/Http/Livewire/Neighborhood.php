<?php

namespace App\Http\Livewire;

use App\Models\Neighborhood as ModelsNeighborhood;
use Livewire\Component;
use Livewire\WithPagination;

class Neighborhood extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $rows_number = 10;
    public $search = '';
    public $status = null;
    public $city_id = null;
    public $filters = [];

    public function render()
    {
        $this->status == 'all' ? $this->status = null : null;
        $this->city_id == 'all' ? $this->city_id = null : null;


        $this->filters['status'] = $this->status;
        $this->filters['city_id'] = $this->city_id;
        $this->filters['search'] = $this->search;

        $neighborhoods = ModelsNeighborhood::data()->filters($this->filters)->paginate($this->rows_number);

        if ($neighborhoods->count() < 9) {
            $this->resetPage();
        }

        return view('livewire.neighborhood', [
            'neighborhoods' => $neighborhoods
        ]);
    }

    public function callNeighborhoodModal($neighborhood_id)
    {
        $this->emit('neighborhoodModal', $neighborhood_id);
    }

    public function updateStatus($neighborhood_id)
    {
        $neighborhood = ModelsNeighborhood::find($neighborhood_id);
        if ($neighborhood->status == 1) {
            $neighborhood->update(['status' => 2]);
        } else {
            $neighborhood->update(['status' => 1]);
        }
    }
}

