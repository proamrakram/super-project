<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WebsiteMode extends Component
{
    public $dark = 'light-layout dark-layout';
    public $mood = 'dark';
    public function render()
    {
        return view('livewire.website-mode');
    }

    public function changeMode()
    {
        $user = auth()->user();
        $user_settings = $user->userSettings;

        if ($user_settings) {
            if ($user_settings->website_mode == $this->dark) {
                $user_settings->update(['website_mode' => '']);
                $this->mood = 'light';
            } else {
                $user_settings->update(['website_mode' => $this->dark]);
                $this->mood = 'dark';
            }
        }

        $this->emit('changeWebsiteMode');
    }
}
