<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use  App\Http\Controllers\dateTime;
use DB;
use Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('message.message');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      public function getmessages()
    {
        //send msg from Auth::user

        $alluser1 = DB::table('users as u')->join('conversions as c','u.id','c.user_one')
                                           ->where('c.user_two',Auth::user()->id)
                                            ->get();                     
        //send msg to second friend
          $alluser2 = DB::table('users as u')->join('conversions as c','u.id','c.user_two')
                                             ->where('c.user_one',Auth::user()->id)
                                             ->get();         
             return array_merge($alluser1->toArray(),$alluser2->toArray());                                                       
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
     public function getmesges($id)
    { 
         $msg = DB::table('messages as m')->join('users as u','u.id','m.user_from')
                                          ->select('m.user_to','m.conversion_id','m.user_from','m.id','u.firstname','u.image','u.id as user_id','u.slug','u.coverpic','u.email','u.gender','m.msg','m.conversion_id')
                                           ->where('m.conversion_id',$id)
                                          ->orderBy('m.created_at','ASC')
                                          ->get();                     
            return $msg;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
   
    public function sendMessage(Request $request)
    {
       $conID = $request->conID;
       $msg = $request->msg;
      
       $fetch_user_To = DB::table('messages')->where('conversion_id',$conID)
                                             ->where('user_to','!=',Auth::user()->id)
                                             ->orderBy('messages.created_at','ASC')
                                             ->get();  
                                                                     
          $userTo = $fetch_user_To[0]->user_to;         

          $sendM = DB::table('messages')->insert([
           'user_to'=>$userTo,
           'user_from' => Auth::user()->id,
           'msg'=>$msg,
           'conversion_id' => $conID,
           'created_at'=>now(),
           'status'=>1,
          ]);
          if($sendM)
          {
                  $msg = DB::table('messages as m')->join('users as u','u.id','m.user_from')
                                                   ->where('m.conversion_id',$conID)->orderBy('m.created_at','ASC')->get();
                  return $msg;
          } 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function newMessage()
     {
      $friends = DB::table('friendships as f')->leftjoin('users as u','u.id','=','f.requester')
                                                      ->where('f.user_requested',Auth::user()->id)
                                                      ->get();
         return $friends;
        //return view('message.newMessage', compact('friends', $friends));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
        public function sendNewMessage(Request $request)
    {
        $msg = $request->msg;
        $friend_id = $request->friend_id;
        return $msg;
        exit;
        $myID = Auth::user()->id;

        //check if conversation already started or not
        $checkCon1 = DB::table('conversions')->where('user_one',$myID)
                                               ->where('user_two',$friend_id)->get(); // if loggedin user started conversation

        $checkCon2 = DB::table('conversions')->where('user_two',$myID)
                                               ->where('user_one',$friend_id)->get(); // if loggedin recviced message first

        $allCons = array_merge($checkCon1->toArray(),$checkCon2->toArray());
       // echo $allCons[0]->id;
       

        if(count($allCons)!=0)
        {
            // old conversation
            $conID_old = $allCons[0]->id;
            //insert data into messages table
            $MsgSent = DB::table('messages')->insert([
              'user_from' => $myID,
              'user_to' => $friend_id,
              'msg' => $msg,
              'conversion_id' => $conID_old,
              'created_at' =>now(),
              'status' => 1
            ]);
        }
        else 
        {
            // new conversation
            $conID_new = DB::table('conversions')->insertGetId([
              'user_one' => $myID,
              'user_two' => $friend_id
            ]);
              echo $conID_new;
              $MsgSent = DB::table('messages')->insert([
                'user_from' => $myID,
                'user_to' => $friend_id,
                'msg' => $msg,
                'conversion_id' => $conID_new,
                'created_at'=>now(),
                'status' => 1
              ]);
        }
    }


    public function newfriendschat()
    {
      return view('message.newmessage');
    }
}
