<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use DB;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('welcome');
    	//return view('dashboard.index');
    }

    public function saveImg(Request $request)
    {

	    $img = $request->get('image');

	    //remove extra parts
	    $exploded = explode(',', $img);

	    //echo $exploded[0]; 

	    if(str_contains($exploded[0],'gif')){
	      $ext = 'gif';
	    }
	    else if(str_contains($exploded[0],'png'))
	    {
	      $ext = 'png';
	    }
	    else
	    {
	      $ext = 'jpg';
	    }

	     $decode = base64_decode($exploded[1]);

	    //filename of our image
	     $filename = str_random() . "." . $ext;

	     //local folder path
	     $path = public_path() . "/pics/" . $filename;

	     //put in folder 
	     if(file_put_contents($path, $decode))
	     {
	         $user_pro = DB::table('users')->where('id',Auth::user()->id)->update(['image'=>$filename]);
	             if($user_pro)
	             {
	                $user = DB::table('users')->where('id',Auth::user()->id)->get();  
	                return $user; 
	             }
	       }
    }


    public function profile()
    {
    	 $logged_id = Auth::user()->id;
    	 $user_profile = Profile::with('user')->where('user_id',$logged_id)->get();
    	 return view('profile.profile',compact('user_profile'));
    }
}
