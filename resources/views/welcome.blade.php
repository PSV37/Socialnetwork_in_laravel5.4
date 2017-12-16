@extends('auth.comman')

@section('content')

  <!-- Fixed navbar -->
    <div class="navbar navbar-main navbar-primary navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="#sidebar-menu" data-effect="st-effect-1" data-toggle="sidebar-menu" class="toggle pull-left visible-xs"><i class="fa fa-ellipsis-v"></i></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#sidebar-chat" data-toggle="sidebar-menu" data-effect="st-effect-1" class="toggle pull-right visible-xs"><i class="fa fa-comments"></i></a>
          <a class="navbar-brand" href="index.html">Freed</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-nav"> 
          <ul class="nav navbar-nav navbar-right">
             @guest
                <li ><a href="" data-toggle="modal" data-target="#loginModel"><b>Login</b></a></li>
                <li><a  data-toggle="modal" data-target="#registerModel"><b>Register</b></a></li>
            @else
                <li class="dropdown">
                    <a href="{{ url('/home') }}" style="font-size: 17px "><b>Dashboard  ( {{Auth::user()->firstname}} )</b></a>
                </li>
                <li class="dropdown">
                      <a href="{{ route('logout') }}" style="font-size: 17px "><b>Logout</b></a>
                </li>   
  
             @endguest 
          </ul>
        
        <!-- /.navbar-collapse -->  
         </div>       
       </div>       
    </div>

 <!--Login Modal -->
  <div class="modal fade" id="loginModel" role="dialog">
    <div class="modal-dialog  modal-md"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h2>User Login</h2>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" data-parsley-validate  id="login">
            {{ csrf_field() }}              
                <div class=" text-center">
                  <img src="{{asset('web/images/user.png')}}" class="img-circle" height="126px">
                  <div class="">
                    <input class="form-control col-md-offset-3" type="email" name="email" placeholder="Email" required style="width: 50%"><br>
                        @if ($errors->has('email'))
                            <span class="help-block"  style="margin-left: -6px;">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    <input class="form-control col-md-offset-3" type="password" name="password" placeholder="Enter Password" required style="width: 50%">
                       @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                      @endif

                    <button class="btn btn-primary">Login <i class="fa fa-fw fa-unlock-alt"></i></button><br><br>
                    <a href="#" data-toggle="modal" data-target="#forgotModel">Forgot password?</a><hr>
                    <a id="registerbox" class="forgot-password">Create New Account</a>
                  </div>
                </div>
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
   <!-- Modal Forgot-->
   <div class="modal fade" id="forgotModel" role="dialog">
    <div class="modal-dialog"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2>Forgot Password</h2>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" method="POST" action="{{ route('forgot') }}">
            {{ csrf_field() }}
              <div class="">
                
                <div class=" text-center">
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
                  <div class="">
                    <input class="form-control col-md-offset-3" type="email" name="forgot_email" placeholder="Email" style="width:50%"><br>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

   <!--Login Modal -->
  <div class="modal fade" id="registerModel" role="dialog">
    <div class="modal-dialog   modal-md"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h2>User Registration</h2>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="register">
            {{csrf_field()}}
            <input type="hidden" id="baseUrl" value="{{ route('register') }}">
              <div>               
                <div class="text-center">
                  <img src="{{asset('web/images/user.png')}}" class="img-circle"  height="126px">
                  <div>
                     @if(session()->has('success_msg'))
                        <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    ×</button>
                              {{session()->get('success_msg')}}
                            </div>
                    @endif
                    <input class="form-control col-md-offset-2" type="text" name="fname" placeholder="First Name"  value="{{ old('fname') }}"  autofocus style="width: 60%"><br>
                        @if ($errors->has('fname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fname') }}</strong>
                            </span>
                        @endif

                    <input class="form-control col-md-offset-2" type="text" name="lname" placeholder="Last Name"  value="{{ old('lname') }}" style="width: 60%"><br>
                        @if ($errors->has('lname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                        @endif

                    <input class="form-control col-md-offset-2" type="text" placeholder="Email" name="email"  value="{{ old('email') }}" style="width: 60%" ><br>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    <select class="form-control col-md-offset-2"  name="gender" style="width: 60%" ><br>
                        <option value="">Select gender</option>
                        <option value="male"> Male</option>
                        <option value="female">Female</option>
                    </select>                       
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif<br>
                    <input class="form-control col-md-offset-2" type="password" name="password" placeholder="Enter Password" style="width: 60%"><br>
                       @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                      @endif
                    <input class="form-control col-md-offset-2" type="password" name="password_confirmation" placeholder="Confirm Password" style="width: 60%"><br>
                    <button class="btn btn-primary">Create Account <i class="fa fa-fw fa-unlock-alt"></i></button>
                    <a data-toggle="modal" data-target="#forgotModel" class="forgot-password">Forgot password?</a><hr>
                    <a id="loginbox" class="forgot-password">I Already Member</a>
                  </div>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
        
@endsection
 <script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){
 /*   $('.forgot_password').on('click',function(){
    $('.forgot_section').show();
    $('.login_section').hide();
    });

    $('.login_section_a').on('click',function(){
    $('.forgot_section').hide();
    $('.login_section').show();
    });
*/
 //submit login form 
    $("#login").on('submit',function(e) {
          e.preventDefault();
          var url = "{{ route('login') }}";
        $.ajax({   
            method: "POST",
            data: $("#login").serialize(),
            url: url,

             success:function(data){
            //console.log(data);
            window.location.href = '/home';
            //alert('succesfully');
           }
        });
    });

     //submit login form 
    $("#register").on('submit',function(e) {
          e.preventDefault();
          var url =$('#baseUrl').val();
          //alert(url);
        $.ajax({   
            method: "POST",
            data: $("#register").serialize(),
            url: url,

             success:function(data){
            //console.log(data);
            //alert('succesfully');
            //window.location.href = '/home';
                  toastr.success('Successfully User  Registred!', 'Success Alert', {timeOut: 5000});
                  $('#registerModel').modal('hide');
                  location.reload();

           }
        });
    });

 //show loginModel hide register Model
  $('#loginbox').on('click',function(){
      $('#registermodel').modal('hide');
     $('#loginModel').modal('show');
  });
 
 //show  registerModel hide loginModel
  $('#registerbox').on('click',function(){
    $('#loginModel').model('hide');
    $('#registerModel').model('show');
  });
});
</script>
</script>