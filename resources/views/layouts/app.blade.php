  <!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="">
  <title>ThemeKit</title>

  <!-- Vendor CSS BUNDLE
    Includes styling for all of the 3rd party libraries used with this module, such as Bootstrap, Font Awesome and others.
    TIP: Using bundles will improve performance by reducing the number of network requests the client needs to make when loading the page. -->
    <link href="{{ asset('css/comman.css') }}" rel="stylesheet">
    <link href="{{ asset('web/css/vendor/all.css') }}" rel="stylesheet">
    <link href="{{ asset('web/css/app/app.css') }}" rel="stylesheet">
    <link href="{{ asset('js/parsleyjs/parsley.js') }}" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.min.js"></script>
    {{-- <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <style type="text/css">
    .cover_img
    {
      width: 100%;
      height: 100%;
    }
    .span_div
    {
       padding-left: 16px;
       padding-top: 4px; 
    }
    .pencil_div
    {
        padding-left: 10px;
       padding-top: 4px; 
        background-color: darkgray;
        width: 2%;
        height: 19px;
        position: absolute;
        display: inline-block;
        border-radius: 11px;
        cursor: pointer;
    }
     .upload_img
    {
      border: 1px solid burlywood;
       border-radius: 10px;
       background-color: ghostwhite;
       padding: 3 15 3 10;
       margin-bottom: 10px;
       height: 31px;
      width: 119%;
      margin-left: 12px;
      margin-top: 8px;
    }
    .user_profile
    {
      height: 88px;
      width: 98px;
    }
    .modal-content
    {
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
      height: 65%;
    }
    .user_model
    {
      color: white;
      background-color: #13534d;
    }
    .img-thumbnail 
    {
      padding: 4px;
      line-height: 1.42857143;
      background-color: #f5f5f5;
      border: 1px solid #dddddd;
      border-radius: 4px;
      display: inline-block;
      max-width: 242%;
      height: 185px;
    }
    
   .sidebar [data-scrollable] 
   {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: auto;
    z-index: 2;
    overflow-x: hidden;
   }
    .upload_remove_img b
    {
       position: relative;
      display: inline-block;
    }
    .post_img 
    {
      padding: 4px;
      line-height: 1.42857143;
      background-color: #f5f5f5;
      border: 1px solid #dddddd;
      border-radius: 4px;
      display: inline-block;
      height: 325px;
      width: 49%;
      margin-left: 18px;
    }
    .remove_img
    {
      top: 0px;
      right: 0px;
      position: absolute;
      cursor: pointer;
    }
      .badge_content
    {
        background:wheat;
        position: relative;
        top: -15px;
        left: -10px;
    }
    /*******************************
* MODAL AS LEFT/RIGHT SIDEBAR
* Add "left" or "right" in modal parent div, after class="modal".
* Get free snippets on bootpen.com
*******************************/
  .modal.left .modal-dialog,
  .modal.right .modal-dialog {
    position: fixed;
    margin: auto;
    width: 320px;
    height: 100%;
    -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
         -o-transform: translate3d(0%, 0, 0);
            transform: translate3d(0%, 0, 0);
  }

  .modal.left .modal-content,
  .modal.right .modal-content {
    height: 100%;
    overflow-y: auto;
  }
  
  .modal.left .modal-body,
  .modal.right .modal-body {
    padding: 15px 15px 80px;
  }

/*Left*/
  .modal.left.fade .modal-dialog{
    left: -320px;
    -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
       -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
         -o-transition: opacity 0.3s linear, left 0.3s ease-out;
            transition: opacity 0.3s linear, left 0.3s ease-out;
  }
  
  .modal.left.fade.in .modal-dialog{
    left: 0;
  }
        
/*Right*/
  .modal.right.fade .modal-dialog {
    right: -320px;
    -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
       -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
         -o-transition: opacity 0.3s linear, right 0.3s ease-out;
            transition: opacity 0.3s linear, right 0.3s ease-out;
  }
  
  .modal.right.fade.in .modal-dialog {
    right: 0;
  }

/* ----- MODAL STYLE ----- */
  .modal-content {
    border-radius: 0;
    border: none;
  }

  .modal-header {
    border-bottom-color: #EEEEEE;
    background-color: #FAFAFA;
  }

/* ----- v CAN BE DELETED v ----- */
body {
  background-color: #78909C;
}

.demo {
  padding-top: 60px;
  padding-bottom: 110px;
}

.btn-demo {
  margin: 15px;
  padding: 10px 15px;
  border-radius: 0;
  font-size: 16px;
  background-color: #FFFFFF;
}

.btn-demo:focus {
  outline: 0;
}

.demo-footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  padding: 15px;
  background-color: #212121;
  text-align: center;
}

.demo-footer > a {
  text-decoration: none;
  font-weight: bold;
  font-size: 16px;
  color: #fff;
}
   </style>
<!-- Vendor CSS Standalone Libraries
        NOTE: Some of these may have been customized (for example, Bootstrap).
        See: src/less/themes/{theme_name}/vendor/ directory -->



  <!-- APP CSS BUNDLE [css/app/app.css]
INCLUDES:
    - The APP CSS CORE styling required by the "social-2" module, also available with main.css - see below;
    - The APP CSS STANDALONE modules required by the "social-2" module;
NOTE:
    - This bundle may NOT include ALL of the available APP CSS STANDALONE modules;
      It was optimised to load only what is actually used by the "social-2" module;
      Other APP CSS STANDALONE modules may be available in addition to what's included with this bundle.
      See src/less/themes/social-2/app.less
TIP:
    - Using bundles will improve performance by greatly reducing the number of network requests the client needs to make when loading the page. -->
  
<!--    <link href="{{ asset('web/css/app.css') }}" rel="stylesheet"> -->

  <!-- App CSS CORE
This variant is to be used when loading the separate styling modules -->
  <!-- <link href="css/app/main.css" rel="stylesheet"> -->

  <!-- App CSS Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL modules are 100% compatible -->

  <!-- <link href="css/app/essentials.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/layout.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/sidebar.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/sidebar-skins.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/navbar.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/media.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/player.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/timeline.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/cover.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/chat.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/charts.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/maps.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-alerts.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-background.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-buttons.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-calendar.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-progress-bars.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-text.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/ui.css" rel="stylesheet" /> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!--   <link href="{{ asset('web/css/vendor/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/font-awesome.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/picto.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/material-design-iconic-font.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/datepicker3.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/jquery.minicolors.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/bootstrap-slider.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/railscasts.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/jquery-jvectormap.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/slick.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/morris.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/ui.fancytree.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/daterangepicker-bs3.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/jquery.bootstrap-touchspin.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/vendor/select2.css') }}" rel="stylesheet"> -->
</head>

<body>
<div id="app" style="    height: 965px;">
  <div class="st-container">

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
          <a class="navbar-brand" href="{{url('home')}}" class="text-center">Freeds</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-nav">
          <ul class="nav navbar-nav">

            <li class="hidden-sm" data-toggle="tooltip" data-placement="bottom" title="A few Color Examples. Download includes CSS Files for all color examples & the tools to Generate any Color combination. This Color-Switcher is for previewing purposes only.">
              <ul class="skins">

                <li><span data-file="app/app" data-skin="default" style="background: #16ae9f "></span></li>

                <li><span data-file="skin-orange" data-skin="orange" style="background: #e74c3c "></span></li>

                <li><span data-file="skin-blue" data-skin="blue" style="background: #4687ce "></span></li>

                <li><span data-file="skin-purple" data-skin="purple" style="background: #af86b9 "></span></li>

                <li><span data-file="skin-brown" data-skin="brown" style="background: #c3a961 "></span></li>

                <li><span data-file="skin-default-nav-inverse" data-skin="default-nav-inverse" style="background: #242424 "></span></li>

              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right" >
               <li>
                   <a href="{{url('friendlist')}}" >My Friends List
                       [  {{App\Friendship::where('status',1)->where('user_requested',Auth::user()->id)->count()}}
                       ]
                   </a>
                </li>
                <li>
                   <a href="{{url('requestes')}}" > Friend Request  (
                          {{App\Friendship::where('status',0)->where('user_requested',Auth::user()->id)->count()}}
                            )
                   </a>
                </li>
                
                <li>
                   <a href="{{url('friends')}}/{{ Auth::user()->slug }}" >All Friends 
                        [  {{ DB::table('users')->where('users.id','!=',Auth::user()->id)
                                                             ->count()
                                    }} ]
                    </a>
                </li>

                  <li>
                      <a href="#"  style="color: black" >
                        <i class="fa fa-envelope" style="font-size:24px;margin-top: 12px;" ></i>
                          <span class="badge badge_content">
                              {{ DB::table('messages')->where('status','=','1')
                                                           ->where('user_to',Auth::user()->id)
                                                           ->count()
                                  }}
                          </span>
                      </a>            
                 </li>
                 <li class="dropdown" id="unread" >
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >
                         <i class="fa fa-globe fa-2x" aria-hidden="true" style="color: black;margin-top: 12px;"></i> 
                          <span class="badge badge_content">
                              {{ DB::table('notifications')->where('status','!=','NULL')
                                                           ->where('user_hero',Auth::user()->id)
                                                           ->count()
                                  }}
                          </span>
                      </a>
                    <?php 
                         $notes = DB::table('notifications as n')->leftjoin('users as u','u.id','n.user_logged')
                                                                 ->where('user_hero',Auth::user()->id)
                                                                 //->where('status',1)
                                                                 ->orderBy('n.created_at','desc')
                                                                 ->get();
                       ?>

                    <ul class="dropdown-menu" id="notification">
                        @foreach($notes as $note)
                            @if($note->status == 1)
                                <li> <a href="{{url('notifications')}}/{{ $note->slug }}/{{$note->id}}">                                                 
                             @else
                                  <li> 
                             @endif 
                                    <a href="{{url('notifications')}}/{{ $note->slug }}/{{$note->id}}">
                                      <img src="{{url('../')}}/images/{{$note->image}}"  height="50px" width="50px" class="img-rounded ">
                                       <b style="color:green; margin-left: 13px;">{{ucwords($note->firstname)}}</b><small><span style="margin-left: 8px;">{{$note->note}}</span></small>
                                        <small><i class="fa fa-users" aria-hidden="true"  style="color: black;"></i></small>
                                   </a>
                                        <hr class="border_line">
                                </li>
                              
                        @endforeach
                    </ul>
                 </li>
                
                  <li class="hidden-xs" id="chat">
                    <a href="#sidebar-chat" data-toggle="sidebar-menu" data-effect="st-effect-1" style="padding: 10px;color: black;">
                       <i class="fa fa-comments fa-2x" aria-hidden="true"></i>
                    </a>            
                  </li>

            <!-- User -->
            <li class="dropdown" >
              <a href="#" class="dropdown-toggle user" data-toggle="dropdown" id="user_section">
                <img src="{{url('../')}}/images/{{Auth::user()->image}}" alt="people" class="img-circle" width="45"/> {{ucwords(Auth::user()->firstname)}} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu" id='user_profile'>
                <li><a href="{{url('profile')}}/{{ Auth::user()->slug }}">Profile</a></li>
                <li><a href="{{url('messages')}}">Messages</a></li>
                <li>
                     <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
              </ul>
            </li>
          </ul>
        
        <!-- /.navbar-collapse -->     
         </div>
      </div>
    </div>
    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
    <div class="sidebar left sidebar-size-2 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu">
      <div data-scrollable>
        <div class="sidebar-block">
          <div class="profile">
            <img src="{{url('../')}}/images/{{Auth::user()->image}}" alt="people" title="Upload Profile" class="img-circle user_profile" data-toggle="modal" data-target="#myModal" style="cursor:pointer"/>
            <h4>{{ucwords(Auth::user()->firstname)}}</h4>
          </div>
        </div>
   
        <div class="category">Friends</div>
        <?php
              $friends = DB::table('friendships as f')->leftjoin('users as u','u.id','=','f.requester')
                                                      ->where('f.user_requested',Auth::user()->id)
                                                      ->get();
         ?>
          <!--Start My Friends  -->
        <div class="sidebar-block">
          <div class="sidebar-photos">
            <ul>
              @foreach($friends as $friend)
              <li>
                <a href="#">
                   <img src=" {{ url('images')}}/{{$friend->image}}" alt="people"  style="height: 50px;" />
                </a>
              </li>
              @endforeach
            </ul>
            <a href="#" class="btn btn-primary btn-xs">view all</a>
          </div>
        </div>

      <div class="category">MyPosts</div>
        <!--End My Friends  --> 
          <?php
              $posts = DB::table('posts as p')->leftjoin('users as u','u.id','=','p.user_id')
                                                      ->where('p.user_id',Auth::user()->id)
                                                      ->get();
         ?>
       <!--Start My Posts  -->
        <div class="sidebar-block">
          <div class="sidebar-photos">
            <ul>
             @if(!empty('posts'))
                   @foreach($posts as $post)
                     @if($post->postImage)
                        <li>
                          <a href="#">
                             <img src=" {{ url('postImages')}}/{{$post->postImage}}" alt="no image" title="{{$post->firstname}}" style="height: 50px;" />
                          </a>
                        </li>
                     @endif
                    @endforeach
              @else
               <li><a href="" style="color: white;">No Any Post</a></li>
              @endif
            </ul>
            <a href="#" class="btn btn-primary btn-xs">view all</a>
          </div>
        </div>
        <!--End My Posts  -->  
        <div class="category">About Friends</div>
        <div class="sidebar-block">
          <ul class="sidebar-feed">
           @if( ! empty('friends'))
                 @foreach($friends as $frid)
                  <li class="media">
                    <div class="media-left">
                      <span class="media-object">
                                  <i class="fa fa-fw fa-bell"></i>
                              </span>
                    </div>
                    <div class="media-body">
                      <a href="" class="text-white">{{$frid->firstname}}</a>
                      <span class="time"> Last Login : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$frid->created_at)->diffForHumans() }} </span>
                    </div>
                    <div class="media-right">
                      <span class="news-item-success"><i class="fa fa-circle"></i></span>
                    </div>
                  </li>
                 @endforeach 
           @else
             <li><a href="" style="color: white;">No Friends</a></li>
           @endif
          </ul>
        </div>
      </div>
    </div>

                  
    <!--Profile  Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog  modal-lg">
              <!-- Modal content-->
              <div class="modal-content" style="height:75%;">
                <div class="modal-header user_model" >
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Upload Profile Picture</h4>
                </div>
                <div class="modal-body ">
                     <form action="{{url('upload')}}" method="post" enctype="multipart/form-data" data-parsley-validate>
                        {{ csrf_field() }}
                        <div style="position: relative;display: inline-block;">
                       <div class="upload_img">
                         <span class="glyphicon glyphicon-upload span_div" ></span><b>photo upload</b><br><br>
                         <input type="file" name="image" style="position:absolute;left: 0;top: 0; opacity: 0" data-parsley-required="true"  required> 
                         <button type="submit" class="btn btn-success">Upload</button>
                       </div>          
                    </div>
                     </form> 
                    <hr>
                    <div class="row">
                                  <!-- <div class="col-md-6">
                                     <div class="img_div" style="width: 167%;">
                                       <div class="upload_remove_img">
                                         <div @click="removeImg" class="remove_img col-md-offset-5" style="cursor:pointer">X</div>
                                            <img :src="image" style="width: 44%;"/><br>
                                            <h4 class="text-center" style="margin-left:-370px;"><b>New Uploaded Image</b></h4>
                                            <button class="btn btn-sm btn-info btn-block" style="margin:20px;margin-top:20px">Upload</button>
                                        </div>
                                  </div>
                                 </div> -->  
                                 <div class="col-md-6">
                                    <img src="{{url('../')}}/images/{{Auth::user()->image}}" style="width:200%;margin-top: 17px;height: 54%;"><br>
                                       <h4 class="text-center col-sm-offset-5" ><b>Old Image</b></h4>
                                 </div>
                                 <div class="col-md-6">
                                   
                                 </div>
                               </div>
                                <!--  <div v-else>
                                  <div class="row">
                                     <div class="col-md-6">             
                                     <p><img v-if="user.image" :src="'{{url('../')}}/pics/' + user.image" class="post_upload_img"></p>
                                         <img src="{{url('../')}}/pics/down.jpg" style="width:64%;margin-top:17px;heigth:215px" class="img-thumbnail"> <br>
                                         <h4 class="text-center" style="margin-left: -131px;"><b>New Upload Image</b></h4>
                                    </div>                                         
                                    <div class="col-md-6">
                                         <p><img v-if="user.image" :src="'{{url('../')}}/pics/' + user.image" class="post_upload_img"></p>
                                         <img src="{{url('../')}}/pics/{{Auth::user()->image}}" style="width:74%;margin-top:17px;heigth:215px" class="img-thumbnail"> 
                                         <h4 class="text-center" style="margin-left: -131px;"><b>Old Image</b></h4>
                                    </div>
                                  </div>
                     </div>  -->          
                </div>
               <!--  <div class="modal-footer" style="background-color: white; ">
                 <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
               </div> -->
              </div>             
            </div>
        </div>
        <!--End Profile  Modal -->


    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
    <div class="sidebar sidebar-chat right sidebar-size-2 sidebar-offset-0 chat-skin-white" id='sidebar-chat'>
      <div class="split-vertical">
        <div class="chat-search">
          <input type="text" class="form-control" placeholder="Search" />
        </div>

        <ul class="chat-filter nav nav-pills " >
          <li class="active" style="cursor: pointer;"><a @click="allmsg()" data-target=".online" >All</a></li>
          <li><a href="#" data-target="">Online</a></li>
          <li><a href="#" data-target=".offline">Offline</a></li> 
        </ul>

   <div class="split-vertical-body">
          <div class="split-vertical-cell">
            <div data-scrollable>
              <ul class="chat-contacts">
                
                <li class="online" data-user-id="1"  v-for="frnd in myfriends">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <img  :src="'{{url('../')}}/images/'+frnd.image" width="40" class="img-circle" />
                      </div>
                      <div class="media-body">

                        <div class="contact-name">@{{frnd.firstname}}</div>
                        <small>@{{frnd.gender}}</small>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </div>


    <script id="chat-window-template" type="text/x-handlebars-template">


    </script>

    <div class="chat-window-container"></div>

    <!-- sidebar effects OUTSIDE of st-pusher: -->
    <!-- st-effect-1, st-effect-2, st-effect-4, st-effect-5, st-effect-9, st-effect-10, st-effect-11, st-effect-12, st-effect-13 -->

    <!-- content push wrapper -->
    <div class="st-pusher" id="content">

      <!-- sidebar effects INSIDE of st-pusher: -->
      <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

      <!-- this is the wrapper for the content -->
      <div class="st-content">
        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">
              <nav class="navbar navbar-subnav navbar-static-top margin-bottom-none" role="navigation" style="min-height: 45px;">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subnav">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="fa fa-ellipsis-h"></span>
                </button>
              </div>
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
        
           @yield('content') 

          </div>

        </div>
        <!-- /st-content-inner -->

      </div>
      <!-- /st-content -->

    </div>
  </div>

 <!-- Footer -->
    <footer class="footer">
      <strong>ThemeKit</strong> v4.0.0 &copy; Copyright 2015
    </footer>
    <!-- // Footer -->

  </div>
  <!-- /st-container -->

  <!-- Inline Script for colors and config objects; used by various external scripts; -->
 
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
      theme: "social-2",
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

  <!-- Vendor Scripts Bundle
    Includes all of the 3rd party JavaScript libraries above.
    The bundle was generated using modern frontend development tools that are provided with the package
    To learn more about the development process, please refer to the documentation.
    Do not use it simultaneously with the separate bundles above. -->

    <!-- Scripts -->
  <script src="{{ asset('web/js/vendor/all.js') }}"></script> 

  <!-- Vendor Scripts Standalone Libraries -->
  <!-- <script src="js/vendor/core/all.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.js"></script> -->
  <!-- <script src="js/vendor/core/bootstrap.js"></script> -->
  <!-- <script src="js/vendor/core/breakpoints.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.nicescroll.js"></script> -->
  <!-- <script src="js/vendor/core/isotope.pkgd.js"></script> -->
  <!-- <script src="js/vendor/core/packery-mode.pkgd.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.grid-a-licious.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.cookie.js"></script> -->
  <!-- <script src="js/vendor/core/jquery-ui.custom.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.hotkeys.js"></script> -->
  <!-- <script src="js/vendor/core/handlebars.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.hotkeys.js"></script> -->
  <!-- <script src="js/vendor/core/load_image.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.debouncedresize.js"></script> -->
  <!-- <script src="js/vendor/tables/all.js"></script> -->
  <!-- <script src="js/vendor/forms/all.js"></script> -->
  <!-- <script src="js/vendor/media/all.js"></script> -->
  <!-- <script src="js/vendor/player/all.js"></script> -->
  <!-- <script src="js/vendor/charts/all.js"></script> -->
  <!-- <script src="js/vendor/charts/flot/all.js"></script> -->
  <!-- <script src="js/vendor/charts/easy-pie/jquery.easypiechart.js"></script> -->
  <!-- <script src="js/vendor/charts/morris/all.js"></script> -->
  <!-- <script src="js/vendor/charts/sparkline/all.js"></script> -->
  <!-- <script src="js/vendor/maps/vector/all.js"></script> -->
  <!-- <script src="js/vendor/tree/jquery.fancytree-all.js"></script> -->
  <!-- <script src="js/vendor/nestable/jquery.nestable.js"></script> -->
  <!-- <script src="js/vendor/angular/all.js"></script> -->

  <!-- App Scripts Bundle<script src="{{ asset('web/js/app/app.js') }}"></script>
    Includes Custom Application JavaScript used for the current theme/module;
    Do not use it simultaneously with the standalone modules below. -->
    
  <!-- App Scripts Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL the modules are 100% compatible -->

  <!-- <script src="js/app/essentials.js"></script> -->
  <!-- <script src="js/app/layout.js"></script> -->
  <!-- <script src="js/app/sidebar.js"></script> -->
  <!-- <script src="js/app/media.js"></script> -->
  <!-- <script src="js/app/player.js"></script> -->
  <!-- <script src="js/app/timeline.js"></script> -->
  <!-- <script src="js/app/chat.js"></script> -->
  <!-- <script src="js/app/maps.js"></script> -->
  <!-- <script src="js/app/charts/all.js"></script> -->
  <!-- <script src="js/app/charts/flot.js"></script> -->
  <!-- <script src="js/app/charts/easy-pie.js"></script> -->
  <!-- <script src="js/app/charts/morris.js"></script> -->
  <!-- <script src="js/app/charts/sparkline.js"></script> -->

  <!-- App Scripts CORE [social-2]:
        Includes the custom JavaScript for this theme/module;
        The file has to be loaded in addition to the UI modules above;
        app.js already includes main.js so this should be loaded
        ONLY when using the standalone modules; -->
  <!-- <script src="js/app/main.js"></script> -->
    <script src="{{ asset('web/js/app/app1.js') }}"></script>
      <!-- toastr notifications -->
    {{-- <script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> --}}
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.min.js"></script>
 <script src="{{ asset('js/app.js') }}"></script>
 <!--<script src="{{ asset('web/js/app/app1.js') }}"></script>  -->
  <script type="text/javascript">
   $(document).ready(function(){
     $('#hide_comment').on('click',function(){
        $('#hide_div').hide();
       // alert('sdfgd');
     });

     $('#user_section').on('click',function(){
       $('#user_profile').toggle();
     })

     $('#unread').on('click',function(){
        $('#notification').toggle();
     })

       $("#logout").on('click',function(e) {
          e.preventDefault();
         var url = $('#baseUrl').val();
         
         $.ajax({
          type:'POST',
          url:url,

         });
      });

      $('#allmsg').on('click',function(){
          var url = '{{url("newMessage")}}';

          $.ajax({
           type: 'GET',
           url : url,

           success:function(response){
            // console.log(response.data);
             $(".friends").append(response);
           }
          });
      }) 
   });

  </script>


</body>

</html>



