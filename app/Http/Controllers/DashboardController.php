<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Data;
use App\Models\Device;
use App\Models\UserDevice;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public $user_id;
    public $user;
    public $device;
    public $vehicle;
    public $average;
    public $data;
    public $data_register;

    public function index(){
        $this->user_id = auth()->user()->id;
        $this->user = User::find($this->user_id);
        $this->device = $this->user->device()->get();
        $this->vehicle = $this->vehicle();
        $this->average = $this->average();
        $device_id = $this->device[0]->id;
        if(request('device')){
            $device_id = request('device');
        }
        $this->data = $this->data($device_id);
        $this->data_register = $this->dataRegister($device_id);
        $myDevice = Device::find($device_id);
        $slow = [];
        $normal = [];
        $fast = [];

        foreach ($myDevice->data()->get() as $v){
            $speed = $v->kecepatan;
            if ($speed < 50){
                array_push($slow, $speed);
            } else if ( $speed > 80){
                array_push($fast, $speed);
            } else {
                array_push($normal, $speed);
            }
        }

        $speed = array(
            'slow' => count($slow),
            'normal' => count($normal),
            'fast' => count($fast),
        );


        return view('home.dashboard', [
            'user' => $this->user,
            'device' => $this->device,
            'device_name' => $myDevice->name,
            'average' => $this->average,
            'vehicle' => count($this->vehicle),
            'data' => $this->data,
            'data_register' => $this->data_register,
            'speed' => $speed,
        ]);
    }

    public function vehicle(){
        $vehicle = [];
        foreach ($this->device as $value) {
            $datas = $value->device()->get();
            foreach ($datas as $data){
                $data = $data->data()->get();
                foreach ($data as $item) {
                    array_push($vehicle, $item);
                }
            }
        }
        return $vehicle;
    }

    public function average(){
        if(count($this->vehicle)){
            $average = 0;
            foreach ($this->vehicle as $item){
                $average += $item->kecepatan;
            }
            return floor($average / count($this->vehicle));
        }
        return 0;
    }

    public function data($req){
        $data = Data::where('device_id', $req)->latest()->get();
        return $data;
    }

    public function dataRegister($req){
        $day = Data::whereDate( 'created_at', Carbon::today())->filter(['device' => $req])->get()->count();
        $day1 = Data::whereDate( 'created_at', Carbon::today()->subDay(1))->filter(['device' => $req])->get()->count();
        $day2 = Data::whereDate( 'created_at', Carbon::today()->subDay(2))->filter(['device' => $req])->get()->count();
        $day3 = Data::whereDate( 'created_at', Carbon::today()->subDay(3))->filter(['device' => $req])->get()->count();
        $day4 = Data::whereDate( 'created_at', Carbon::today()->subDay(4))->filter(['device' => $req])->get()->count();
        $day5 = Data::whereDate( 'created_at', Carbon::today()->subDay(5))->filter(['device' => $req])->get()->count();
        $day6 = Data::whereDate( 'created_at', Carbon::today()->subDay(6))->filter(['device' => $req])->get()->count();
        return $data_register = array(
            Carbon::today()->toDateString() => $day,
            Carbon::today()->subDay(1)->toDateString() => $day1,
            Carbon::today()->subDay(2)->toDateString() => $day2,
            Carbon::today()->subDay(3)->toDateString() => $day3,
            Carbon::today()->subDay(4)->toDateString() => $day4,
            Carbon::today()->subDay(5)->toDateString() => $day5,
            Carbon::today()->subDay(6)->toDateString() => $day6,
        );
    }
}
