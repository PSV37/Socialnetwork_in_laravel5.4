<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use DB;
use Auth;

class FriendshipController extends Controller
{
    public function findfriends($slug)
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
    
    //display all friends
        $allfriends = DB::table('profiles as p')->join('users as u','u.id','=','p.user_id')
                                              ->where('u.id','!=',Auth::user()->id)
                                              ->get();
       //dispaly all friends profiles
           $user_pro = DB::table('users as u')->leftjoin('profiles as p','p.user_id','u.id')
                                           ->where('slug',$slug)->get();  

        return view('profile.profile',compact('allfriends','friends','user_pro'));
    }

    public function addFriend($id)
    {
       Auth::user()->addFriend($id);
    	return back();
    }

    public function requestes()
    {
    	 $logged_user = Auth::user()->id;
    	 $frndrequests = DB::table('friendships as f')->rightjoin('users as u','u.id','=','f.requester')
    	                                              //->join('profiles as p','p.user_id','=','u.id')
    	                                              ->where('f.status',0)->where('f.user_requested',$logged_user)->get();                  
    	   return view('friends.requestes',compact('frndrequests'));                                          
    }

     public function confirmrequest($name , $id)
    {
    	$uid = Auth::user()->id;
    	$acceptrequest = DB::table('friendships')
  			    	            ->where('requester',$id)
  			    	            ->where('user_requested',$uid)
  			    	            ->first();
			  if($acceptrequest)
			  {
			  	 $success = DB::table('friendships')
  					  	         ->where('user_requested',$uid)
  					  	         ->where('requester',$id)
  					  	         ->update(['status' => 1]);
               //Notificaion for the requester 
                  $notification = new Notification;
                  $notification->user_hero = $id;
                  $notification->user_logged = Auth::user()->id;
                  $notification->note ='Accepted Your Friend Request';
                  $notification->status = '1';
                  $notification->save();

					if($success)
					{
						session()->flash('success',Auth::user()->name . '  You Are Now Friend With  '. $name);
						return back();
					}						  	         			  	         
			   }  	            
			   else
			   {
			      session()->flash('msg','Worng User');;
			   }       
    }
    
        /*Display My Confirm Friend List*/
    public function friendlist()
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
        return view('friends.myfriendlist',compact('friends'));
    }
}
