<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\dateTime;
use App\Post;
use Auth;
use timestamp;
use DB;
use now;
use App\Like;
																											
class PostController extends Controller
{
	/*public function index()
   {
      $posts = post::with('user','like','comment')->orderBy('created_at','DESC')->get();                                
      return view('home',compact('posts'));
   }*/

  public function posts()
   {
          $posts = post::with('user','like','comment')->orderBy('created_at','DESC')->take(4)->get();
   	    // $posts= DB::table('posts as p')->join('users as u','u.id','p.user_id')->orderBy('p.created_at','DESC')>take(4)->get();
          return $posts;
   }

    public function addpost(Request $request)
    {     
	      $content = new Post;
	   	  $content->content = $request->content;
	      $content->user_id = Auth::user()->id;
	      $content->status = 0;
	      $content->created_at=now();
	      $content->save();
   	    
		   if($content)
		   {
		       return  post::with('user','like','comment')->orderBy('created_at','DESC')->take(4)->get();   
		   }
    }

    public function deletepost($id)
   {
       $delete_post = DB::table('posts')->where('id',$id)->delete();
       if($delete_post)
       {
           return  post::with('user','like','comment')->orderBy('created_at','DESC')->take(4)->get();
       }
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
       $path = public_path() . "/postImages/" . $filename;

       //put in folder 
       if(file_put_contents($path, $decode))
       {
          $content = new Post;
          $content->content = $request->content;
          $content->user_id = Auth::user()->id;
          $content->status = 0;
          $content->postImage = $filename;
          $content->save();
             if($content)
             {
               return  post::with('user','like','comment')->orderBy('created_at','DESC')->take(4)->get();   
             }
      }
    }


    public function LikePost($id)
    {
        $post = new Like;
        $post->post_id = $id;
        $post->user_id = Auth::user()->id;
        $post->save();
        if($post)
        {
           return  post::with('user','like','comment')->orderBy('created_at','DESC')->take(4)->get();  
        }
    }
}
