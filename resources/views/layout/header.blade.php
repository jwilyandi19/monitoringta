<div class="navbar navbar-inverse navbar-fixed-top" style="background-color: #24292e; border : none">
    <div class="container">
        <div class="navbar-header">
            <a href="{{url('/home')}}" class="navbar-brand" style ="color: #ffffff; font-size: 20px;">SistemInformasi<strong>TA</strong></a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" style ="color: #ffffff"> Tugas Akhir</a></li>
                <li><a href="#" style ="color: #ffffff"> Seminar TA</a></li>
                <li><a href="#" style ="color: #ffffff"> Sidang TA</a></li>
                <li><button href="#" class="btn btn-primary" style ="color: #ffffff; padding-top: 10px; padding-bottom: 10px; margin-top: 10px; margin-left: 50px;" data-toggle="modal" data-target="#loginModal"> Login</button></li>
            </ul>
        </div>
    </div>
</div>
<div class="modal fade" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body form">
                        <div class="form-group row">
                            <label class="control-label" for="focusedInput">Username</label>
                            <input class="form-control" type="text" name="username">
                        </div>
                        <div class="form-group row">
                            <label class="control-label" for="focusedInput">Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>    
            </form>
        </div>
    </div>
</div>  