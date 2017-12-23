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
                <li style="cursor: pointer;"><a href="" data-toggle="modal" data-target="#loginModel"><b>Login</b></a></li>
                <li style="cursor: pointer;"><a  data-toggle="modal" data-target="#registerModel"><b>Register</b></a></li>
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
             <div class="col-md-offset-5">
                <img src="{{asset('web/images/user.png')}}" class="img-circle" height="126px">
             </div>
     <!-- Display login section -->
           <section class="login_box" >
              <!-- Display login error message -->
           <div class="alert alert-danger text-center" id='email_login' style="font-size: 17px;"></div>
              <form class="form-horizontal" data-parsley-validate  id="login" name="myform"  >
                {{ csrf_field() }}              
                <div class=" text-center">           
                  <div class="">
                    <input class="form-control col-md-offset-3" type="email" class="email" name="email" placeholder="Email"  style="width: 50%"><br>
                        @if ($errors->has('email'))
                            <span class="help-block"  style="margin-left: -6px;">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    <input class="form-control col-md-offset-3" type="password" class="password" name="password" placeholder="Enter Password"  style="width: 50%"><br>
                       @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                      @endif

                    <button class="btn btn-primary login_user">Login <i class="fa fa-fw fa-unlock-alt"></i></button><br><br>
                    <a class="forgotsection" style="cursor: pointer;">Forgot password?</a><hr>
                    <a  class="forgot-password" id="create_new_account">Create New Account</a>
                  </div>
                </div>          
               </form>
           </section>
          <!-- Display Forgot section --> 
           <section class="forgot_box" style="display: none;">
            <div class="alert alert-danger text-center" id="forgot_error"></div>
             <form class="form-horizontal" data-parsley-validate  id="forgot" name="forgotForm" >
                  {{ csrf_field() }}
                    <div class="">
                      <div class=" text-center">
                          <div id="success_forgot_user" class="alert alert-success"></div>
                              @if(session()->has('worng_email'))
                              <div class="alert alert-danger" style="padding:7px ; margin-bottom: 2px;">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                          ×</button>
                                    {{session()->get('worng_email')}}
                                  </div>
                            @endif
                        <div class="">
                          <input class="form-control col-md-offset-3" type="email" id="forgotEmail" name="forgot_email" placeholder="Email" style="width:50%"><br>
                              @if ($errors->has('forgot_email'))
                                  <span class="help-block" style="margin-left: 61px;">
                                      <strong>{{ $errors->first('forgot_email') }}</strong>
                                  </span>
                              @endif
                          <button class="btn btn-primary" >Forgot Password <i class="fa fa-fw fa-unlock-alt"></i></button><br><br>
                          <a  class="loginsection" style='cursor:pointer'>Login</a><hr>
                        </div>
                      </div>
                    </div>
                </form>
           </section>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  

   <!--Register Modal -->
  <div class="modal fade" id="registerModel" role="dialog">
    <div class="modal-dialog   modal-md"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h2>User Registration</h2>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="register" name="register_form" onsubmit="return registerfun()">
            {{csrf_field()}}
            <input type="hidden" id="baseUrl" value="{{ route('register') }}">
              <div>               
                <div class="text-center">
                   <!-- Display register error message -->
                    <div class="alert alert-danger" id='register_user' style="font-size: 17px;"> </div>

                     <!-- Display register success message -->
                    <div class="alert alert-success" id='success_register_user' style="font-size: 17px;"> </div>

                  <img src="{{asset('web/images/user.png')}}" class="img-circle"  height="126px">
                  <div>
                     @if(session()->has('success_msg'))
                        <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    ×</button>
                              {{session()->get('success_msg')}}
                            </div>
                    @endif
                    <input class="form-control col-md-offset-2" type="text" name="fname" placeholder="First Name" id="fname"  value="{{ old('fname') }}"  autofocus style="width: 60%" ><br>
                        @if ($errors->has('fname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fname') }}</strong>
                            </span>
                        @endif

                    <input class="form-control col-md-offset-2" type="text" name="lname" placeholder="Last Name" id="lname" value="{{ old('lname') }}" style="width: 60%" ><br>
                        @if ($errors->has('lname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                        @endif

                    <input class="form-control col-md-offset-2" type="text" placeholder="Email" id="email" name="email"  value="{{ old('email') }}" style="width: 60%"  ><br>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    <select class="form-control col-md-offset-2"  name="gender" style="width: 60%" id="gender" ><br>
                        <option value="">Select gender</option>
                        <option value="male"> Male</option>
                        <option value="female">Female</option>
                    </select>                       
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif<br>
                    <input class="form-control col-md-offset-2" type="password" name="password" id="password" placeholder="Enter Password" style="width: 60%" ><br>
                       @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                      @endif
                    <input class="form-control col-md-offset-2" type="password" id="cpassword" name="password_confirmation" placeholder="Confirm Password" style="width: 60%" ><br>
                    
                    <button class="btn btn-primary" >Create Account <i class="fa fa-fw fa-unlock-alt"></i></button><br><br>
                    <a id="already_member" class="forgot-password" >I Already Member</a>
                  </div>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="registerclose">Close</button>
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



/**************** Altrenate change div **********/
$('#create_new_account').on('click',function(){
    $('#loginModel').modal('hide');
   $('#registerModel').modal('show');
});


$('#already_member').on('click',function(){
    $('#loginModel').modal('show');
   $('#registerModel').modal('hide');
});


 /*********** login form *************/ 
 $('#email_login').hide();
 $("#login").on('submit',function(e) {
 
      e.preventDefault();
      var email =document.forms["myform"]["email"].value;
      var password =document.forms['myform']['password'].value;
      var url = "{{ route('login') }}";
      
      if(email == "")
      {
        //alert("email must be feild out");
        $('#email_login').show();
        $('#email_login').html('Email Must be Filed');
        return false;
      }
      else if(password == "")
      {
        //alert("passwod must be feild out");
        $('#email_login').show();
        $('#email_login').html('password Must be Filed');
        return false;
      }

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


/************** Forgot Section ******************/
 $('#forgot_error').hide();
 $('#success_forgot_user').hide();
 $('#forgot').on('submit',function(e){
    e.preventDefault();
    var forgot_email =document.forms["forgotForm"]["forgotEmail"].value;
    var url = "{{ route('forgot') }}";
  // alert(url);
    if(forgot_email == '')
    {
      $('#forgot_error').show('slow');
      $('#forgot_error').html('Email Must be Filed');
       return false;
    }
    else
    {
      $('#forgot_error').hide();
    }

       $.ajax({   
              method: "POST",
              data: $("#forgot").serialize(),
              url: url,

               success:function(data){
                $('#success_forgot_user').show();
                var forgot_email = '';
              //console.log(data.success);
             $('#success_forgot_user').html(data.success);
              //alert('succesfully');
             }
        });
 });
  $('#close').click(function(){
         $('#success_forgot_user').hide();
          $('#forgot_error').hide();
          $('#email_login').hide();
       });



/************* User Registred Form *********/
  $('#register_user').hide();
  $('#success_register_user').hide();
  $("#register").on('submit',function(e) {
          e.preventDefault();
          var fname =document.forms["register_form"]["fname"].value;
          var lname =document.forms["register_form"]["lname"].value;
          var password =document.forms["register_form"]["password"].value;
          var cpassword =document.forms["register_form"]["cpassword"].value;
          var email =document.forms["register_form"]["email"].value;
          var password =document.forms['register_form']['password'].value;
          var url = "{{ route('login') }}";
          //alert(fname);
         
          if(fname == "")
          {
            //alert("email must be feild out");
            $('#register_user').show('slow');
            $('#register_user').html('firstname Must be Filed');
            return false;
          } 

           if(lname == "")
          {
            //alert("email must be feild out");
            $('#register_user').show('slow');
            $('#register_user').html('lastname Must be Filed');
            return false;
          }

           if(gender == "")
          {
            //alert("email must be feild out");
            $('#register_user').show('slow');
            $('#register_user').html('gender Must be Filed');
            return false;
          }

            if(email == "")
          {
            //alert("email must be feild out");
            $('#register_user').show('slow');
            $('#register_user').html('email Must be Filed');
            return false;
          }


          if(password == "")
          {
            //alert("email must be feild out");
            $('#register_user').show('slow');
            $('#register_user').html('password Must be Filed');
            return false;
          }


           if(cpassword == "")
          {
            //alert("email must be feild out");
            $('#register_user').html('confirm password Must be Filed');
            return false;
          }

           if(password != cpassword)
          {
            //alert("email must be feild out");
            $('#register_user').show('slow');
            $('#register_user').html('Password Does Not Match');
            return false;
          }
          
          else
          {
            $('#register_user').hide();
          }
             
         $.ajax({   
              method: "POST",
              data: $("#login").serialize(),
              url: url,

               success:function(data){
              //console.log(data);
              $('#success_register_user').html('Successfully User Registred');
              //alert('succesfully');
             }
        });
    });

 $('#registerclose').click(function(){
            $('#register_user').hide();
        });


/*
 //show loginModel hide register Model
  $('#registermodel').on('hidden',function(){
     // $('#registermodel').modal('hide');
     $('#loginModel').modal('show');
  });
 
 //show  registerModel hide loginModel
  $('#loginModel').on('click',function(){
    //$('#loginModel').model('hide');
    $('#registerModel').model('show');
  });*/

});
</script>
</script>