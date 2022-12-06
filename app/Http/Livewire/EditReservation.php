<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Services\ReservationService;
use App\Models\Reservation;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EditReservation extends Component
{
    use LivewireAlert;
    public $listeners = ["reservationModal"];

    public $customer_name;
    public $price;
    public $date_from;
    public $date_to;
    public $note;

    public function render()
    {
        return view('livewire.edit-reservation');
    }

    protected function rules()
    {
        return [
            'customer_name' => ['required'],
            'price' => ['required'],
            'date_from' => ['required'],
            'date_to' => ['required'],
            'note' => ['required'],
        ];
    }

    protected function messages()
    {
        return [
            'customer_name' => 'هذا الحقل مطلوب',
            'price' => 'هذا الحقل مطلوب',
            'date_from' => 'هذا الحقل مطلوب',
            'date_to' => 'هذا الحقل مطلوب',
            'note' => 'هذا الحقل مطلوب',
        ];
    }


    public function updated($propertyName)
    {
        if ($propertyName == 'price') {
            $this->price = number_format((int)str_replace(',', '', $this->price));
        }

        $this->validateOnly($propertyName);
    }

    public function reservationModal($reservation_id)
    {
        $reservation = Reservation::find($reservation_id);
        $this->customer_name = $reservation->customer_name;
        $this->price =  number_format($reservation->price);
        $this->date_from = $reservation->date_from;
        $this->date_to = $reservation->date_to;
        $this->note = $reservation->note;

        $this->reservation = $reservation;
    }

    public function update(ReservationService $reservationService)
    {
        $this->price = (int)str_replace(',', '', $this->price);

        $validatedData = $this->validate();
        $reservationService->update($this->reservation, $validatedData);

        $this->alert('success', '', [
            'toast' => true,
            'position' => 'center',
            'timer' => 3000,
            'text' => '👍 تم تحديث الحجز بنجاح',
            'timerProgressBar' => true,
        ]);

        $this->emit('updateReservation');
    }
}
