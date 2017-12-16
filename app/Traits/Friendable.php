<?php 

namespace App\Traits;
use App\Friendship;

trait Friendable
{
	public function test()
	{
		return 'working';
	}

	public function addFriend($addFriend_id)
	{
		
      $Friendships = Friendship::create([
        
         'requester' => $this->id,
         'user_requested' => $addFriend_id,

      	]);

      if($Friendships)
      {
          return response()->json($Friendships);
      }
      else
      {
      	return 'failed';
      }

	}
}



 ?>