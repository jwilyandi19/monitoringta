<div class="navbar navbar-inverse navbar-fixed-top" style="background-color: #24292e;">
    <div class="container">
        <div class="navbar-header">
            <a href="{{url('/')}}" class="navbar-brand web-logo" > SistemInformasi<strong>TA</strong></a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right">

                <li><a href="#"><i class="glyphicon glyphicon-search"></i> Pencarian TA </a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-education"></i> Mahasiswa </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/bimbingan')}}"><i class="glyphicon glyphicon-user"></i> Bimbingan</a></li>
                        <li><a href="{{url('/mahasiswauji')}}"><i class="glyphicon glyphicon-inbox"></i> Uji</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-blackboard"></i> Seminar TA </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/ketersediaanseminar')}}"><i class="glyphicon glyphicon-calendar"></i> Ketersediaan Seminar</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-book"></i> Sidang TA </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/ketersediaanujian')}}"><i class="glyphicon glyphicon-calendar"></i> Ketersediaan Sidang</a></li>
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