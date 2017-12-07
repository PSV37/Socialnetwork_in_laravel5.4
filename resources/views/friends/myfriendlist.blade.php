@extends('layouts.app')

@section('content')
 <div class="container-fluid">
   
                  <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse collapsed_nav" id="subnav">
                <ul class="nav navbar-nav " style="margin-top: -12px;">
                  <li class="active"><a href="index.html"><i class="fa fa-fw icon-ship-wheel"></i> Timeline</a></li>
                  <li><a href="user-public-profile.html"><i class="fa fa-fw icon-user-1"></i> About</a></li>
                  <li><a href="user-public-users.html"><i class="fa fa-fw fa-users"></i> Friends</a></li>
                </ul>
                <ul class="nav navbar-nav hidden-xs navbar-right " style="margin-top: -12px;">
                  <li><a href="#" data-toggle="chat-box">Chat <i class="fa fa-fw fa-comment-o"></i></a></li>
                </ul>
              </div>
              <!-- /.navbar-collapse -->
            </div>

          </nav>         
           <div class="cover overlay cover-image-full height-300-lg">
            <img src="{{url('../')}}/coverpics/{{Auth::user()->coverpic}}" alt="cover"  style="height: 105%;"/>
            <div class="overlay overlay-full">
              <div class="v-top">
                   <i class="fa fa-pencil pencil_div" data-toggle="modal" data-target="#cover_myModal"></i>                
                <!-- <input type="file" @change="onfilechange" style="position:absolute;left: 0;top: 0; opacity: 0" />  -->
              </div>
            </div>
         </div>
 
    <!-- Upload Cover Picture Model  -->
         <div class="modal fade" id="cover_myModal" role="dialog">
              <div class="modal-dialog  modal-lg">
                <!-- Modal content-->
                  <div class="modal-content">
                      <div class="modal-header user_model">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Upload Cover Picture</h4>
                      </div>
                      <div class="modal-body ">
                           <form action="{{url('upload/cover')}}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div style="position: relative;display: inline-block;">
                                 <div class="upload_img">
                                   <span class="glyphicon glyphicon-upload span_div" ></span><b> Cover photo upload</b><br><br>
                                   <input type="file" name="coverpic" style="position:absolute;left: 0;top: 0; opacity: 0" required>  
                                   <button type="submit" class="btn btn-danger">Upload</button>
                                 </div>          
                              </div>
                           </form> 
                          <hr>
                          <div >
                             <div class="col-md-6">
                              <img src="{{url('../')}}/coverpics/{{Auth::user()->coverpic}}" alt="cover"   style="margin-top: 17px"/>
                        
                                   <h4 class="text-center" style="margin-left: -131px;"><b>Old Image</b></h4>
                             </div>
                          </div>                                     
                      </div>
                      <div class="modal-footer" style="background-color: white; height: 55px;">
                          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                      </div>
                  </div>             
              </div>
        </div>
        <!--End Profile  Modal -->
           <div style="margin-left: 13px"> 
                <div id="filter">
              <form class="form-inline">
                <label>Filter:</label>
                <select name="users-filter" id="users-filter-select" class="selectpicker" class="btn btn-primary" data-width="auto">
                  <option value="all">All</option>
                  <option value="friends">Friends of Friends</option>
                  <option value="name">by Name</option>
                </select>
                <div id="users-filter-trigger">
                  <div class="select-friends hidden">
                    <select name="users-filter-friends" class="selectpicker" data-style="btn-primary" data-live-search="true">
                      <option value="0">Select Friend</option>
                      <option value="1">Mary D.</option>
                      <option value="2">Michelle S.</option>
                      <option value="3">Adrian Demian</option>
                    </select>
                  </div>
                  <div class="search-name hidden">
                    <input type="text" class="form-control" name="user-first" placeholder="First Last Name" id="name" />
                    <a href="#" class="btn btn-default hidden" id="user-search-name"><i class="fa fa-search"></i> Search</a>
                  </div>

                </div>
              </form>
            </div>

            <div class="row" data-toggle="isotope">
              @foreach($friends as $friends)  
              <div class="col-md-6 col-lg-4 item">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="media">
                      <div class="pull-left">
                        <img src="{{url('../')}}/images/{{$friends->image}}" alt="people" class="media-object img-circle" style="height: 37px;"/>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading margin-v-5"><a href="{{url('/profile')}}/{{$friends->slug}}" >{{ucwords($friends->firstname)}}</a></h4>
                        <div class="profile-icons">
                          <span><i class="fa fa-users"></i> 372</span>
                          <span><i class="fa fa-photo"></i> 43</span>
                          <span><i class="fa fa-video-camera"></i> 3</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                    <p class="common-friends">Common Friends</p>
                    <div class="user-friend-list">
                      <a href="#">
                        <img src="{{asset('web/images/people/50/guy-1.jpg')}}" alt="people" class="img-circle" />
                      </a>
                      <a href="#">
                        <img src="{{asset('web/images/people/50/guy-5.jpg')}}" alt="people" class="img-circle" />
                      </a>
                      <a href="#">
                        <img src="{{asset('web/images/people/50/woman-4.jpg')}}" alt="people" class="img-circle" />
                      </a>
                      <a href="#">
                        <img src="{{asset('web/images/people/50/woman-5.jpg')}}" alt="people" class="img-circle" />
                      </a>
                    </div>
                  </div>
                  <div class="panel-footer">
                    <a href="#" class="btn btn-default btn-sm">Follow <i class="fa fa-share"></i></a>
                  </div>
                </div>
              </div>
            @endforeach 

          </div>

           </div>
 </div>
 @endsection
 <script src="{{ asset('js/app.js') }}"></script>
   <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "SNS5",
      skins: {
        "default": {
          "primary-color": "#16ae9f"
        },
        "orange": {
          "primary-color": "#e74c3c"
        },
        "blue": {
          "primary-color": "#4687ce"
        },
        "purple": {
          "primary-color": "#af86b9"
        },
        "brown": {
          "primary-color": "#c3a961"
        },
        "default-nav-inverse": {
          "color-block": "#242424"
        }
      }
    };
  </script>
