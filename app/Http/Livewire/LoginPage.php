<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginPage extends Component
{
   public $email, $password;

   public function login()
   {

        $this->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );
        
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }else{
            return redirect()->back();
        }
   }

    public function render()
    {
        return view('livewire.login-page');
    }
}
