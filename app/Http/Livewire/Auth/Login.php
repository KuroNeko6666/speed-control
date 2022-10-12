<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required',
        'password' => 'required',
    ];

    public function login() {
        $credential = $this->validate();

       if(auth()->attempt($credential)){
           return redirect()->route('home');
       }
       return redirect()->route('login')->with('error', 'Email or Password wrong');
   }

   public function render()
   {
       return view('livewire.auth.login');
   }
}
