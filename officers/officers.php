
<?php
error_reporting(E_ALL);
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Company.php';

$menu           = new Menu();
$UI             = new UI();
$N              = new NavBar();
$company        = new Company();


$company->LoadValue($company->Check_If_Exists($_SESSION['excise_user_id']));


?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work("COMPANY"); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php
                 echo $N->officers();
                ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="container-fluid">

                                <div class="row">

                                    <div class="col-lg-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading">Profile Details<button id="CompanySetUp" class="btn btn-danger btn-xs btn-rounded pull-right">Setup Your Pofile</button>
                                            </header>     
                                            
                                            
                                            <section class="panel panel-default">
                                                <header class="panel-heading bg-light no-border">
                                                    <div class="clearfix">
                                                        <a href="#" class="pull-left thumb-md avatar b-3x m-r">
                                                            <img src="../images/<?php echo $company->getCompany_logo();?>" alt="...">
                                                        </a> <div class="clear">
                                                            <div class="h3 m-t-xs m-b-xs">
                                                                <?php echo $company->getCompany_name();?>
                                                            </div>
                                                            <small class="text-muted text-success">
                                                                <?php echo $company->GenCompanyType($company->getCompany_type());?> (<?php echo $company->GenerateAction_Officers($company->getStatus());?>)</small>
                                                        </div>
                                                    </div>
                                                </header>
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item active">
                                                        ADDRESS
                                                    </a>
                                                    
                                                </div> 
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        ADDRESS : <?php echo $company->getAddress();?>
                                                    </a>
                                                    
                                                </div> 
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        CITY : <?php echo $company->getCity();?>
                                                    </a>
                                                </div> 
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        DISTRICT : <?php echo $company->getDistrict();?>
                                                    </a>
                                                </div> 
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        SUB DIVISION : <?php echo $company->getSub_division();?>
                                                    </a>
                                                </div> 
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        STATE : <?php echo $company->getState();?>
                                                    </a>
                                                </div> 
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        ZIP : <?php echo $company->getZip();?>
                                                    </a>
                                                </div>
                                                
                                                
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item active">
                                                        Contact Info 
                                                    </a>
                                                </div>
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        EMAIL : <?php echo $company->getEmail();?>
                                                    </a>
                                                </div>
                                                
                                                <div class="list-group no-radius alt">
                                                    <a class="list-group-item">
                                                        PHONE No : <?php echo $company->getPhone_no();?>
                                                    </a>
                                                </div>
                                                
                                                
                                                
                                                
                                            </section>


                                            
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div id="myModalBig" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div id="statusresult">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </section>
                </section>
            </section>
            <aside class="aside-lg bg-light b-r" id="addmenuview"> 
            </aside>
        </section>
    </section>
    <!-- Javascript -->
<script type="text/javascript">
<?php
  echo "var userId = '{$userId}';";
?>
</script>
<script src="officer.js"></script>
<script src="index_brand_manager.js"></script>
<script src="../js/global.js"></script>
</body>

</html>