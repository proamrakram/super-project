<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Notifications extends Component
{
    protected $listeners = ['updateNotifications'];

    public $user;
    public $notifications;
    public $unreadNotifications;
    public $readNotifications;

    public function updateNotifications()
    {
        $this->set();
    }

    public function mount()
    {
        $this->set();
    }

    public function set()
    {
        $this->user = User::find(auth()->id());
        $this->notifications = $this->user->notifications;
        $this->unreadNotifications = $this->user->unreadNotifications;
        $this->readNotifications = $this->user->readNotifications;
    }

    public function render()
    {
        return view('livewire.notifications');
    }

    public function read($notification)
    {
        $unreadNotification = $this->unreadNotifications->where('id', $notification['id'])->first();

        if ($unreadNotification) {
            $unreadNotification->markAsRead();
        }
        return redirect($unreadNotification->data['link']);
    }

    public function readAll()
    {
        $this->unreadNotifications->markAsRead();
        $this->set();
    }
}
