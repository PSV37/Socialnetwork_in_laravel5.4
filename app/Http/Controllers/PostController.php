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
use App\Dislike;
																											
class PostController extends Controller
{
	/*public function index()
   {
      $posts = post::with('user','like','comment')->orderBy('created_at','DESC')->get();                                
      return view('home',compact('posts'));
   }*/

  public function posts()
   {
          $posts = post::with('user','like')->orderBy('created_at','DESC')->take(4)->get();
   	    // $posts= DB::table('posts as p')->join('users as u','u.id','p.user_id')->orderBy('p.created_at','DESC')>take(4)->get();
        //return $posts;
          foreach ($posts as $post) {
                $data = Array();
                $data['id'] = $post->id;
                $data['content'] = $post->content;
                $data['firstname'] = $post->user->firstname;
                $data['image'] = $post->user->image;
                $data['user_id'] = $post->user_id;
                $data['postImage'] = $post->postImage;
                $data['comment'] = $this->comments($post->user_id);
                $data['like'] = $this->likes($post->id);
                $array_data[] = $data;            
            }
             // return $array_data;
              return response()->json($array_data);
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
            
		       $posts =  post::with('user','like')->orderBy('created_at','DESC')->get();   
            foreach ($posts as $post) {
                $data = Array();
                $data['id'] = $post->id;
                $data['content'] = $post->content;
                $data['firstname'] = $post->user->firstname;
                $data['image'] = $post->user->image;
                $data['user_id'] = $post->user_id;
                $data['postImage'] = $post->postImage;
                $data['comment'] = $this->comments($post->user_id);
                $data['like'] = $this->likes($post->id);
                $array_data[] = $data;            
            }
         // return $array_data;
          return response()->json($array_data);
		   }
    }

    public function deletepost($id)
   {
       $delete_post = DB::table('posts')->where('id',$id)->delete();
       if($delete_post)
       {
           $posts =  post::with('user','like','comment')->orderBy('created_at','DESC')->get();

            foreach ($posts as $post) {
                $data = Array();
                $data['id'] = $post->id;
                $data['content'] = $post->content;
                $data['firstname'] = $post->user->firstname;
                $data['image'] = $post->user->image;
                $data['user_id'] = $post->user_id;
                $data['postImage'] = $post->postImage;
                $data['comment'] = $this->comments($post->user_id);
                $data['like'] = $this->likes($post->id);
                $array_data[] = $data;            
            }
         // return $array_data;
          return response()->json($array_data);

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
                $posts =  post::with('user','like')->orderBy('created_at','DESC')->get();   
                  foreach ($posts as $post) {
                      $data = Array();
                      $data['id'] = $post->id;
                      $data['content'] = $post->content;
                      $data['firstname'] = $post->user->firstname;
                      $data['image'] = $post->user->image;
                      $data['user_id'] = $post->user_id;
                      $data['postImage'] = $post->postImage;
                      $data['comment'] = $this->comments($post->user_id);
                      $data['like'] = $this->likes($post->id);
                      $array_data[] = $data;            
                   }
                     // return $array_data;
                      return response()->json($array_data);
             }
      }
    }


    public function LikePost($id)
    {
        $post = new Like;
        $post->post_id = $id;
        $post->user_id = Auth::user()->id;
        $post->status = 1;
        $post->save();
        if($post)
        {
         //$posts =  DB::table('posts as p')->join('likes as l','l.post_id','p.id')->where('l.user_id',Auth::user()->id)->orderBy('created_at','DESC')->take(4)->get();
           $posts =  post::with('user','like')->orderBy('created_at','DESC')->get();
            foreach ($posts as $post) {
                $data = Array();
                $data['id'] = $post->id;
                $data['content'] = $post->content;
                $data['firstname'] = $post->user->firstname;
                $data['image'] = $post->user->image;
                $data['user_id'] = $post->user_id;
                $data['postImage'] = $post->postImage;
                $data['comment'] = $this->comments($post->user_id);
                $data['like'] = $this->likes($post->id);
                $array_data[] = $data;            
            }
         // return $array_data;
          return response()->json($array_data);
              /*$likes = DB::table('likes as l')->where('l.post_id',$id)->get();
               return $likes;*/
        }
    }

     public function DislikePost($id)
    {
        $post = new Dislike;
        $post->post_id = $id;
        $post->user_id = Auth::user()->id;
        $post->status = 1;
        $post->save();
        if($post)
        {
           return  post::with('user','dislike','comment')->orderBy('created_at','DESC')->take(4)->get();  
        }
    }


   public function comments($id)
   {
      // DB::enableQueryLog();
       $comments = DB::table('comments as c')->join('users as u','u.id','c.user_id')->where('c.post_id',$id)
                                             ->select('u.firstname','u.image','u.gender','c.comment as comment','c.id as comment_id','u.id as user_id','c.user_id')->orderBy('c.created_at','DESC')->take(4)
                                             ->get();
       // print_r(DB::getQueryLog());
       //exit;
     return $comments;
   }

   public function likes($id)
   {
     $likes = DB::table('likes as l')->where('l.post_id',$id)->get();
     return $likes;
   }

}
