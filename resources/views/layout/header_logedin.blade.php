<div class="navbar navbar-inverse navbar-fixed-top" style="background-color: #24292e;">
    <div class="container">
        <div class="navbar-header">
            <a href="{{url('/home')}}" class="navbar-brand web-logo" > SistemInformasi<strong>TA</strong></a>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right">
                
                <li class="dropdown" style="list-style: none;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Tugas Akhir <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/home">Coba1</a></li>
                        <li><a href="/home">Coba2</a></li>
                    </ul>
                </li>
                <li><a href="#"> Seminar TA</a></li>
                
                <li><a href="#" id="sidang-ta" > Sidang TA <span class="caret"></span></a></li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{session('user')['nama']}} <b class="caret"></b></a>
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