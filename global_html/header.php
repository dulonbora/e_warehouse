


<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Excise Portal e-Payment Portal </title>
        <meta name="HandheldFriendly" content="true">
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="../css/app.v1.css" type="text/css"  />
        <link rel="stylesheet" href="" type="text/css"  />
</head>
<body>


      <?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
//$_SESSION['user'] = 1;
if( isset($_SESSION['user']) ) {header("Location: licenseeblock.php");exit;}
include '../classes/users.php';
$users = new users();
$users->loadValueWithSession($_SESSION['user']);
?>


    


<div class="navbar navbar-inverse" role="navigation">
	  <div class="header-top hidden-xs">
	    <div class="container">
                <div class="row">
                <div class="col-lg-4">
                    <table class='table-responsive'>
		<tr>
                    <td><img style="margin: 10px;" src='assets/images/GOA.png' width='60' height='70'/></td>
                    <td style="color: white;">
                        <b>COMMISSIONERATE OF EXCISE</b><br/>
                        <b>GOVERNMENT OF ASSAM</b></td>
		</tr>
		</table>
                    </div>
                


                    <div class="col-lg-8">
                        <?php
                        if ($users->getAdmin() == "Y") { ?>
                            <table class='table-responsive' style="margin: 20px;">
                                <tr>
                                    <td style="color: white; margin: 10px;"><b> UserId : <?php echo $users->getUserId(); ?> </b><br/>
                                        <b> Designation : <?php echo $users->returnDesignation($users->getDesignation()); ?> </b></td>

                                    <td style="color: white; margin: 10px;">
                                        <b> | Officer Name: : <?php echo $users->getUserName(); ?> </b><br/>
                                        <b> | District : <?php echo $users->getDist(); ?> </b></td>

                                    <td style="color: white; margin: 10px;">
                                        <b> | Email : <?php echo $users->getUserEmail(); ?> </b><br/>
                                        <b> | Phone No : <?php echo $users->getUserMobile(); ?> </b></td>
                                </tr>
                            </table>
                        <?php } else {
                            ?>
                            <table class='table-responsive' style="margin: 20px;">
                                <tr>
                                    <td style="color: white; margin: 10px;"><b> UserId : <?php echo $users->getUserId(); ?> </b><br/>
                                        <b> Role : <?php echo $users->returnRoleStr($users->getRole()); ?> </b></td>

                                    <td style="color: white; margin: 10px;">
                                        <b> | Proprietor/Director : <?php echo $users->getUserName(); ?> </b><br/>
                                        <b> | District : <?php echo $users->getDist(); ?> </b></td>

                                    <td style="color: white; margin: 10px;">
                                        <b> | Email : <?php echo $users->getUserEmail(); ?> </b><br/>
                                        <b> | Phone No : <?php echo $users->getUserMobile(); ?> </b></td>
                                </tr>
                            </table>
<?php } ?>



                
                </div>
                    
                    
                    
                </div>
                
                
	    </div>
	  </div>
    

    
    <div id="page-content-wrapper" style="background: black;">
        <span class="pull-left visible-xs" style="font-size: 18px; margin-top: 10px; margin-left: 15px; color: whitesmoke;"><b>EXCISE ONLINE</b></span>
        <button type="button" class="navbar-toggle visible-xs" onclick="openNav()">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        
	  <div class="container hidden-xs">
        <div class="navbar-header">
          
            <a class="navbar-brand" href="#"> EXCISE ONLINE</a>
            <button type="button" class="" onclick="openNav()">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
                  <?php if($users->getAdmin()=="Y"){ ?>
              <li class="active"><a href="adminblock.php"><span class="glyphicon glyphicon-info-sign"></span> HOME</a></li>
                  <?php }  else { ?>
              <li class="active"><a href="licenseeblock.php"><span class="glyphicon glyphicon-info-sign"></span> HOME</a></li>
            <li><a href="paymenthistory.php"><span class="glyphicon glyphicon-info-sign"></span> Payments</a></li>
            <li><a href="permit_list.php"><span class="glyphicon glyphicon-info-sign"></span> Permit Status</a></li>
            <li><a href="update_old_license_no.php"><span class="glyphicon glyphicon-info-sign"></span> License Status</a></li>
                              <?php }?>
          </ul>
        </div>
      </div>
      </div>
    
    </div>

