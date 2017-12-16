<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Mail;
use App\Mail\verifyEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         if($data['gender'] == 'male')
        {
            $img_path = 'boy_logo.png';
        }
        else
        {
            $img_path = 'girl_logo.png';
        }

        $coverpic = 'c10.png';
        
        $user = User::create([
                'firstname' => $data['fname'],
                'lastname' => $data['lname'],
                'gender' => $data['gender'],
                'email' => $data['email'],
                'slug' => str_slug($data['fname'],'-'),
                'verifyToken' => Str::random(40),
                'image' => $img_path,
                'coverpic' => $coverpic,
                'password' => bcrypt($data['password']),
        ]);

          $thisuser = User::findOrFail($user->id);
            $this->sendmail($thisuser);
    
    }

     public function sendmail($thisuser)
    {
        Mail::to($thisuser['email'])->send(new verifyEmail($thisuser));
    }
}
