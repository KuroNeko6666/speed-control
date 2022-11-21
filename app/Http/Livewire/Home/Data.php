<?php

namespace App\Http\Livewire\Home;

use App\Models\User;
use Livewire\Component;
use App\Models\DataDevice;
use Livewire\WithPagination;
use App\Http\Livewire\Home\DataSidebar;

class Data extends Component
{
    use WithPagination;
    public $user;
    public $data_created = null;
    public $speed = null;
    public $data_device;
    public $device_id = 0;
    public $current_device;
    public $user_devices;
    public $search;
    protected $paginationTheme = 'bootstrap';


    public function mount()
    {
        $this->user = User::find(auth()->user()->id);
        $this->user_devices = $this->user->device()->get() ?? collect([]);

        if($this->user_devices->count()){

            if($this->device_id == 0) {
                $this->device_id = request('device') ? request('device') : $this->user_devices->first()->device_id;
            }
            foreach ($this->user_devices as $item) {
                $device = $item->device()->first();
                if($device->id == $this->device_id){
                    $this->current_device = $device;
                }
            }
        }

    }

    public function render()
    {
        $data = new DataSidebar;
        $menus = $data->data('data');
        // $data_device = $this->current_device->data->filter(['search' => $this->search])->paginate(10)->withQueryString();
        $data_device =DataDevice::latest()->filter(['device_id' => $this->current_device->id])->filter(['search' => $this->search])->paginate(10)->withQueryString();

        return view('livewire.home.data', [ 'data' => $data_device])
        ->layout('layouts.home', [
            'user' => $this->user,
            'data_created' => $this->data_created,
            'speed' => $this->speed,
            'menus' => $menus,
        ]);
    }
}
