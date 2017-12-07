<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Profile;

class ProfileController extends Controller
{

    public function profile($slug)
    {
          $uid = Auth::user()->id;
       //display data to requester side user_requested Info
      $friend1 = DB::table('friendships as f')->leftjoin('users as u','u.id','=','f.user_requested')
                                              ->where('status',1)
                                              ->where('requester',$uid)
                                              ->get();

       //display data to user_requested side requester Info          
      $friend2 = DB::table('friendships as f')->leftjoin('users as u','u.id','=','f.requester')
                                              ->where('status',1)
                                              ->where('user_requested',$uid)
                                              ->get();
      // dd($friend2);
        $friends = array_merge($friend1->toArray(),$friend2->toArray());

        $allfriends = DB::table('profiles as p')->join('users as u','u.id','=','p.user_id')
                                              ->where('u.id','!=',Auth::user()->id)
                                              ->get();

    	 $user_pro = DB::table('users as u')->leftjoin('profiles as p','p.user_id','u.id')
                                           ->where('slug',$slug)->get();
        return view('profile.profile',compact('user_pro','friends','allfriends'))->with('data',Auth::user()->profile);
    }


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

    public function coverpic(Request $request)
    {
    	$file = $request->file('coverpic');
        $filename = $file->getClientOriginalName();
        $path = 'coverpics';
        $file->move($path , $filename);
        DB::table('users')->where('id',Auth::user()->id)->update(['coverpic'=>$filename]);
        session()->flash('msg','successfully updated Cover Pic');
        return back();
    }
}
