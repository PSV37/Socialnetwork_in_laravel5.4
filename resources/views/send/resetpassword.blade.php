<div style="background-color:grey;margin:10px">
	<h2>Hi , {{$user->firstname}}</h2>
	<p>You Loss Your Password So, You Want To Set New Password</p>
	<p>You Need To Be <a href="{{url('sendEmailDone',['email'=>$user->email,'verifyToken'=>$user->verifyToken])}}">Click Here</a> </p>
</div>