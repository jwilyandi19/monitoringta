<div class="navbar navbar-inverse navbar-fixed-top" style="background-color: #24292e;">
    <div class="container">
        <div class="navbar-header">
            <a href="{{url('/home')}}" class="navbar-brand web-logo" > SistemInformasi<strong>TA</strong></a>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right">
                
                <li><a href="#"><i class="glyphicon glyphicon-search"></i> Pencarian TA </a></li>
                <li><a href="/tugasakhir/create"><i class="glyphicon glyphicon-plus-sign"></i> Pengajuan TA </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-blackboard"></i> Seminar TA </a>
                    <ul class="dropdown-menu">
                        <li><a href=""><i class="glyphicon glyphicon-calendar"></i> Jadwal Seminar</a></li>
                        <li><a href=""><i class=""></i> Pengajuan Jadwal Seminar</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-book"></i> Sidang TA </a>
                    <ul class="dropdown-menu">
                        <li><a href=""><i class="glyphicon glyphicon-calendar"></i> Jadwal Sidang</a></li>
                        <li><a href=""><i class=""></i> Pengajuan Jadwal Sidang</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-folder-close"></i> Progres TA </a>
                    <ul class="dropdown-menu">
                        <li><a href="/statusta"><i class="glyphicon glyphicon-list"></i> Status TA</a></li>
                        <li><a href="/detailprogres"><i class="glyphicon glyphicon-list-alt"></i> Detail Progres TA</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> {{session('user')['username']}} </a>
                    <ul class="dropdown-menu">
                        <li><a href="/gantipassword"><i class=" glyphicon glyphicon-cog"></i> Ganti Password</a></li>
                        <li><a href="/logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                    </ul>
                </li>
            
            </ul>
        </div>
    </div>
</div>
<div class="modal fade" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #24292e; padding-left: 20px;">
                <h4 class="modal-title" style="color: #ffffff;">Login</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{url('/login')}}">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Username</label>
                        <div class="col-md-10">
                            <input type="text" name="username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Password</label>
                        <div class="col-md-10">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-primary pull-right" style="margin : 0 15px;">Login</button>
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>