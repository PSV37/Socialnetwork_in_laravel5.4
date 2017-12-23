@extends('auth.comman')

@section('content')
<div class="container">   
  <div id="content">   
        <div class="container-fluid">
  
         <form class="form-horizontal" id="resetForm">
             {{ csrf_field() }}
          <input type="hidden" id="token" name="verifyToken" value="{{$verifyToken}}">
              <div class="lock-container">
                <h1>Account Access</h1>
               
                <div class="panel panel-default text-center">
                  <img src="{{asset('web/images/user.png')}}" class="img-circle" height="126px">
                   <div id="success_reset" class="alert alert-danger"></div>
                  <div class="panel-body">
                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password" >
                         @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                         @endif
                    <input class="form-control" type="password" id="cpassword" placeholder="Enter Confirm Password" >
                       @if ($errors->has('cpassword'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cpassword') }}</strong>
                            </span>
                       @endif
                    <button class="btn btn-primary" id="resetUserForm" >Set Password <i class="fa fa-fw fa-unlock-alt"></i></button><br><br>                 
                  </div>
                </div>
              </div>
         </form>
      </div>
  </div>
</div>
@endsection
 
 <script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
  
  $(document).ready(function(){
    $('#success_reset').hide();
    $('#resetForm').on('submit',function(e){
       $('#rsuccess_reset').show();
       e.preventDefault();
       var password = $("#password").val();
       var cpassword = $("#cpassword").val();
       var token = $("#token").val();

       var url = "{{ url('reset') }}";

      // alert(url);
      if(password == "")
      { 
        alert('Password Must be filed');
       // $('#success_reset').html('Email Must be Filed');
       // return false;
      }
      else if(cpassword =="")
      {
        alert('Confirm Password Must be filed');
      }

      else if(password != cpassword)
      {
        alert('Password Does Not Match');
      }

      else
      {
          $('#success_reset').hide();
      }

     $.ajax({
        type : "POST",
        data: {"password":password , "token":token},
        url : url,

        success:function(response){
          console.log(response.success);
          alert('successfully set your password');
           //$("#msg").html("Category has been Created");
        }
      });

    });
  });
</script>