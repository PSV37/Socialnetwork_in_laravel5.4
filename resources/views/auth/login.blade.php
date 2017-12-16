@extends('auth.comman')

@section('content')
<div class="container"  id="app" >
    
  <div id="content">
   <section class="login_section" >
     
        <div class="container-fluid">
        <form class="form-horizontal" data-parsley-validate method="POST" action="{{route('login')}}">
            {{ csrf_field() }}
              <div class="lock-container">
                <h1>Account Access</h1>
                <div class="panel panel-default text-center">
                  <img src="{{asset('web/images/user.png')}}" class="img-circle" height="126px">
                  <div class="panel-body">
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                        @if ($errors->has('email'))
                            <span class="help-block"  style="margin-left: -6px;">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    <input class="form-control" type="password" name="password" placeholder="Enter Password" required>
                       @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                      @endif

                    <button class="btn btn-primary">Login <i class="fa fa-fw fa-unlock-alt"></i></button><br><br>
                    <a href="#" class="forgot_password">Forgot password?</a><hr>
                    <a href="{{url('register')}}" class="forgot-password">Create New Account</a>
                  </div>
                </div>
              </div>
          </form>
      </div>

   </section>

   <section class="forgot_section" style="display:none">
          <div class="container-fluid">
        <form class="form-horizontal" method="POST" action="{{ route('forgot') }}">
            {{ csrf_field() }}
              <div class="lock-container">
                <h1>Account Access</h1>
                <div class="panel panel-default text-center">
                  <img src="{{asset('web/images/user.png')}}" class="img-circle" height="126px">
                       @if(session()->has('reset'))
                        <div class="alert alert-success" style="padding:7px ; margin-bottom: 2px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    ×</button>
                              {{session()->get('reset')}}
                            </div>
                      @endif
                        @if(session()->has('worng_email'))
                        <div class="alert alert-danger" style="padding:7px ; margin-bottom: 2px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    ×</button>
                              {{session()->get('worng_email')}}
                            </div>
                      @endif
                  <div class="panel-body">
                    <input class="form-control" type="email" name="forgot_email" placeholder="Email">
                        @if ($errors->has('forgot_email'))
                            <span class="help-block" style="margin-left: 61px;">
                                <strong>{{ $errors->first('forgot_email') }}</strong>
                            </span>
                        @endif
                    <button class="btn btn-primary" >Forgot Password <i class="fa fa-fw fa-unlock-alt"></i></button><br><br>
                    <a  class="login_section_a" style='cursor:pointer'>Login</a><hr>
                  </div>
                </div>
              </div>
          </form>
      </div>
   </section>
  </div>
</div>
@endsection
 <script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function(){
     $('.forgot_password').on('click',function(){
       $('.forgot_section').show();
       $('.login_section').hide();
     });

      $('.login_section_a').on('click',function(){
       $('.forgot_section').hide();
       $('.login_section').show();
     });


      $("#login").on('submit',function(e) {
    e.preventDefault();
    var url = "{{ route('login') }}";
     $.ajax({   
        method: "POST",
        data: $("#login").serialize(),
        url: url,
    })
    .done(function(data) {
        //console.log(data);
        window.location.href = '/home';
    });
   
});


  })
</script>

