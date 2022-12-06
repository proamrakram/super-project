<?php

namespace App\Http\Livewire;

use App\Models\Reservation as ModelsReservation;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Reservation extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $listeners = ['updateReservation', 'changeWebsiteMode'];
    protected $paginationTheme = 'bootstrap';

    public $rows_number = 10;
    public $search = '';
    public $reservation_status = null;
    public $filters = [];
    public $website_mode = false;
    public $date_from;
    public $date_to;

    public function updateReservation()
    {
        $this->reset();
        $this->filters['date_from'] = ModelsReservation::min('date_from');
        $this->filters['date_to'] = ModelsReservation::max('date_to');
        $this->date_from = ModelsReservation::min('date_from');
        $this->date_to = ModelsReservation::max('date_to');
    }

    public function mount()
    {
        $user = User::find(auth()->id());

        $this->date_from = ModelsReservation::min('date_from');
        $this->date_to = ModelsReservation::max('date_to');
        $this->filters['date_from'] = $this->date_from;
        $this->filters['date_to'] = $this->date_to;

        if ($user) {
            if ($user->userSettings->website_mode == 'light-layout dark-layout') {
                $this->website_mode = true;
            } else {
                $this->website_mode = false;
            }
        }
    }
    public function changeWebsiteMode()
    {
        $user = User::find(auth()->id());
        if ($user) {
            if ($user->userSettings->website_mode == 'light-layout dark-layout') {
                $this->website_mode = true;
            } else {
                $this->website_mode = false;
            }
        }
    }

    public function updated($propertyName)
    {

        if ($propertyName == 'rows_number') {
            $this->resetPage();
        }
    }

    public function getReservations()
    {
        $this->reservation_status == 'all' ? $this->reservation_status = null : null;

        $this->filters['search'] = $this->search;
        $this->filters['reservation_status'] = $this->reservation_status;

        return ModelsReservation::data()->filters($this->filters)->paginate($this->rows_number);
    }

    public function dateFrom()
    {
        $this->filters['date_from'] = $this->date_from;
    }

    public function dateTo()
    {
        $this->filters['date_to'] = $this->date_to;
    }

    public function render()
    {
        $reservations = $this->getReservations();

        if ($reservations->count() < 9) {
            $this->resetPage();
        }

        return view('livewire.reservation', [
            'reservations' => $reservations
        ]);
    }

    public function changeReservationStatus($reservation_id)
    {
        $reservation = ModelsReservation::find($reservation_id);
        if ($reservation) {
            if ($reservation->status == 1) {
                $reservation->update(['status' => 2]);
            } else {
                $reservation->update(['status' => 1]);
            }
        }

        $this->alert('success', '', [
            'toast' => true,
            'position' => 'center',
            'timer' => 3000,
            'text' => '👍 تم تغيير حالة الحجز بنجاح',
            'timerProgressBar' => true,
        ]);
    }

    public function callReservationModal($reservation_id)
    {
        return $this->emit('reservationModal', $reservation_id);
    }
}
