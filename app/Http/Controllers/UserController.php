<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\ResetPassword;
use App\User;
use Auth;
use DB;
use Hash;
use Mail;


class UserController extends Controller
{

    public function forgotPassword(Request $request)
    {
        //echo "working";
       $email =  $request->forgot_email;
       $token =  Str::random(40);

       // $user = DB::table('users as u')->join('password_resets as pr','u.email','pr.email')
                                        //->update(['verifyToken'=>$token,'token'=>$token]);
       $user = DB::table('users')->where('email',$email)->update(['verifyToken'=>$token]);
       
       if(isset($user))
       {
           $user_reset = DB::table('users')->where('email',$email)->get();

               if(count($user_reset) == 0)
               {
                  session()->flash('worng_email','wrong email address');
                  return back();
               }
               else
               {
                  $thisuser = User::findOrFail($user_reset[0]->id);             
                  $this->sendMail($thisuser);
                  session()->flash('reset','Successfully Send Email For ForgotPassword');
                  return back();
               }
       }
       else
       {
         echo "wrong user";
       }
    }

    public function sendMail($thisuser)
    {
        Mail::to($thisuser['email'])->send(new ResetPassword($thisuser));
    }

    public function resetPassword($email , $token)
    {
             $verifyToken = $token;
            return view('send.setpassword',compact('verifyToken'));
    }

     public function setpassword(Request $request)
    {
       $this->validate($request , [
                'password' =>'required',
            ]);

            $verifytoken = $request->verifyToken;
            $reset_pass = new User;
            $reset_pass->password  = Hash::make($request->password);
            $reset_user_pass = DB::table('users')->where('verifyToken',$verifytoken)
                                           ->update(['password'=>$reset_pass->password ,'verifyToken'=>'']);

            if($reset_user_pass)
            {
                session()->flash('success_reset',' Password Reset sucessfully');
                return back();
            }

    }
}
