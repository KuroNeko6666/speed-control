<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{

    public $name, $email, $password, $repassword;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'repassword' => 'required|same:password'
    ];

    public function register(){
        $data = $this->validate();
        $data['password'] = bcrypt($data['password']);
        try {
            $result = User::create($data);
            session()->flash('success', 'Your account has been created!');
            return redirect()->route('login');
        }
        catch (Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            session()->flash('error', 'Query error ' + $errorCode);
        }
    }

    public function render()
    {
        return view('livewire.auth.register')
        ->layout('layouts.auth');
    }
}
