<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
use App\Post;
use App\User;


class CommentController extends Controller
{
    public function addcomments(Request $request)
    {
	      $id = $request->id;
	      $comment = new Comment;
	   	  $comment->comment = $request->comment;
	   	  $comment->post_id = $id;
	      $comment->user_id = Auth::user()->id;
	      $comment->created_at = now();
	      $comment->updated_at = now();
	      $comment->save();

	       if($comment)
	       {
	         return  post::with('user','like','comment')->orderBy('created_at','DESC')->take(4)->get();   
	       	//return DB::table('users as u ')->join('comment as c','u.id','c.user_id')->join('posts as p','p.user_id','u.id')->orderBy('created_at','DESC')->take(4)->get();
	       }
    }	
}
