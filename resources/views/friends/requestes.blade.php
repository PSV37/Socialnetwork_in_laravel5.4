@extends('layouts.app')

@section('content')

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="subnav" >
                <ul class="nav navbar-nav ">
                  <li><a href="user-private-timeline.html"><i class="fa fa-fw icon-ship-wheel"></i>Friend Request</a></li>
                </ul>
                <ul class="nav navbar-nav  navbar-right ">
                  <li><a href="login.html"> All Friends<i class="fa fa-fw fa-sign-out"></i></a></li>
                </ul>
              </div>
              <!-- /.navbar-collapse -->

            </div>
          </nav>

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
 
               @foreach($frndrequests as $request)
             <div class="row" style="margin-top:20px">
                  <div class="col-md-5">
                    <div class="panel panel-default">
                      <div class="panel-body">
                         <div class="col-md-2 pull-left">
                              <img src="{{url('../')}}/images/{{$request->image}}"
                              width="95px" height="80px" class="img-rounded"/>
                           </div>
                             <div class="col-md-7" style="margin-left: 36px;width: 32%;margin-top: 7px;">
                                    <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$request->slug}}">
                                      {{ucwords($request->firstname)}}</a></h3>
                                      <p>{{$request->gender}}</p>
                                   
                             </div>
                            
                                    <div class="col-md-3 pull-right" style="margin-top: 20px">                     
                                           <p>
                                            <a href="{{url('/confirm/request')}}/{{$request->slug}}/{{$request->id}}" class="btn btn-primary" style="margin-left: -65px;">Confirm</a>
                                            <a href="{{url('/remove/request')}}/{{$request->id}}" class="btn btn-danger">remove</a>
                                         </p>                                                                                 
                                    </div>
                             </div>
                        </div>
                        
                      </div> 
                    </div>
                  @endforeach 
           @else
 
         <div>
             <p>No Any Friends</p>
         </div>

           @endif

            </div>

 @endsection
 <script src="{{ asset('js/app.js') }}"></script>