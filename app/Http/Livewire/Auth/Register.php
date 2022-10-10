<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;


class Register extends Component
{
    public $name, $email, $password;

    protected $rules =[
        'name' => 'required',
        'email' => 'required|email:dns|unique:users',
        'password' => 'required',
    ];

    public function register() {
       $credential = $this->validate();
       $credential['password'] = bcrypt($credential['password']);
       User::create($credential);
       return redirect()->route('login')->with('success', 'Account created');
   }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
