<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Services\NeighborhoodService;
use App\Models\Neighborhood;
use Livewire\Component;

class EditNeighborhood extends Component
{
    public $listeners = ["neighborhoodModal"];

    public $neighborhood_name;
    public $city_id;
    public $neighborhood;

    public function render()
    {
        return view('livewire.edit-neighborhood');
    }

    protected function rules()
    {
        return [
            'city_id' => ['required',],
            'neighborhood_name' => ['required', 'unique:neighborhoods,name,' . $this->neighborhood->id]
        ];
    }

    protected function messages()
    {
        return [
            'neighborhood_name.required' => 'هذا الحقل مطلوب',
            'city_id.required' => 'هذا الحقل مطلوب',
            'neighborhood_name.unique' => 'اسم الحي موجود بشكل مسبق',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function neighborhoodModal($neighborhood_id)
    {
        $neighborhood = Neighborhood::data()->find($neighborhood_id);

        $this->neighborhood = $neighborhood;
        $this->city_id = $neighborhood->city_id;
        $this->neighborhood_name = $neighborhood->name;
    }

    public function editNeighborhood(NeighborhoodService $neighborhoodService)
    {
        $validatedData = $this->validate();
        $neighborhoodService->update($this->neighborhood, $validatedData);
        return redirect()->route('panel.neighborhoods')->with('message', '👍 تم تحديث الحي بنجاح');
    }
}
