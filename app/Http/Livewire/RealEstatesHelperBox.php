<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Services\RealEstatesService;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class RealEstatesHelperBox extends Component
{
    use LivewireAlert;
    public $active_neighborhood = 'active';
    public $selected_neighborhood = true;

    public $active_order_note = '';
    public $selected_order_note = false;

    public $order_note_status_name = '';


    public $city_name;
    public $city_code;

    public $city_id = 1;
    public $neighborhood_name;

    public $city = true;
    public $neighborhood = true;
    public $order_note_status = true;


    public function render()
    {
        return view('livewire.real-estates-helper-box');
    }

    protected function rules()
    {
        if ($this->selected_neighborhood && $this->city) {

            return [
                'city_name' => ['required', 'unique:cities,name'],
                'city_code' => ['required', 'unique:cities,code']
            ];
        }

        if ($this->selected_neighborhood && $this->neighborhood) {
            return [
                'city_id' => ['required', 'exists:cities,id'],
                'neighborhood_name' => ['required', 'string']
            ];
        }

        if ($this->selected_order_note && $this->order_note_status) {

            return [
                'order_note_status_name' => ['required', 'unique:order_note_statuses,name'],
            ];
        }
    }

    protected function messages()
    {
        return [
            'city_name.required' => 'هذا الحقل مطلوب',
            'city_code.required' => 'هذا الحقل مطلوب',
            'city_name.unique' => 'المدينة موجودة مسبقا',
            'city_code.unique' => 'رمز الكود مستخدم لمنطقة اخرى، يرجى إدخال رمز مختلف',
            'city_id.required' => 'هذا الحقل مطلوب',
            'city_id.exists' => 'رقم المدينة غير موجود',
            'neighborhood_name.required' => 'هذا الحقل مطلوب',


            'order_note_status_name.required' => 'هذا الحقل مطلوب',
            'order_note_status_name.unique' => 'هذه الحالة موجودة بالفعل',

        ];
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'city_name' || $propertyName == 'city_code') {
            $this->city = true;
        }

        if ($propertyName == 'city_id' || $propertyName == 'neighborhood_name') {
            $this->neighborhood = true;
        }

        if ($propertyName == 'order_note_status_name') {
            $this->order_note_status = true;
        }

        $this->validateOnly($propertyName);
    }

    public function changeTheme($form)
    {
        $this->active_neighborhood = '';
        $this->active_order_note = '';
        $this->selected_order_note = false;
        $this->selected_neighborhood = false;

        if ($form ==  'neighborhood') {
            $this->active_neighborhood = 'active';
            $this->selected_neighborhood = true;
        }

        if ($form == 'order_notes') {
            $this->active_order_note = 'active';
            $this->selected_order_note = true;
        }
    }

    public function saveCity(RealEstatesService $realEstatesService)
    {
        $this->city = true;
        $this->neighborhood = false;
        $validatedData = $this->validate();
        $realEstatesService->storeCity($validatedData);
        $this->city = false;

        $this->alert('success', '', [
            'toast' => true,
            'position' => 'top-start',
            'timer' => 3000,
            'text' => '👍 تم تحديث المدن بنجاح',
            'timerProgressBar' => true,
        ]);
    }

    public function neighborhoodSave(RealEstatesService $realEstatesService)
    {
        $this->neighborhood = true;
        $this->city = false;
        $validatedData = $this->validate();
        $realEstatesService->storeNeighborhood($validatedData);
        $this->neighborhood = false;
        $this->neighborhood_name = '';
        $this->alert('success', '', [
            'toast' => true,
            'position' => 'top-start',
            'timer' => 3000,
            'text' => '👍 تم تحديث الأحياء بنجاح',
            'timerProgressBar' => true,
        ]);
    }

    public function saveOrderNoteStatus(RealEstatesService $realEstatesService)
    {
        $this->order_note_status = true;
        $this->neighborhood = false;
        $this->city = false;

        $validatedData = $this->validate();

        $realEstatesService->storeOrderNoteStatus($validatedData);
        $this->order_note_status = false;
        $this->order_note_status_name = '';

        $this->alert('success', '', [
            'toast' => true,
            'position' => 'center',
            'timer' => 3000,
            'text' => '👍 تم تحديث ملاحظات الطلبات بنجاح',
            'timerProgressBar' => true,
        ]);
    }
}
