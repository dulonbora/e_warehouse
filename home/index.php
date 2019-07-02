
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Company.php';
include '../classes/Global_Functions.php';

$menu = new Menu();
$UI = new UI();
$N = new NavBar();
$company = new Company();
$Global_Functions = new Global_Functions();


if ($company->Check_If_Exists($_SESSION['excise_user_id']) == 0) {
    $Global_Functions->pageRedirect("company.php");
}


$company->LoadValue($company->Check_If_Exists($_SESSION['excise_user_id']));
$company->LoadToSession($company->getId());


if ($company->getRole() == "O") {
    if ($company->getCompany_type() == "A") {
        if ($company->getStatus() == 5) {
            
        } else {
            $Global_Functions->pageRedirect("../officers/officers.php");
        }
    }
    if ($company->getCompany_type() == "SE") {
        if ($company->getStatus() == 5) {
            $Global_Functions->pageRedirect("../home/home_officers.php");
        } else {
            
        }
    }
}

if ($company->getRole() == "U") {

    if ($company->getCompany_type() == "WHS") {
        if ($company->getStatus() == 5) {
            $Global_Functions->pageRedirect("wholesaler.php");
        } else {
            $Global_Functions->pageRedirect("company.php");
        }
    }


    if ($company->getCompany_type() == "DIS") {
        if ($company->getStatus() == 5) {
            $Global_Functions->pageRedirect("distillery.php");
        } else {
            $Global_Functions->pageRedirect("company.php");
        }
    }

    
    if ($company->getCompany_type() == "RTL") {
        if ($company->getStatus() == 5) {
            $Global_Functions->pageRedirect("retailers.php");
        } else {
            $Global_Functions->pageRedirect("company.php");
        }
    }
    
    
    if ($company->getCompany_type() == "MNF") {
        if ($company->getStatus() == 5) {
            $Global_Functions->pageRedirect("manufactory.php");
        } else {
            $Global_Functions->pageRedirect("company.php");
        }
    }
    
    
    if ($company->getCompany_type() == "BOT") {
        if ($company->getStatus() == 5) {
            $Global_Functions->pageRedirect("bottling.php");
        } else {
            $Global_Functions->pageRedirect("company.php");
        }
    }

    
    if ($company->getCompany_type() == "BRE") {
        $Global_Functions->pageRedirect("menufectory.php");
    }
}
?>
<body class="">

    <section class="vbox">
        <?php echo $UI->Work("VW"); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php
                 echo $N->home();
                ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="container-fluid">

                                <div class="row">

                                    <div class="col-lg-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading">Company Details <button id="CompanySetUp" class="btn btn-danger btn-xs btn-rounded pull-right">Setup Your Company</button>
                                            </header>     



                                            <div class="row">
                                                <div class="col-sm-12 text-center-xs">
                                                    <section class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="clearfix text-center m-t">
                                                                <div class="inline">
                                                                    <div class="easypiechart easyPieChart" data-percent="75" data-line-width="5" data-bar-color="#4cc0c1" data-track-color="#f5f5f5" data-scale-color="false" data-size="134" data-line-cap="butt" data-animate="1000" style="width: 200px; height: 200px; line-height: 200px;">
                                                                        <div class="thumb-lg"> <img src="../images/logo.png" class="img-circle" alt="..."> </div>
                                                                        <canvas width="20" height="20"></canvas>
                                                                    </div>
                                                                    <div class="h4 m-t m-b-xs"><?php echo $company->getCompany_name(); ?></div>
                                                                    <small class="text-muted m-b">
                                                                        <?php echo $company->GenCompanyType($company->getCompany_type()); ?></small>
                                                                    </small> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <footer class="panel-footer bg-info btn-rounded text-center">
                                                            WELCOME TO VIRTUAL WAREHOUSE
                                                            </div>
                                                        </footer>
                                                    </section>                                      </div>
                                            </div>

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
    <script src="company.js"></script>
    <script src="index_brand_manager.js"></script>
    <script src="../js/global.js"></script>
    <?php include '../global_html/footer.php';;?>
</body>

</html>