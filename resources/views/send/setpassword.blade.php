@extends('auth.comman')

@section('content')
<div class="container">   
  <div id="content">   
        <div class="container-fluid">
      <form class="form-horizontal" method="post" action="{{ url('reset') }}">
          {{ csrf_field() }}
          <input type="hidden" name="verifyToken" value="{{$verifyToken}}">
              <div class="lock-container">
                <h1>Account Access</h1>
                <div class="panel panel-default text-center">
                  <img src="{{asset('web/images/user.png')}}" class="img-circle" height="126px">
                      @if(session()->has('success_reset'))
                        <div class="alert alert-success" style="padding:7px ; margin-bottom: 2px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    ×</button>
                              {{session()->get('success_reset')}}
                            </div>
                      @endif
                  <div class="panel-body">
                    <input class="form-control" type="password" name="password" placeholder="Enter Password" required>
                         @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                         @endif
                    <input class="form-control" type="password" name="cpassword" placeholder="Enter Confirm Password" required>
                       @if ($errors->has('cpassword'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cpassword') }}</strong>
                            </span>
                       @endif
                    <button class="btn btn-primary">Set Password <i class="fa fa-fw fa-unlock-alt"></i></button><br><br>                 
                  </div>
                </div>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection
 

