<?php
    //error_reporting(0);
    ob_start();

    include '../classes/Global_Functions.php';
    $Global_Functions = new Global_Functions();
    
    include '../classes/Company.php';
    $Company = new Company();
    if (session_status() == PHP_SESSION_NONE) {session_start();}
    
    $i                              = filter_input(INPUT_GET , 'i');
    
    $excise_users_id                = base64_decode($i);
    $_SESSION['excise_user_id']     = $excise_users_id;
    $id = $Company->Check_If_Exists($excise_users_id);
    if($id > 0){
        if($Company->LoadValue($id)==1){
            $_SESSION['id'] = $id;
        //    $Global_Functions->pageRedirect("../home/index.php");
        }
    }
    else {
      //  $Global_Functions->pageRedirect("../home/index.php");        
    }
    
    ?>


<!DOCTYPE html>
<html lang="en" class="app">
   <head>
      <meta charset="utf-8" />
      <title>Welcome To e-Warehouse</title>
      <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <link rel="stylesheet" href="../css/app.v1.css" type="text/css" />
   </head>
   <body class="bg-light dk">
      <section id="content">
         <div class="row m-n">
            <div class="col-sm-4 col-sm-offset-4">
               <div class="text-center m-b-lg">
                  <div class="h text-white animated fadeInDownBig">
                      <img style="margin-left: -20px;" src="../images/e-warehouse_logo.png" alt="logo" height="500" width="500">                
                  </div>
               </div>
               <div class="list-group auto m-b-sm m-b-lg"> 
                   <a href="../home/index.php" class="list-group-item"> <i class="fa fa-chevron-right icon-muted"></i> <i class="fa fa-fw fa-home icon-muted"></i> Goto e-Warehouse Homepage </a>
                   <a href="http://assamexcise.in/wp/online/index.php" class="list-group-item"> <i class="fa fa-chevron-right icon-muted"></i> <i class="fa fa-fw fa-question icon-muted"></i> Back To Excise Online </a>
               </div>
            </div>
         </div>
      </section>
      <!-- footer --> 
      <footer id="footer">
         <div class="text-center padder clearfix">
            <p> <small>Welcome to e-Warehouse<br>&copy; 2018</small> </p>
         </div>
      </footer>
      <!-- / footer --> <!-- Bootstrap --> <!-- App --> <script src="js/app.v1.js"></script> <script src="js/app.plugin.js"></script> <script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script> <script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script> <script type="text/javascript" src="js/jPlayer/demo.js"></script>
   </body>
</html>
    
    
