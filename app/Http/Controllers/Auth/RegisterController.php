<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Dentist;
use App\Enums\UserTypes;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterDentistRequest;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

   
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }
/* 
     protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
 */
    
    protected function register(RegisterDentistRequest $request)
    {   
        
        try {
            
            $user = new User;
            $user->user_type_id = UserTypes::DENTIST;
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->img_perfil = '';
            //$user->free_trial = 0;
            //$user->trial_ends_at = now()->addDays(10); //se debe insertar cuando agregue la tarjeta para que tenga su mes gratis
            $user->save();

            //Aqui se envia el email de verificacion
            $user->sendEmailVerificationNotification();
            //Aqui se crea el stripe_id y el email en stripe
            //$user->createAsStripeCustomer();

            $dentist = new Dentist;
            $dentist->user_id = $user->id;
            $dentist->company_name = $request->company_name;
            $dentist->rfc = $request->rfc;
            $dentist->street = $request->street;
            $dentist->house_number = $request->house_number;
            $dentist->postal_code = $request->postal_code;
            $dentist->state = $request->state;
            $dentist->city = $request->city;
            $dentist->phone = $request->phone;
            $dentist->save();

            Alert::success('Felicidades', 'Tu registro se ha realizado con exito, revisa tu email');

            return view('auth.register');

        } catch (\Exception $exception) {
            Log::debug($exception->getMessage());
            return response()([
                'msg' => 'BAD',
                'success' => false,
                'data' => [
                    'msgError' => 'Server error'
                ],
                'exeptions' => [
                    'msgError' => $exception->getMessage()
                ]
            ], 500);
        }

    }
}
