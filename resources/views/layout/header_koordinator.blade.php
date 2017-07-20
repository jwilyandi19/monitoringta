<div class="navbar navbar-inverse navbar-fixed-top" style="background-color: #24292e;">
    <div class="container">
        <div class="navbar-header">
            <a href="{{url('home')}}" class="navbar-brand web-logo" > SistemInformasi<strong>TA</strong></a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-education"></i> Manage User </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/user/create')}}"><i class="glyphicon glyphicon-user"></i> Buat User</a></li>
                        <li><a href="{{url('/user')}}"><i class="glyphicon glyphicon-user"></i> Lihat User</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> {{session('user')['username']}} </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('gantipassword')}}"><i class=" glyphicon glyphicon-cog"></i> Ganti Password</a></li>
                        <li><a href="{{url('logout')}}"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>