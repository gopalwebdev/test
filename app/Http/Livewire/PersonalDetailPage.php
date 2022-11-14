<?php

namespace App\Http\Livewire;

use App\Models\EducationDetail;
use App\Models\JobDetail;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PersonalDetailPage extends Component
{

    use Actions;
    public $name, $email, $mobile, $collage, $branch, $passed_out_year, $company_name, $designation, $location;


    public $auth_user;

    public function mount()
    {
        $this->auth_user = User::where('id', auth()->user()->id)->first();

        $this->name = $this->auth_user->name;
        $this->email = $this->auth_user->email;
        $this->mobile = $this->auth_user->mobile;

    }

    public function register()
    {

      $this->validate(
        [
            "name"=> 'required',
            "email"=> 'required',
            "mobile"=> 'required',
            "collage"=> 'required',
            "branch"=> 'required',
            "passed_out_year"=> 'required',
            "company_name"=> 'required',
            "designation"=> 'required',
            "location"=> 'required',
        ]
        );


        DB::beginTransaction();
        try{

            User::where('id', $this->auth_user->id)->update(
                [
                    "mobile"=> $this->mobile,
                ]
            );

            EducationDetail::create(

                [
                    "user_id" => $this->auth_user->id,
                    "collage"=> $this->collage,
                    "branch"=> $this->branch,
                    "passed_out_year"=> $this->passed_out_year,
                ]
            );


            JobDetail::create(

                [
                    "user_id" => $this->auth_user->id,
                    "company_name"=> $this->company_name,
                    "designation"=> $this->designation,
                    "location"=> $this->location,
                ]
            );



       
        
            DB::commit();


        }catch(Exception $e){

            DB::rollBack();

            Log::error('RegistrationPage', [ $e->getMessage()]);

            $this->notification()->error(
                $title = 'Sorry unable to add your personal details',
                $description = 'Y'
            );
        }



        $this->notification()->success(
            $title = 'Registerd!',
            $description = 'Your profile was successfull saved'
        );



    }

    
    public function render()
    {
        return view('livewire.personal-detail-page');
    }
}
