<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegistrationPage extends Component
{

    use Actions;
    public $name, $email, $password, $user_type, $is_admin;

    public function register()
    {

      $this->validate(
        [
            'name' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
            'user_type' => 'required'
        ]
        );



        DB::beginTransaction();
        try{
            User::create(
                [
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => $this->password,
                    'user_type' => $this->user_type,
                    'is_admin' => $this->is_admin,
                ]
        );
        
            DB::commit();

        }catch(Exception $e){

            DB::rollBack();

            Log::error('RegistrationPage', [ $e->getMessage()]);

            $this->notification()->error(
                $title = 'Sorry unable to register',
                $description = 'Your profile was not saved'
            );
        }



        $this->notification()->success(
            $title = 'Registerd!',
            $description = 'Your profile was successfull saved'
        );



    }

    public function render()
    {
        return view('livewire.registration-page');
    }
}
