<header class="bg-primary lter header header-md navbar navbar-fixed-top-xs"> 
    <div class="navbar-header aside bg-success dk"> 
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> 
            <i class="icon-list"></i> </a> 
        <a href="/" class="navbar-brand text-lt"> 
            <img src="images/logo.png" alt="." class="hide"> 
            <span class="hidden-nav-xs m-l-sm">'.$tittle.'</span> </a> 
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> 
            <i class="icon-settings"></i> </a> </div>
    <ul class="nav navbar-nav hidden-xs"> 
        <li> 
            <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted active"> 
                <i class="fa fa-indent text"></i>
                <i class="fa fa-dedent text-active"></i> </a> </li> 



    </ul> 
    <div class="navbar-right"> 
        <ul class="nav navbar-nav m-n hidden-xs nav-user user"> 
            <li class="hidden-xs"> 
                <a href="#" class="dropdown-toggle lt" data-toggle="dropdown"> <i class="icon-bell"></i> 
                    <span class="badge badge-sm up bg-danger count" style="display: inline-block;">3</span> </a> 
                <section class="dropdown-menu aside-xl animated fadeInUp"> 
                    <section class="panel bg-white"> <div class="panel-heading b-light bg-light"> 
                            <strong>You have <span class="count" style="display: inline;">3</span> notifications</strong>
                        </div>
                        <div class="list-group list-group-alt">
                            <a href="#" class="media list-group-item" style="display: block;"><span class="pull-left thumb-sm text-center">
                                    <i class="fa fa-envelope-o fa-2x text-success">
                                    </i></span>
                                <span class="media-body block m-b-none">Sophi sent you a email<br>
                                    <small class="text-muted">1 minutes ago</small></span></a>
                            <a href="#" class="media list-group-item"> <span class="pull-left thumb-sm"> 
                                    <img src="images/a0.png" alt="..." class="img-circle"> </span>
                                <span class="media-body block m-b-none"> Use awesome animate.css<br>
                                    <small class="text-muted">10 minutes ago</small> </span> </a>
                            <a href="#" class="media list-group-item"> <span class="media-body block m-b-none"> 1.0 initial released<br>
                                    <small class="text-muted">1 hour ago</small> </span> </a> </div> <div class="panel-footer text-sm">
                            <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                            <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a> </div> </section>
                </section> </li> 
            <li class="dropdown"> 
                <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
                    <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm"> <img src="'.$_SESSION["COMPANY_LOGO"].'" alt="...">
                    </span></a> <ul class="dropdown-menu animated fadeInRight">
                    <li> <span class="arrow top"></span> <a href="#">Settings</a> </li> 
                    <li> <a href="profile.html">Profile</a> </li> 
                    <li> <a href="docs.html">Help</a> </li> 
                    <li class="divider"></li> <li> 
                        <a href="modal.lockme.html" data-toggle="ajaxModal">Logout</a>
                    </li> </ul> </li> </ul> </div>

</header>