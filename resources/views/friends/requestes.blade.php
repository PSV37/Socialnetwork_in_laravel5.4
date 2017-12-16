@extends('layouts.app')

@section('content')
    <div class="container-fluid" >
          @if(session()->has('success'))
              <div class="alert alert-success">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                         ×</button>
                     {{session()->get('success')}}
              </div>
          @endif                 
        <!-- display remove request msg -->
           @if(session()->has('msg'))
            <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×</button>
                  {{session()->get('msg')}}
                </div>
           @endif
           @if($frndrequests)
             <div class="row" style="margin-top:20px">
               @foreach($frndrequests as $request)
                    <div class="col-md-5" id="user_uniq{{$request->id}}">
                      <div class="panel panel-default">
                        <div class="panel-body" id="remove_confirm">
                           <div class="col-md-2 pull-left">
                                <img src="{{url('../')}}/images/{{$request->image}}"
                                width="95px" height="80px" class="img-rounded"/>
                             </div>
                               <div class="col-md-7" style="margin-left: 36px;width: 32%;margin-top: 7px;">
                                      <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$request->slug}}">
                                        {{ucwords($request->firstname)}}</a></h3>
                                        <p>{{$request->gender}}</p>
                                     
                               </div>
                              
                                      <div class="col-md-3 pull-right " style="margin-top: 20px">                     
                                             <p>
                                              <a   class="btn btn-primary confirm" style="margin-left: -65px;">Confirm
                                              <input type="hidden" class="confirm_id" value="{{$request->id}}">
                                              <input type="hidden" class="baseUrl" value="{{url('/confirm/request')}}">
                                              </a>
                                              <a class="btn btn-danger remove">remove
                                                  <input type="hidden" class="remove_id" value="{{$request->id}}">
                                                  <input type="hidden" class="removebaseUrl" value="{{url('/remove/request')}}">
                                              </a>
                                           </p>                         
                                      </div>
                               </div>
                          </div>                          
                        </div>    
                  @endforeach 
             </div>
           @else
              <p>no friends</p>
 
           @endif

            </div>

 @endsection
 <script src="{{ asset('js/app.js') }}"></script>

 <script type="text/javascript">
   $(document).ready(function(){

  /********* Confirm Request *********/
      $('.confirm').on('click',function(){
       // e.prevenDefault();
        var confirm_id = $(this).find('.confirm_id').val();
        var url = $('.baseUrl').val();
       $.ajax({
           type : 'GET',
           url : url,
           data :{'confirm_id':confirm_id},

           success:function(response){
               toastr.success('Accepted Friend Request!', 'Success Alert', {timeOut: 5000});
               $('#user_uniq'+ response[1]).delay(1000).fadeOut();
               // alert('successfully');
               // console.log(response[1]);
                //location.reload();
           },
           error:function(data){
          alert('error');
           } 
        });
        
      });

/********* Remove Request *********/
   $('.remove').on('click',function(){
       // e.prevenDefault();
        var remove_id = $(this).find('.remove_id').val();
        var url =$('.removebaseUrl').val();
       //alert(url);
      
         $.ajax({
           type : 'GET',
           url : url,
           data :{'remove_id':remove_id},

     
           success:function(response){
               toastr.success('Removed Friend Request!', 'Success Alert', {timeOut: 5000});
               $('#user_uniq'+ response[1]).delay(1000).fadeOut();
               // alert('successfully');
              // console.log(response[1]);
                //location.reload();
                
           },
           error:function(data){
          alert('error');
           } 
        });
   
      });


   });
 </script>

