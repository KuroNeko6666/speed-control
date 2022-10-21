<?php

namespace App\Http\Livewire\Home;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\DataDevice;
use App\Http\Livewire\Home\DataSidebar;

class Dashboard extends Component
{
    public $user;
    public $user_devices;
    public $device_id = 0;
    public $selected;
    public $all;

    public function mount(){
        $this->user = User::find(auth()->user()->id);
        $this->user_devices = $this->user->device()->get() ?? collect([]);
        $all_device = collect([]);
        $all_speed = collect([]);
        $all_data = collect([]);
        $selected_device = null;
        $selected_data = collect([]);
        $slow = collect([]);
        $normal = collect([]);
        $fast = collect([]);
        $data_created;
        $average = 0;
        function day($subday){
            return Carbon::today()->subDay($subday)->toDateString();
        }

        if($this->user_devices->count()){

            if($this->device_id == 0) {
                $this->device_id = request('device') ? request('device') : $this->user_devices->first()->device_id;
            }
            foreach ($this->user_devices as $item) {
                $device = $item->device()->first();
                $all_device->push($device);
                if($device->id == $this->device_id){
                    $selected_device = $device;
                    // for ($i=0; $i < 7 ; $i++) {
                    //     $date = $device->data()->filter(['created_at' => $i])->get()->toArray();
                    //     $data_created->put(day($i) , $date);
                    //     dd($date);
                    // }
                }
                foreach ($device->data()->get() as $data) {
                    $speed = $data->speed;
                    $all_speed->push($speed);
                    $all_data->push($data);
                    if($data->device_id == $this->device_id){
                        $selected_data->push($data);
                        if($speed < 50) {
                            $slow->push($speed);
                        } else if($speed > 90) {
                            $fast->push($speed);
                        } else {
                            $normal->push($speed);
                        }
                    }
                }
                foreach ($all_speed as $key) {
                    $average += $key;
                }

                $average = floor( $average / $all_speed->count());
            }
        }

        $day = DataDevice::where('device_id', $this->device_id)->whereDate( 'created_at', Carbon::today())->get()->count();
            $day1 = DataDevice::where('device_id', $this->device_id)->whereDate( 'created_at', Carbon::today()->subDay(1))->get()->count();
            $day2 = DataDevice::where('device_id', $this->device_id)->whereDate( 'created_at', Carbon::today()->subDay(2))->get()->count();
            $day3 = DataDevice::where('device_id', $this->device_id)->whereDate( 'created_at', Carbon::today()->subDay(3))->get()->count();
            $day4 = DataDevice::where('device_id', $this->device_id)->whereDate( 'created_at', Carbon::today()->subDay(4))->get()->count();
            $day5 = DataDevice::where('device_id', $this->device_id)->whereDate( 'created_at', Carbon::today()->subDay(5))->get()->count();
            $day6 = DataDevice::where('device_id', $this->device_id)->whereDate( 'created_at', Carbon::today()->subDay(6))->get()->count();
            $data_created = array(
                Carbon::today()->toDateString() => $day,
                Carbon::today()->subDay(1)->toDateString() => $day1,
                Carbon::today()->subDay(2)->toDateString() => $day2,
                Carbon::today()->subDay(3)->toDateString() => $day3,
                Carbon::today()->subDay(4)->toDateString() => $day4,
                Carbon::today()->subDay(5)->toDateString() => $day5,
                Carbon::today()->subDay(6)->toDateString() => $day6,
            );


        $this->all = collect([
            'device' => $all_device,
            'speed' => $all_speed,
            'data' => $all_data,
            'average'=> $average
        ]);

        $this->selected = collect([
            'device' => $selected_device,
            'speed' => collect([
                'slow' => $slow->count(),
                'normal' => $normal->count(),
                'fast' => $fast->count()
            ]),
            'data' => $selected_data,
            'data_created' => $data_created,
        ]);

        // dd($this->selected['data_created']);
    }

    public function render()
    {
        $data = new DataSidebar;
        $menus = $data->data('dashboard');
        return view('livewire.home.dashboard')
        ->layout('layouts.home', [
            'user' => $this->user,
            'menus' => $menus,
            'data_created' => $this->selected['data_created'],
            'speed' => $this->selected['speed']
        ]);
    }
}
