<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class UserController extends Controller
{
    public function updateuser(Request $request)
    {
    	$user_id = Auth::user()->id;
    	$city =  $request->city;
    	$country =  $request->country;
    	$dateofbirth =  $request->dateofbirth;
    	$about =  $request->about;

    	$user_update = DB::table('profiles')->where('user_id',$user_id)->update(['city'=>$city,'country'=>$country,'dateofbirth'=>$dateofbirth,'about'=>$about]);
    	if($user_update)
    	{
    		session()->flash('success','user updated Successfully');
    		return back();
    	}
  
    }
}
