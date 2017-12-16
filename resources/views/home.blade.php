@extends('layouts.app')

@section('content')
  <div class="container-fluid">              
           <div class="cover overlay cover-image-full height-300-lg">
            <img src="{{url('../')}}/coverpics/{{Auth::user()->coverpic}}" alt="cover" class="cover_img"  style="width: 1891px;    height: 123%;"/>
            <div class="overlay overlay-full">
              <div class="v-top">
                   <i class="fa fa-pencil pencil_div" data-toggle="modal" data-target="#cover_myModal"></i>                
                <!-- <input type="file" @change="onfilechange" style="position:absolute;left: 0;top: 0; opacity: 0" />  -->
              </div>
            </div>
         </div>
          <!--  <marquee direction="left"><img src="{{asset('images/animate.gif')}}"> </marquee> -->
 
    <!-- Upload Cover Picture Model  -->
         <div class="modal fade" id="cover_myModal" role="dialog">
              <div class="modal-dialog  modal-lg">
                <!-- Modal content-->
                  <div class="modal-content" style="height: 75%">
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
                                   <button type="submit" class="btn btn-success">Upload</button>
                                 </div>          
                              </div>
                           </form> 
                          <hr>
                          <div >
                             <div class="col-md-12">
                              <img src="{{url('../')}}/coverpics/{{Auth::user()->coverpic}}" alt="cover"   style="width:100%;margin-top: 17px;height: 54%;"/>
                        
                                   <h4 class="text-center" style="margin-left: -131px;"><b>Old Image</b></h4>
                             </div>
                          </div>                                     
                      </div>
                      <!-- <div class="modal-footer" style="background-color: white; height: 55px;">
                          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                      </div> -->
                  </div>             
              </div>
        </div>
        <!--End Profile  Modal -->
 <!--End  Upload Cover Picture Model  -->



   <div class="timeline row" data-toggle="isotope">      
              <div class="col-xs-12 col-md-6 col-lg-3 item">
                <div class="timeline-block">
                  <div class="panel panel-default relative">
                    <img src="{{asset('web/images/place2-full.jpg')}}" alt="place" class="img-responsive">
                    <div class="panel-body panel-boxed text-center">
                      <div class="rating">
                        <span class="star"></span>
                        <span class="star filled"></span>
                        <span class="star filled"></span>
                        <span class="star filled"></span>
                        <span class="star filled"></span>
                      </div>
                    </div>
                    <div class="panel-body">
                      <img src="{{asset('web/images/people/50/guy-2.jpg')}}" alt="people" class="img-circle" />
                      <img src="{{asset('web/images/people/50/woman-2.jpg')}}" alt="people" class="img-circle" />
                      <img src="{{asset('web/images/people/50/guy-3.jpg')}}" alt="people" class="img-circle" />
                      <img src="{{asset('web/images/people/50/woman-3.jpg')}}" alt="people" class="img-circle" />
                      <a href="#" class="user-count-circle">12+</a>
                    </div>
                  </div>

                </div>
              </div>
                <div class="col-xs-12 col-md-6 col-lg-6 item">
                <div class="timeline-block">
                  <div class="panel panel-default share clearfix-xs">
                    <div class="panel-heading panel-heading-gray title" style=" padding: 0px;">
                     <!--  What&acute;s new -->  <img src="{{url('../')}}/images/{{Auth::user()->image}}"
                   style="width:56px; margin:5px; padding:5px" class="img-circle">@{{post}}
                    </div>
                    <div class="panel-body">
                        <div v-if="!image">
                              <form method="post" enctype="multipart/form-data" v-on:submit.prevent="addpost">  
                                    <textarea v-model="content" name="status" class="form-control share-text" placeholder="What's On Your Mind.dfdf.."></textarea>
                                    <button type="submit" class="btn btn-sm btn-info pull-right" style="margin:10px" id="postBtn">Post</button>                                             
                              </form>
                       </div> 
                       <div v-else>
                            <div class="upload_remove_img">
                               <textarea v-model="content" name="status" class="form-control share-text" placeholder="What's On Your Mind..." cols="100"></textarea><br><br>
                                <b @click="removeImg" class="remove_img">X</b>  
                                 <img :src="image" style="width: 108px; height:81px; margin-top:-26px;"/>                         
                            </div>
                              <button @click="uploadImg" class="btn btn-sm btn-info pull-right" style="margin:10px">Post</button> 
                       </div>
                      <!-- <textarea name="status" class="form-control share-text" placeholder="What's On Your Mind..."></textarea> -->
                    </div>
                    <div class="panel-footer share-buttons">
                      <a href="#"><i class="fa fa-map-marker"></i></a>
                      <div style="position: relative;display: inline-block;">
                         <div style="cursor: pointer;">     
                            <a><i class="fa fa-photo" style="font-size: 19px;"></i></a>
                            <input type="file" @change="onfilechange" style="position:absolute;left: 0;top: 0; opacity: 0" /> 
                         </div>
                      </div>
                      <a href="#"><i class="fa fa-video-camera"></i></a>
                    </div>
                  </div>
                </div>
              </div>
             
         

              <div class="col-xs-12 col-md-6 col-lg-6 item" style="margin-top: 2%;" >
                <div class="timeline-block" v-for="post,key in posts">
                   <vue-toast ref='toast'></vue-toast>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="media">
                        <div class="media-left">
                          <a href="">
                         <img :src="'{{url('../')}}/images/'+post.user.image"  class="media-object" style=" height: 50px; width: 68px;"> 
                          </a>
                        </div>
                        <div class="media-body">
                         <div  v-if="post.user_id == '{{Auth::user()->id}}'" style="cursor: pointer;">
                           <span @click="deletepost(post.id)" class="pull-right">Delete</span>                           
                         </div>
                          <a href="">@{{post.user.firstname}}</a>
                          <span>@{{post.created_at | myTime }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body text-muted">
                      <i class="fa fa-map-marker"></i> Was in <a href="#">Brooklyn, New York</a>
                    </div>
                    <div class="relative height-300" style="height: 373px !important;">
                      <div data-toggle="google-maps" class="maps-google-fs" data-center="40.776928,-73.910330" data-zoom="12" data-style="paper">
                        <span>@{{post.content}}</span><br>
                         <img v-if="post.postImage" :src="'{{url('../')}}/postImages/'+post.postImage" heigth="50px"  alt="" title="" class="img-thumbnail post_img">
                      </div>
                    </div>
                    
                      <div class="view-all-comments">
                         <!-- Likes Section -->
                            <span v-if="post.like.length!=0" @click="LikePost(post.id)" >
                              <span v-if="post.user_id == '{{Auth::user()->id}}'" >
                                <b style="cursor:pointer;color:#26a69a"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Your Like</b>
                                <b style="color: black"> @{{post.like.length}}</b></b>
                              </span>
                          <span v-else style="cursor: pointer;">
                               <b class="text-info">Likes </b> <b style="color: black"> @{{post.like.length}}</b></b>
                            </span>
                            </span>
                            <span v-else  @click="LikePost(post.id)">
                                 <b style="cursor:pointer;color:black"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Like</b>
                            </span>
                         <!-- End Likes Section --> 

                        <a href="#">
                          <i class="fa fa-comments-o"></i> View all
                        </a>
                        <a  @click="commentSeen=!commentSeen" class="pull-right" style="cursor: pointer;">@{{post.comment.length}} Comments</a>
                      </div>
                    <ul class="comments" id="myList">
                      <li class="media"  v-for="comment in post.comment">
                        <div class="media-left">
                          <a href="">

                              <img v-if="post.user.image" :src="'{{url('../')}}/images/'+post.user.image"   alt="" title="" style="width: 52px;height: 52px;">
                          
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="pull-right dropdown" data-show-hover="li">
                            <span data-toggle="dropdown" class="toggle-button">
                              <i class="fa fa-pencil"></i>
                            </span>
                            <div>
                                <span style="display:none"  >Show Comment</span>
                            </div>
                            <ul class="dropdown-menu" role="menu" >
                              <span  v-if="comment.user_id == '{{Auth::user()->id}}'">
                                   <li><a href="#">Edit</a></li>
                                   <li><a href="#"  @click="deletecomment(comment.id)" >Delete</a></li>
                              </span>
                              <span v-else>
                                 <li id="hide_comment"><span >Hide/Show</span></li>
                              </span>
                            </ul>
                          </div>
                          <div id="hide_div">
                          <a href="" class="comment-author pull-left">@{{post.user.firstname}}</a><br>
                          <span>@{{comment.comment}}</span>
                          <div class="comment-date">@{{comment.created_at | myTime }}</div>
                        </div>
                        </div>
                      </li>
                      <span class="btn btn-default" id="loadMore"> Load More....           
                      </span>
                       <span style="display:none"   id="showLess" style="display: none">showLess</span>
                   
                     
                      <p class="comment-form" >
                          <div class="input-group" v-if="commentSeen">
                              <span class="input-group-btn">
                                 <button class="btn btn-success" @click="sendComment(post,key)">Send</button>  
                              </span>
                              <input type="text"  v-model="commentadd[key]"  class="form-control">
                          </div>
                      </p>
                    </ul>
                  </div>
                </div>
              </div>

          <?php 
              $newfriends = DB::table('profiles as p')->join('users as u','u.id','=','p.user_id')
                                              ->where('u.id','!=',Auth::user()->id)
                                              ->get(); 
          ?>    

              <div class="col-xs-12 col-md-6 col-lg-3 item">
                <div class="timeline-block">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="media">
                       <!--  <div class="media-left">
                         <a href="">
                           <img src="{{ asset('web/images/people/50/guy-5.jpg') }}" class="media-object">
                         </a>
                       </div> -->
                        <div class="media-body">
                          <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                          <a href=""><h4><b>You Know This People</b></h4></a>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                      <marquee onmouseover="this.stop()" onmouseout="this.start()">
                       <div class="row">
                          @foreach($newfriends as $new)
                           <div class="col-md-4 col-sm-4">
                               <img src=" {{ url('images')}}/{{$new->image}}" alt="no image" title="{{$new->firstname}}" class="img-circle" style="height: 78px;" /><br>
                               <?php
                                    $check = DB::table('friendships')
                                                  ->where('requester',Auth::user()->id)
                                                  ->where('user_requested',$new->id)
                                                  ->where('status',0)
                                                  ->first();
                                       if($check == '')
                                       {
                                 ?>                     
                                       <p style="margin-top: 10px;margin-left: 0px;">
                                         <a class="btn btn-primary request">Add Friend
                                            <input type="hidden" class="add_id" value="{{$new->id}}">
                                            <input type="hidden" class="baseUrl" value="{{url('addFriend')}}">
                                          </a>
                                      </p>  
                                   <?php } else { ?>
                                         <a  class="btn btn-primary alreaysend"  style="margin-top: 10px;margin-left: 0px;">Requeste Send
                                          </a>
                                   <?php } ?>  
                           </div> 
                          @endforeach
                        </div>
                      </marquee>
                    </div>
                  </div>
                </div>
              </div> 


               <div class="col-xs-12 col-md-6 col-lg-3 item">
                <div class="timeline-block">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="media">
                        <div class="media-left">
                          <a href="">
                            <img src="{{ asset('web/images/people/50/guy-5.jpg') }}" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                          <a href="">Jonathan</a>
                          <span>on 15th January, 2014</span>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                      Amazing 3D Animation
                    </div>
                    <!-- 4:3 aspect ratio -->
                    <div class="embed-responsive embed-responsive-4by3">
                      <iframe class="embed-responsive-item" src="//player.vimeo.com/video/50522981?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"></iframe>
                    </div>
                    <div class="view-all-comments"><i class="fa fa-comments-o"></i> Be the first to comment</div>
                    <ul class="comments">
                      <li class="comment-form">
                        <div class="input-group">
                          <input type="text" class="form-control" />
                          <span class="input-group-btn">
                             <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                          </span>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div> 

           <!--    <div class="col-xs-12 col-md-6 col-lg-4 item">
             <div class="timeline-block">
               <div class="panel panel-default">
           
                 <div class="panel-heading">
                   <div class="media">
                     <div class="media-left">
                       <a href="">
                         <img src="{{asset('web/images/people/50/woman-5.jpg')}}" class="media-object">
                       </a>
                     </div>
                     <div class="media-body">
                       <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                       <a href="">Michelle</a>
                       <span>on 15th January, 2014</span>
                     </div>
                   </div>
                 </div>
                 <div class="panel-body">
                   <div class="boxed">
                     <a href="#" class="h4 margin-none">Vegetarian Pizza</a>
                     <div>
                       <span class="fa fa-star text-primary"></span>
                       <span class="fa fa-star text-primary"></span>
                       <span class="fa fa-star text-primary"></span>
                       <span class="fa fa-star text-primary"></span>
                       <span class="fa fa-star-o"></span>
                     </div>
                     <div class="media">
                       <div class="media-left">
                         <a href="#">
                           <img src="{{asset('web/images/food1.jpg')}}" alt="" width="80" class="media-object">
                         </a>
                       </div>
                       <div class="media-body">
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor impedit ipsum laborum maiores tempore veritatis....</p>
                       </div>
                     </div>
                     <ul class="icon-list">
                       <li><i class="fa fa-star fa-fw"></i> 4.8</li>
                       <li><i class="fa fa-clock-o fa-fw"></i> 20 min</li>
                       <li><i class="fa fa-graduation-cap fa-fw"></i> Beginner</li>
                     </ul>
                   </div>
                 </div>
                 <div class="view-all-comments">
                   <a href="#">
                     <i class="fa fa-comments-o"></i> View all
                   </a>
                   <span>10 comments</span>
                 </div>
                 <ul class="comments">
                     <li class="media">
                       <div class="media-left">
                         <a href="">
                           <img src="{{asset('web/images/people/50/guy-5.jp')}}g" class="media-object">
                         </a>
                       </div>
                       <div class="media-body">
                         <div class="pull-right dropdown" data-show-hover="li">
                           <a href="#" data-toggle="dropdown" class="toggle-button">
                             <i class="fa fa-pencil"></i>
                           </a>
                           <ul class="dropdown-menu" role="menu">
                             <li><a href="#">Edit</a></li>
                             <li><a href="#">Delete</a></li>
                           </ul>
                         </div>
                         <a href="" class="comment-author pull-left">Bill D.</a>
                         <span>Hi Mary, Nice Party</span>
                         <div class="comment-date">21st September</div>
                       </div>
                     </li>
                     <li class="media">
                       <div class="media-left">
                         <a href="">
                           <img src="{{asset('web/images/people/50/woman-5.jpg')}}" class="media-object">
                         </a>
                       </div>
                       <div class="media-body">
                         <div class="pull-right dropdown" data-show-hover="li">
                           <a href="#" data-toggle="dropdown" class="toggle-button">
                             <i class="fa fa-pencil"></i>
                           </a>
                           <ul class="dropdown-menu" role="menu">
                             <li><a href="#">Edit</a></li>
                             <li><a href="#">Delete</a></li>
                           </ul>
                         </div>
                         <a href="" class="comment-author pull-left">Mary</a>
                         <span>Thanks Bill</span>
                         <div class="comment-date">2 days</div>
                       </div>
                     </li>
                     <li class="media">
                       <div class="media-left">
                         <a href="">
                           <img src="{{asset('web/images/people/50/guy-5.jpg')}}" class="media-object">
                         </a>
                       </div>
                       <div class="media-body">
                         <div class="pull-right dropdown" data-show-hover="li">
                           <a href="#" data-toggle="dropdown" class="toggle-button">
                             <i class="fa fa-pencil"></i>
                           </a>
                           <ul class="dropdown-menu" role="menu">
                             <li><a href="#">Edit</a></li>
                             <li><a href="#">Delete</a></li>
                           </ul>
                         </div>
                         <a href="" class="comment-author pull-left">Bill D.</a>
                         <span>What time did it finish?</span>
                         <div class="comment-date">14 min</div>
                       </div>
                     </li>
                     <li class="comment-form">
                       <div class="input-group">
                         <span class="input-group-btn">
                            <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                         </span>
                         <input type="text" class="form-control" />
                       </div>
                     </li>
                 </ul>
               </div>
             </div>
           </div> -->
            </div>


@endsection
 <script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function () {
  /*  size_li = $("#myList li").size();
    x=3;
    $('#myList li:lt('+x+')').show();
    $('#loadMore').on('click',function(){
        x= (x+5 <= size_li) ? x+5 : size_li;
        $('#myList li:lt('+x+')').show();
    });
    $('#showLess').click(function () {
        x=(x-5<0) ? 3 : x-5;
        $('#myList li').not(':lt('+x+')').hide();
    });*/

      // Load the first 3 list items from another HTML file
    //$('#myList').load('externalList.html li:lt(3)');
  /*  $('#myList li:lt(3)').show();
    $('#loadMore').click(function () {
        $('#myList li:lt(10)').show();
    });
    $('#showLess').click(function () {
        $('#myList li').not(':lt(3)').hide();
    });*/


    $('.request').on('click',function(){
      var url = $('.baseUrl').val();
      var addFriend_id = $(this).find('.add_id').val();
       //alert(addFriend_id);
       $.ajax({
        type: 'GET',
        url : url,
        data : {'addFriend_id':addFriend_id},

           success:function(response){
               toastr.success('Accepted Friend Request!', 'Success Alert', {timeOut: 5000});
               //$('#user_uniq'+ response[1]).delay(1000).fadeOut();
                //alert('successfully');
                //$('.alreaysend').html(response)
               //console.log(response);
                location.reload();
           },
       });
     });
});
</script>

 <!-- $('#loadMore').click(function () {
        x= (x+5 <= size_li) ? x+5 : size_li;
        $('#myList li:lt('+x+')').show();
    }); -->