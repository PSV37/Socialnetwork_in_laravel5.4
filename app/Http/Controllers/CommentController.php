<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
use DB;
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
	         $posts =  post::with('user','like')->orderBy('created_at','DESC')->take(4)->get();   
	       	//return DB::table('users as u ')->join('comment as c','u.id','c.user_id')->join('posts as p','p.user_id','u.id')->orderBy('created_at','DESC')->take(4)->get();
	       	  foreach ($posts as $post) {
                $data = Array();
                $data['id'] = $post->id;
                $data['content'] = $post->content;
                $data['firstname'] = $post->user->firstname;
                $data['image'] = $post->user->image;
                $data['user_id'] = $post->user_id;
                $data['postImage'] = $post->postImage;
                $data['comment'] = $this->comments($post->id);
                $data['like'] = $this->likes($post->id);
                $array_data[] = $data;            
            }
              return $array_data;
          //return response()->json($array_data);

	       }
    }	

     public function comments($id)
   {
        $comments = DB::table('comments as c')->join('users as u','u.id','c.user_id')->where('c.post_id',$id)
                                             ->select('u.firstname','u.image','u.gender','c.comment','c.id as comment_id','u.id as user_id','c.user_id')
                                             ->get();
       return $comments;
   }

   public function likes($id)
   {
     $likes = DB::table('likes as l')->where('l.post_id',$id)->get();
     return $likes;
   }


   public function getcomments(Request $request)
   {
   /*  $comments= DB::table('comments as c')->join('users as u','u.id','c.user_id')->join('posts as p','p.id','c.post_id')->get();
     return $comments;*/
      $posts =  post::with('user','like')->orderBy('created_at','DESC')->take(4)->get();   

       foreach ($posts as $post) {
                $data = Array();
                $data['id'] = $post->id;
                $data['content'] = $post->content;
                $data['firstname'] = $post->user->firstname;
                $data['image'] = $post->user->image;
                $data['user_id'] = $post->user_id;
                $data['postImage'] = $post->postImage;
                $data['comment'] = $this->commentbyuser($post->id);
                $data['like'] = $this->likesbyuser($post->id);
                $array_data[] = $data;            
            }
              return $array_data;
          //return response()->json($array_data);
          
   }

   public function commentbyuser($id)
   {
       $comments = DB::table('comments as c')->where('c.post_id',$id)->get();
       return $comments;
   }

   public function likesbyuser($id)
   {
     $likes = DB::table('likes as l')->where('l.post_id',$id)->get();
     return $likes;
   }

}

 
       
