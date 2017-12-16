 @extends('layouts.app')

@section('content')
 <div class="container-fluid">

            <div class="media messages-container media-clearfix-xs-min media-grid">
              <div class="media-left">
                <div class="messages-list">
                  <div class="panel panel-default">
                    <ul class="list-group" v-for="message in messages">
                      <li class="list-group-item active" @click="msg(message.id)" >
                        <a href="#">
                          <div class="media" style="border-bottom: 1px dashed; margin-bottom: 3px; margin-top: 3px;">
                            <div class="media-left">
                              <img :src="'{{url('../')}}/images/'+message.image" width="50" alt="" class="media-object" />
                            </div>
                            <div class="media-body">
                              <span class="date">@{{message.created_at}}</span>
                              <span class="user">@{{message.firstname}}</span>
                              <div class="message">@{{message.gender}}</div>
                            </div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="media-body">
                <div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a class="btn btn-primary" href="#">
                        <i class="fa fa-envelope"></i> Send
                      </a>
                    </div>
                    <!-- /btn-group -->
                    <input type="text" class="form-control share-text" placeholder="Write message..."  v-model="msgFrom" @keydown="inputHandler" />
                  </div>
                  <!-- /input-group -->
                </div>
              <div v-for="msg in privatemsgs">
                 <!-- Display message from Auth::user to right--> 
                <div class="media " v-if="msg.user_from == <?php echo Auth::user()->id; ?>" style="margin-top: 16px;">             
                  <div class="media-body message">
                    <div class="panel panel-default " style="background-color: oldlace;color: black;">
                      <div class="panel-heading panel-heading-white" style="background-color: oldlace;">
                        <div class="pull-right" style="margin-top: 0px;">
                          <span class="text-muted" style="font-size: 19px;"><b>@{{msg.firstname}}</b></span>
                        </div>
                        <a href="#" style="margin-top: 0px;">@{{msg.created_at | myTime }}</a>
                      </div>
                      <div class="panel-body">
                         <span class="pull-right" style="font-size: 16px;">@{{msg.msg}}
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="media-left">
                    <a href="#">
                      <img :src="'{{url('../')}}/images/'+ msg.image" width="60" alt="woman" class="media-object img-circle"  style="height: 62px;margin-left: 11px;" />
                    </a>
                  </div> 
                </div>
                 <!-- End  Display message from Auth::user to right-->
             <!-- Display message from second friend to left-->
                <div class="media" v-else style=" margin-top: 14px;"> 
                 <div class="media-left">
                    <a href="#">
                      <img :src="'{{url('../')}}/images/'+ msg.image" width="60" alt="woman" class="media-object img-circle"  style="height: 62px;margin-left: 11px;" />
                    </a>
                  </div>            
                  <div class="media-body message">
                    <div class="panel panel-default" style="background-color: gainsboro;">
                      <div class="panel-heading panel-heading-white" style="background-color: gainsboro;">
                        <div class="pull-left" style="margin-top: -8px;">
                          <span class="text-muted" style="font-size: 19px;"><b>@{{msg.firstname}}</b></span>
                        </div>
                        <a href="#" class="pull-right" style="margin-top: -8px;">@{{msg.created_at | myTime }}</a>
                      </div>
                      <div class="panel-body">
                         <span class="pull-left" style="font-size: 16px;">@{{msg.msg}}
                        </span>
                      </div>
                    </div>
                  </div>                 
                </div>
               <!--End Display message from second friend to left-->  
              </div>
              </div>
            </div>

          </div>
@endsection