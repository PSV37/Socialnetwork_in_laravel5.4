@extends('layouts.app')

@section('content')

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="subnav" >
                <ul class="nav navbar-nav ">
                  <li><a href="user-private-timeline.html"><i class="fa fa-fw icon-ship-wheel"></i> My Timeline</a></li>
                </ul>
                <ul class="nav navbar-nav  navbar-right ">
                  <li><a href="login.html"> Logout<i class="fa fa-fw fa-sign-out"></i></a></li>
                </ul>
              </div>
              <!-- /.navbar-collapse -->

            </div>
          </nav>

          <div class="container-fluid" >
            <div class="tabbable">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-fw fa-picture-o"></i> Photos</a></li>
                <li class=""><a href="#profile" data-toggle="tab"><i class="fa fa-fw fa-folder"></i> Albums</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade active in" id="home">
                  <img src="{{url('../')}}/pics/{{Auth::user()->image}}" alt="image" style="height: 73px;width: 94px;cursor: pointer;" />
                 <!--  <img src="images/place2.jpg" alt="image" />
                 <img src="images/food1.jpg" alt="image" /> -->
                </div>
                  <div class="tab-pane fade" id="profile">
                    <p>{{Auth::user()->profile->about}}</p>
                  </div>           
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading panel-heading-gray">
                    <a class="btn btn-white btn-xs pull-right" data-toggle="modal" data-target="#edit_user_myModal"><i class="fa fa-pencil"></i></a>
                    <i class="fa fa-fw fa-info-circle"></i> About
                  </div>
                  <div class="panel-body">
                    <ul class="list-unstyled profile-about margin-none">
                      <li class="padding-v-5">
                        <div class="row">
                          <div class="col-sm-4"><span class="text-muted">Date of Birth</span></div>
                          <div class="col-sm-8">{{Auth::user()->profile->dateofbirth}}</div>
                        </div>
                      </li>
                      <li class="padding-v-5">
                        <div class="row">
                          <div class="col-sm-4"><span class="text-muted">Job</span></div>
                          <div class="col-sm-8">-</div>
                        </div>
                      </li>
                      <li class="padding-v-5">
                        <div class="row">
                          <div class="col-sm-4"><span class="text-muted">Gender</span></div>
                          <div class="col-sm-8">{{Auth::user()->gender}}</div>
                        </div>
                      </li>
                      <li class="padding-v-5">
                        <div class="row">
                          <div class="col-sm-4"><span class="text-muted">HomeTown</span></div>
                          <div class="col-sm-8">{{Auth::user()->profile->city}}</div>
                        </div>
                      </li>
                      <li class="padding-v-5">
                        <div class="row">
                          <div class="col-sm-4"><span class="text-muted">Country</span></div>
                          <div class="col-sm-8">{{Auth::user()->profile->country}}</div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

          <div class="modal fade" id="edit_user_myModal" role="dialog" >
            <div class="modal-dialog  modal-lg">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header user_model">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit User Profile </h4>
                </div>
                <div class="modal-body ">
                  <div class="col-md-2">
                     <img src="{{url('../')}}/pics/{{Auth::user()->image}}" style="width:80%;margin-top:17px;heigth:80px" class="img-thumbnail"> 
                        <h4 class="text-center" ><b>User Profile</b></h4>
                  </div>
                   <div class="col-md-8">
                      <form class="form-horizontal" action="{{url('updateuser')}}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                          @if(session()->has('success'))
                            <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        ×</button>
                                  {{session()->get('success')}}
                                </div>
                          @endif
                       <input class="form-control" type="text"  name="city"  value="{{Auth::user()->profile->city}}"  autofocus><br>
                       
                        <input class="form-control" type="text"  name="country"  value="{{Auth::user()->profile->country}}"  ><br>
                         
                        <input class="form-control" type="text"  name="dateofbirth"  value="{{Auth::user()->profile->dateofbirth}}"  autofocus><br>                 

                         <textarea  cols="80" rows="5"  name="about">{{Auth::user()->profile->about}}</textarea> 
                                           
                       <button class="btn btn-primary">Update <i class="fa fa-fw fa-unlock-alt"></i></button>
                    </form>
                   </div>

                  <div class="col-md-2">
                    
                  </div>
                             
                </div>
                <div class="modal-footer" style="background-color: white; height: 41%;">
                  <button type="button" class="btn btn-info" data-dismiss="modal" style="margin-top: 41%;">Close</button>
                </div>
              </div>             
            </div>
        </div>

              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading panel-heading-gray">
                    <div class="pull-right">
                      <a href="#" class="btn btn-primary btn-xs">Add <i class="fa fa-plus"></i></a>
                    </div>
                    <i class="icon-user-1"></i> Friends
                  </div>
                  <div class="panel-body">
                    <ul class="img-grid">
                      <li>
                        <a href="#">
                          <img src="{{asset('web/images/people/110/guy-6.jpg')}}" alt="image" />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src="{{asset('web/images/people/110/woman-3.jpg')}}" alt="image" />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src="{{asset('web/images/people/110/guy-2.jpg')}}" alt="image" />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src="{{asset('web/images/people/110/guy-9.jpg')}}" alt="image" />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src="{{asset('web/images/people/110/woman-9.jpg')}}" alt="image" />
                        </a>
                      </li>
                      <li class="clearfix">
                        <a href="#">
                          <img src="{{asset('web/images/people/110/guy-4.jpg')}}" alt="image" />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src="{{asset('web/images/people/110/guy-1.jpg')}}" alt="image" />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src="{{asset('web/images/people/110/woman-4.jpg')}}" alt="image" />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src="{{asset('web/images/people/110/guy-6.jpg')}}" alt="image" />
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading panel-heading-gray">
                <i class="fa fa-bookmark"></i> Bookmarks
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <a href="#" class="h5 margin-none">Climb a Mountain</a>
                        <div class="text-muted">
                          <small><i class="fa fa-calendar"></i> 24/10/2014</small>
                        </div>
                      </div>
                      <a href="#">
                        <img src="{{asset('web/images/place1-full.jpg')}}" alt="image" class="img-responsive" />
                      </a>
                      <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor impedit ipsum laborum maiores tempore veritatis....</p>
                        <div>
                          <div class="pull-right">
                            <a href="#" class="btn btn-primary btn-xs">read</a>
                          </div>

                          <a href="#" class="text-muted"> <i class="fa fa-comments"></i> 6</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="panel panel-default">
                      <div class="panel-body text-center">
                        <a href="#" class="h5 margin-none">Vegetarian Pizza</a>
                        <p class="text-muted"><i class="fa fa-calendar"></i> 24/10/2014</p>
                        <span class="fa fa-star text-primary"></span>
                        <span class="fa fa-star text-primary"></span>
                        <span class="fa fa-star text-primary"></span>
                        <span class="fa fa-star text-primary"></span>
                        <span class="fa fa-star-o"></span>
                      </div>
                      <a href="#">
                        <img src="{{asset('web/images/food1-full.jpg')}}" alt="image" class="img-responsive" />
                      </a>
                      <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor impedit ipsum laborum maiores tempore veritatis....</p>
                        <div>
                          <div class="pull-right">
                            <a href="#" class="btn btn-primary btn-xs">read</a>
                          </div>
                          <a href="#" class="text-muted"> <i class="fa fa-comments"></i> 6</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="pull-right">
                          <a href="#" class="btn btn-success btn-xs"><i class="fa fa-check-circle"></i></a>
                        </div>
                        <a href="#" class="h5">Win a Holiday</a>
                        <div class="text-muted">
                          <small><i class="fa fa-calendar"></i> 24/10/2014</small>
                        </div>
                      </div>
                      <a href="#">
                        <img src="{{asset('web/images/place2-full.jpg')}}" alt="image" class="img-responsive" />
                      </a>
                      <ul class="icon-list icon-list-block">
                        <li><i class="fa fa-calendar fa-fw"></i> <a href="#">1 Week</a></li>
                        <li><i class="fa fa-users fa-fw"></i> <a href="#"> 2 People</a></li>
                        <li><i class="fa fa-map-marker fa-fw"></i> <a href="#">Miami, FL, USA</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

 @endsection
 <script src="{{ asset('js/app.js') }}"></script>