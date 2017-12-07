<?php 

namespace App\Traits;
use App\Friendship;

trait Friendable
{
	public function test()
	{
		return 'working';
	}

	public function addFriend($user_id)
	{
		
      $Friendships = Friendship::create([
        
         'requester' => $this->id,
         'user_requested' => $user_id,

      	]);

      if($Friendships)
      {
      	return $Friendships;
      }
      else
      {
      	return 'failed';
      }

	}
}



 ?>