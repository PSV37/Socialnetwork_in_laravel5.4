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
       $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $path = 'images';
        $file->move($path , $filename);
        DB::table('users')->where('id',Auth::user()->id)->update(['image'=>$filename]);
        session()->flash('msg','successfully updated image');
        return back();
	   
    }

}
