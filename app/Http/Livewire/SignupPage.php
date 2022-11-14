<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SignupPage extends Component
{
    use Actions;
    
    public $name, $email, $password;

    public function signup()
    {
      

        $this->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]
            );


        
        DB::beginTransaction();
        try{
            User::create(
                [
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => $this->password,
                ]
                );
        
            DB::commit();

        }catch(Exception $e){

            DB::rollBack();

            Log::error('SignupPage', [ $e->getMessage()]);

            $this->notification()->error(
                $title = 'Sorry unable to signup',
                $description = ''
            );
        }
        
        return redirect('login');
    }

    public function render()
    {
        return view('livewire.signup-page');
    }
}
