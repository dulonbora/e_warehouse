
<?php
include '../global_html/AHeader.php';
include '../classes/Menu.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Company.php';
include '../classes/Global_Functions.php';
include '../classes/Transfar_Master.php';

$Transfar_Master                    = new Transfar_Master();
$menu                               = new Menu();
$UI                                 = new UI();
$N                                  = new NavBar();
$company                            = new Company();
$Global_Functions                   = new Global_Functions();


if($company->Check_If_Exists($_SESSION['excise_user_id'])==0){$Global_Functions->pageRedirect("company.php");}

$company->LoadValue($company->Check_If_Exists($_SESSION['excise_user_id']));
$company->LoadToSession($company->getId());
if ($company->getStatus() != 5){$Global_Functions->pageRedirect("company.php");}

 $dataPoints = array();
 
 $dataPointsConsignmentImflCount1           = $Transfar_Master->TotalCountByUserByStatus($userId, 1, "IMFL");
 $dataPointsConsignmentImflCount2           = $Transfar_Master->TotalCountByUserByStatus($userId, 2, "IMFL");
 $dataPointsConsignmentImflCount3           = $Transfar_Master->TotalCountByUserByStatus($userId, 3, "IMFL");
 $dataPointsConsignmentImflCount4           = $Transfar_Master->TotalCountByUserByStatus($userId, 4, "IMFL");
 $dataPointsConsignmentImflCount5           = $Transfar_Master->TotalCountByUserByStatus($userId, 5, "IMFL");
 $dataPointsConsignmentImflCount6           = $Transfar_Master->TotalCountByUserByStatus($userId, 6, "IMFL");
 $dataPointsConsignmentImflCount7           = $Transfar_Master->TotalCountByUserByStatus($userId, 7, "IMFL");
 
 $dataPointsConsignmentImfl = array(
    array("label" => "Active",              "y" => $dataPointsConsignmentImflCount1),
    array("label" => "Confirmed",           "y" => $dataPointsConsignmentImflCount2),
    array("label" => "Order Pending",       "y" => $dataPointsConsignmentImflCount3),
    array("label" => "Order Confirmed",     "y" => $dataPointsConsignmentImflCount4),
    array("label" => "Invoice Generated",   "y" => $dataPointsConsignmentImflCount5),
    array("label" => "Dispatched",          "y" => $dataPointsConsignmentImflCount6),
    array("label" => "Excuted",             "y" => $dataPointsConsignmentImflCount7)
);

 $dataPointsOrderImflCount3                 = $Transfar_Master->TotalCountByFromUser($userId, 3, "IMFL");
 $dataPointsOrderImflCount4                 = $Transfar_Master->TotalCountByFromUser($userId, 4, "IMFL");
 $dataPointsOrderImflCount5                 = $Transfar_Master->TotalCountByFromUser($userId, 5, "IMFL");
 $dataPointsOrderImflCount6                 = $Transfar_Master->TotalCountByFromUser($userId, 6, "IMFL");
 $dataPointsOrderImflCount7                 = $Transfar_Master->TotalCountByFromUser($userId, 7, "IMFL");
 
$dataPointsOrderImfl = array(
    array("label" => "Order Pending",       "y" => $dataPointsOrderImflCount3),
    array("label" => "Order Confirmed",     "y" => $dataPointsOrderImflCount4),
    array("label" => "Invoice Generated",   "y" => $dataPointsOrderImflCount5),
    array("label" => "Dispatched",          "y" => $dataPointsOrderImflCount6),
    array("label" => "Excuted",             "y" => $dataPointsOrderImflCount7)
);

 $dataPointsConsignmentEnaCount1            = $Transfar_Master->TotalCountByUserByStatus($userId, 1, "ENA");
 $dataPointsConsignmentEnaCount2            = $Transfar_Master->TotalCountByUserByStatus($userId, 2, "ENA");
 $dataPointsConsignmentEnaCount3            = $Transfar_Master->TotalCountByUserByStatus($userId, 3, "ENA");
 $dataPointsConsignmentEnaCount4            = $Transfar_Master->TotalCountByUserByStatus($userId, 4, "ENA");
 $dataPointsConsignmentEnaCount5            = $Transfar_Master->TotalCountByUserByStatus($userId, 5, "ENA");
 $dataPointsConsignmentEnaCount6            = $Transfar_Master->TotalCountByUserByStatus($userId, 6, "ENA");
 $dataPointsConsignmentEnaCount7            = $Transfar_Master->TotalCountByUserByStatus($userId, 7, "ENA");
   
 $dataPointsConsignmentEna = array(
    array("label" => "Active",              "y" => $dataPointsConsignmentEnaCount1),
    array("label" => "Confirmed",           "y" => $dataPointsConsignmentEnaCount2),
    array("label" => "Order Pending",       "y" => $dataPointsConsignmentEnaCount3),
    array("label" => "Order Confirmed",     "y" => $dataPointsConsignmentEnaCount4),
    array("label" => "Invoice Generated",   "y" => $dataPointsConsignmentEnaCount5),
    array("label" => "Dispatched",          "y" => $dataPointsConsignmentEnaCount6),
    array("label" => "Excuted",             "y" => $dataPointsConsignmentEnaCount7)
);
 
 $dataPointsOrderEnaCount3                 = $Transfar_Master->TotalCountByFromUser($userId, 3, "ENA");
 $dataPointsOrderEnaCount4                 = $Transfar_Master->TotalCountByFromUser($userId, 4, "ENA");
 $dataPointsOrderEnaCount5                 = $Transfar_Master->TotalCountByFromUser($userId, 5, "ENA");
 $dataPointsOrderEnaCount6                 = $Transfar_Master->TotalCountByFromUser($userId, 6, "ENA");
 $dataPointsOrderEnaCount7                 = $Transfar_Master->TotalCountByFromUser($userId, 7, "ENA");

$dataPointsOrderEna = array(
    array("label" => "Order Pending",       "y" => $dataPointsOrderEnaCount3),
    array("label" => "Order Confirmed",     "y" => $dataPointsOrderEnaCount4),
    array("label" => "Invoice Generated",   "y" => $dataPointsOrderEnaCount5),
    array("label" => "Dispatched",          "y" => $dataPointsOrderEnaCount6),
    array("label" => "Excuted",             "y" => $dataPointsOrderEnaCount7)
);
?>


<?php

require_once('../classes/Ena__User__Item.php');
$_Ena_Item = new Ena__User__Item();

require_once('../classes/Brand__Master.php');
$_brandMaster = new Brand__Master();




$TotalRow = $_Ena_Item->TotalCount($userId);
$Result = $_Ena_Item->loadAllPagging($userId, 0, $TotalRow);

if ($Result > 0) {
    $enaStock = array();
    $Edict = array();
    foreach ($Result as $rows) {
        $Edict['label']        = $rows['ITEM_ID']       == null ? "" : $_Ena_Item->ReturnItemName($rows['ITEM_ID']);
        $Edict['y']            = $rows['CLOSEING_STOCK']== null ? "" : $rows['CLOSEING_STOCK'];
        array_push($enaStock, $Edict);
    }
}
?>

<body class="">

    <section class="vbox">
        <?php echo $UI->Work("WHOLESALE"); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php
                echo $N->wholesaler();
                ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="container-fluid">

                                <div class="row">

                <div class="col-sm-12">
                   <section class="panel panel-default">
                      <header class="panel-heading bg-light no-border">
                         <div class="clearfix">
                             <a href="#" class="pull-left thumb-md avatar b-3x m-r"> <img src="../images/logo.png" alt="..."> </a> 
                            <div class="clear">
                               <div class="h3 m-t-xs m-b-xs"> <?php echo $company->getCompany_name();?><i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i> </div>
                               <small class="text-muted"><?php echo $company->GenCompanyType($company->getCompany_type());?></small> 
                            </div>
                         </div>
                      </header>
                   </section>

                </div>
                                    
                   
                                    
                <div class="col-sm-6">
                   <section class="panel panel-default">
                      <header class="panel-heading bg-light no-border">
                         <div class="clearfix">
                            <div class="clear">
                               <div class="h3 m-t-xs m-b-xs"> <i class="fa fa-beer text-lg text-danger"></i> IMFL Consignment <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i> </div>
                               <small class="text-muted"> All Consignment Status</small> 
                            </div>
                         </div>
                      </header>
                      <div class="list-group no-radius alt"> 
                          <a class="list-group-item" href="../consignment/consignment_list.php?s=1"> <span class="badge bg-info"><?php echo $dataPointsConsignmentImflCount1;?></span> <i class="fa icon-notebook  text-danger"></i> Active </a>
                          <a class="list-group-item" href="../consignment/consignment_list.php?s=2"> <span class="badge bg-info"><?php echo $dataPointsConsignmentImflCount2;?></span> <i class="fa fa-building-o  text-danger"></i> Confirmed </a>
                          <a class="list-group-item" href="../consignment/consignment_list.php?s=3"> <span class="badge bg-light"><?php echo $dataPointsConsignmentImflCount3;?></span> <i class="fa icon-envelope  text-danger"></i> Order Pending </a>
                          <a class="list-group-item" href="../consignment/consignment_list.php?s=4"> <span class="badge bg-light"><?php echo $dataPointsConsignmentImflCount4;?></span> <i class="fa icon-envelope-open text-danger"></i> Order Confirmed </a>
                          <a class="list-group-item" href="../consignment/consignment_list.php?s=5"> <span class="badge bg-light"><?php echo $dataPointsConsignmentImflCount5;?></span> <i class="fa icon-envelope-letter text-danger"></i> Invoice Generated </a>
                          <a class="list-group-item" href="../consignment/consignment_list.php?s=6"> <span class="badge bg-light"><?php echo $dataPointsConsignmentImflCount6;?></span> <i class="fa fa-truck  text-danger"></i> Dispatched </a>
                          <a class="list-group-item" href="../consignment/consignment_list.php?s=7"> <span class="badge bg-light"><?php echo $dataPointsConsignmentImflCount7;?></span> <i class="fa fa-unlink  text-danger"></i> Excuted </a>
                      </div>
                   </section>

                </div>   
                                    
                                                    <div class="col-sm-6">
                   <section class="panel panel-default">
                      <header class="panel-heading bg-light no-border">
                         <div class="clearfix">
                            <div class="clear">
                               <div class="h3 m-t-xs m-b-xs"> IMFL CONSIGNMENT </div>
                               <small class="text-muted"> Consignment status created by self</small> 
                            </div>
                         </div>
                      </header>
                        <div id="IMFL_CONSIGNMENT" style="height: 279px; width: 100%;"></div>
                   </section>
                </div>    
                             
                                    
                                        
        
        
                                        
                <div class="col-sm-6">
                   <section class="panel panel-default">
                      <header class="panel-heading bg-light no-border">
                         <div class="clearfix">
                            <div class="clear">
                               <div class="h3 m-t-xs m-b-xs"> IMFL Order <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i> </div>
                               <small class="text-muted"> All Consignment Status</small> 
                            </div>
                         </div>
                      </header>
                      <div class="list-group no-radius alt"> 
                          <a class="list-group-item" href="../consignment/consignment_list_from.php?s=3"> <span class="badge bg-success"><?php echo $dataPointsOrderImflCount3;?></span> <i class="fa icon-envelope text-danger"></i> Order Pending </a>
                          <a class="list-group-item" href="../consignment/consignment_list_from.php?s=4"> <span class="badge bg-success"><?php echo $dataPointsOrderImflCount4;?></span> <i class="fa icon-envelope-open text-danger"></i> Order Confirmed </a>
                          <a class="list-group-item" href="../consignment/consignment_list_from.php?s=5"> <span class="badge bg-success"><?php echo $dataPointsOrderImflCount5;?></span> <i class="fa icon-envelope-letter text-danger"></i> Invoice Generated </a>
                          <a class="list-group-item" href="../consignment/consignment_list_from.php?s=6"> <span class="badge bg-success"><?php echo $dataPointsOrderImflCount6;?></span> <i class="fa fa-truck text-danger"></i> Dispatched </a>
                          <a class="list-group-item" href="../consignment/consignment_list_from.php?s=7"> <span class="badge bg-success"><?php echo $dataPointsOrderImflCount7;?></span> <i class="fa fa-unlink  text-danger "></i> Excuted </a>
                      </div>
                   </section>

                </div>  
                                    
                                                 <div class="col-sm-6">
                   <section class="panel panel-default">
                      <header class="panel-heading bg-light no-border">
                         <div class="clearfix">
                            <div class="clear">
                               <div class="h3 m-t-xs m-b-xs"> IMFL ORDER </div>
                               <small class="text-muted"> Consignment status created by other</small> 
                            </div>
                         </div>
                      </header>
                        <div id="IMFL_ORDER" style="height: 199px; width: 100%;"></div>
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
            
        </section>
    </section>
    <!-- Javascript -->
    <script type="text/javascript"><?php echo "var userId = '{$userId}';";?></script>

    
<script type="text/javascript">
window.onload = function() {
 
 
var imflc = new CanvasJS.Chart("IMFL_CONSIGNMENT", {
	animationEnabled: true,
	data: [{
		type: "pie",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPointsConsignmentImfl, JSON_NUMERIC_CHECK); ?>
	}]
});
imflc.render();
 
var imflo = new CanvasJS.Chart("IMFL_ORDER", {
	animationEnabled: true,
	data: [{
		type: "doughnut",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPointsOrderImfl, JSON_NUMERIC_CHECK); ?>
	}]
});
imflo.render();




}

</script>
    
    <script src="../js/canvas_js.js"></script>
    <script src="company.js"></script>
    <script src="../js/global.js"></script>
    <script src="../js/charts/sparkline/jquery.sparkline.min.js"></script>
    <?php include '../global_html/footer.php';;?>
</body>

</html>