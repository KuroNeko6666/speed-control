<?php

namespace App\Http\Livewire\Home;

use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $user;
    public $user_data;
    public $device;


    public function mount()
    {
        $this->user_data = User::find($this->user->id);
        $this->device = $this->user->device();

    }

    public function render()
    {
        return view('livewire.home.dashboard');
    }
}
