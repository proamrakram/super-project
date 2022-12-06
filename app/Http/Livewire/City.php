<?php

namespace App\Http\Livewire;

use App\Models\City as ModelsCity;
use Livewire\Component;
use Livewire\WithPagination;

class City extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $rows_number = 10;
    public $search = '';
    public $status = null;
    public $filters = [];

    public function render()
    {
        $this->status == 'all' ? $this->status = null : null;

        $this->filters['status'] = $this->status;
        $this->filters['search'] = $this->search;

        $cities = ModelsCity::data()->filters($this->filters)->paginate($this->rows_number);
        if ($cities->count() < 9) {
            $this->resetPage();
        }

        return view('livewire.city', ['cities' => $cities]);
    }

    public function callCityModal($city_id)
    {
        $this->emit('cityModal', $city_id);
    }

    public function updateStatus($city_id)
    {
        $city = ModelsCity::find($city_id);
        if ($city->status == 1) {
            $city->update(['status' => 2]);
        } else {
            $city->update(['status' => 1]);
        }
    }
}
