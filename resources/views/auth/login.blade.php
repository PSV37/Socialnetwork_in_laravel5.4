@extends('auth.comman')

@section('content')
<div class="container">
    
  <div id="content">
    <div class="container-fluid">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
              <div class="lock-container">
                <h1>Account Access</h1>
                <div class="panel panel-default text-center">
                  <img src="{{asset('web/images/user.png')}}" class="img-circle" height="126px">
                  <div class="panel-body">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    <input class="form-control" type="password" name="password" placeholder="Enter Password">
                       @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                      @endif

                    <button class="btn btn-primary">Login <i class="fa fa-fw fa-unlock-alt"></i></button>
                    <a href="#" class="forgot-password">Forgot password?</a><hr>
                    <a href="{{url('register')}}" class="forgot-password">Create New Account</a>
                  </div>
                </div>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection

