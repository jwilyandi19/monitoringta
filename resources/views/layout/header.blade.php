<div class="navbar navbar-inverse navbar-fixed-top" style="background-color: #24292e;">
    <div class="container">
        <div class="navbar-header">
            <a href="{{url('/home')}}" class="navbar-brand web-logo" > SistemInformasi<strong>TA</strong></a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="glyphicon glyphicon-search"></i> Pencarian TA </a></li>
                <li><a href="#"><i class="glyphicon glyphicon-blackboard"></i> Seminar TA </a></li>
                <li><a href="#"><i class="glyphicon glyphicon-book"></i> Sidang TA </a></li>
                <li><button href="#" class="btn btn-primary white-font login-button" data-toggle="modal" data-target="#loginModal"><i class="glyphicon glyphicon-log-in"></i> Login</button></li>
            </ul>
        </div>
    </div>
</div>
<div class="modal fade" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #24292e; padding-left: 20px;">
                <h4 class="modal-title" style="color: #ffffff;"> Login</h4>
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