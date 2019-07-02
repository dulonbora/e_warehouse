<header class="bg-info lter header header-md navbar navbar-fixed-top-xs"> 
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
             
            <li class="dropdown"> 
                <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
                    <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm"> <img src="'.$_SESSION["COMPANY_LOGO"].'" alt="...">
                    </span></a> <ul class="dropdown-menu animated fadeInRight">
                    <li> <span class="arrow top"></span> <a href="#">Settings</a> </li> 
                    <li> <a href="home/company.php">Profile</a> </li> 
                    <li> <a href="">Help</a> </li> 
                    <li class="divider"></li> <li> 
                        <a href="" data-toggle="ajaxModal">Logout</a>
                    </li> </ul> </li> </ul> </div>

</header>