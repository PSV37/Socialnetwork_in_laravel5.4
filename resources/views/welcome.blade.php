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
                <li><a href="{{ route('login') }}"><b>Login</b></a></li>
                <li><a href="{{ route('register') }}"><b>Register</b></a></li>
            @else
                <li class="dropdown">
                    <a href="{{ url('/home') }}" style="font-size: 17px "><b>Dashboard  ( {{Auth::user()->name}} )</b></a>
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

        
@endsection