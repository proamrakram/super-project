<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Services\CityService;
use App\Models\City;
use Livewire\Component;

class EditCity extends Component
{
    public $listeners = ["cityModal"];

    public $city_name;
    public $city_code;
    public $city;

    public function render()
    {
        return view('livewire.edit-city');
    }

    protected function rules()
    {
        return [
            'city_name' => ['required', 'unique:cities,name, ' . $this->city->id],
            'city_code' => ['required', 'unique:cities,code,' . $this->city->id],
        ];
    }

    protected function messages()
    {
        return [
            'city_name.required' => 'هذا الحقل مطلوب',
            'city_code.required' => 'هذا الحقل مطلوب',

            'city_name.unique' => 'اسم المدينة موجود بشكل مسبق',
            'city_code.unique' => 'كود المدينة موجود بشكل مسبق'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function cityModal($city_id)
    {
        $city = City::data()->find($city_id);

        $this->city = $city;
        $this->city_code = $city->code;
        $this->city_name = $city->name;
    }

    public function editCity(CityService $cityService)
    {
        $validatedData = $this->validate();
        $cityService->update($this->city, $validatedData);
        return redirect()->route('panel.cities')->with('message', '👍 تم تحديث الفرع بنجاح');
    }
}
