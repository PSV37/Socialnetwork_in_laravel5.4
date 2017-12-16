@extends('auth.comman')

@section('content')
  
  <div id="content">
    <div class="container">
         <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{csrf_field()}}
              <div class="lock-container" style="margin-top: 13px;">
                <h1>Create Account</h1>
                <div class="panel panel-default text-center">
                  <img src="{{asset('web/images/user.png')}}" class="img-circle"  height="126px">
                  <div class="panel-body">
                     @if(session()->has('success_msg'))
                        <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    ×</button>
                              {{session()->get('success_msg')}}
                            </div>
                    @endif
                    <input class="form-control" type="text" name="fname" placeholder="First Name"  value="{{ old('fname') }}"  autofocus>
                        @if ($errors->has('fname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fname') }}</strong>
                            </span>
                        @endif

                    <input class="form-control" type="text" name="lname" placeholder="Last Name"  value="{{ old('lname') }}" >
                        @if ($errors->has('lname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                        @endif

                    <input class="form-control" type="text" placeholder="Email" name="email"  value="{{ old('email') }}" >
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                    <select class="form-control"  name="gender" >
                        <option value="">Select gender</option>
                        <option value="male"> Male</option>
                        <option value="female">Female</option>
                    </select>                       
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif<br>

                    <input class="form-control" type="password" name="password" placeholder="Enter Password">
                       @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                      @endif

                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" >


                    <button class="btn btn-primary">Create Account <i class="fa fa-fw fa-unlock-alt"></i></button>
                    <a href="#" class="forgot-password">Forgot password?</a><hr>
                    <a data-toggle="modal" data-target="#loginModel" class="forgot-password">I Already Member</a>
                  </div>
                </div>
              </div>
          </form>
      </div>
  </div>

@endsection

