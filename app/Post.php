<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
       'user_id','content','status','postImage',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

     public function like()
    {
        return $this->hasMany(Like::class);
    }

     public function comment()
    {
        return $this->hasMany(comment::class);
    }

       public function dislike()
    {
        return $this->hasMany(Dislike::class);
    }
}
