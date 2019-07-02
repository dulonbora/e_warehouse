
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
        <?php echo $UI->Work("DISTILLERY"); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php
                echo $N->homeDistllry();
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
                                    
                <div class="col-sm-12">
                   <section class="panel panel-default">
                      <header class="panel-heading bg-light no-border">
                         <div class="clearfix">
                            <div class="clear">
                               <div class="h3 m-t-xs m-b-xs"> STOCK SUMMARY </div>
                            </div>
                         </div>
                      </header>
                        <div id="ENA_ITEM_STOCK" style="height: 300px; width: 100%;"></div>
                   </section>
                </div>   
                                             
                                                                    
                              
                                                                                           
                <div class="col-sm-6">
                   <section class="panel panel-default">
                      <header class="panel-heading bg-light no-border">
                         <div class="clearfix">
                            <div class="clear">
                               <div class="h3 m-t-xs m-b-xs"> <i class="fa fa-flask text-lg text-danger"></i> ENA Consignment <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i> </div>
                               <small class="text-muted"> All Consignment Status</small> 
                            </div>
                         </div>
                      </header>
                      <div class="list-group no-radius alt"> 
                          <a class="list-group-item" href="../consignment_ena/consignment_list.php?s=1"> <span class="badge bg-success"><?php echo $dataPointsConsignmentEnaCount1;?></span> <i class="fa icon-notebook text-danger"></i> Active </a>
                          <a class="list-group-item" href="../consignment_ena/consignment_list.php?s=2"> <span class="badge bg-info"><?php echo $dataPointsConsignmentEnaCount2;?></span> <i class="fa fa-building-o text-danger"></i> Confirmed </a>
                          <a class="list-group-item" href="../consignment_ena/consignment_list.php?s=3"> <span class="badge bg-light"><?php echo $dataPointsConsignmentEnaCount3;?></span> <i class="fa icon-envelope text-danger"></i> Order Pending </a>
                          <a class="list-group-item" href="../consignment_ena/consignment_list.php?s=4"> <span class="badge bg-light"><?php echo $dataPointsConsignmentEnaCount4;?></span> <i class="fa icon-envelope-open text-danger"></i> Order Confirmed </a>
                          <a class="list-group-item" href="../consignment_ena/consignment_list.php?s=5"> <span class="badge bg-light"><?php echo $dataPointsConsignmentEnaCount5;?></span> <i class="fa icon-envelope-letter text-danger"></i> Invoice Generated </a>
                          <a class="list-group-item" href="../consignment_ena/consignment_list.php?s=6"> <span class="badge bg-light"><?php echo $dataPointsConsignmentEnaCount6;?></span> <i class="fa fa-truck text-danger"></i> Dispatched </a>
                          <a class="list-group-item" href="../consignment_ena/consignment_list.php?s=7"> <span class="badge bg-light"><?php echo $dataPointsConsignmentEnaCount7;?></span> <i class="fa fa-unlink  text-danger"></i> Excuted </a>
                      </div>
                   </section>

                </div>     
                                    
                                        <div class="col-sm-6">
                   <section class="panel panel-default">
                      <header class="panel-heading bg-light no-border">
                         <div class="clearfix">
                            <div class="clear">
                               <div class="h3 m-t-xs m-b-xs"> ENA CONSIGNMENT </div>
                               <small class="text-muted"> Consignment status created by self</small> 
                            </div>
                         </div>
                      </header>
                        <div id="ENA_CONSIGNMENT" style="height: 279px; width: 100%;"></div>
                   </section>
                </div> 
                                        
                 
                                    
                                                 
                                        
                <div class="col-sm-6">
                   <section class="panel panel-default">
                      <header class="panel-heading bg-light no-border">
                         <div class="clearfix">
                            <div class="clear">
                               <div class="h3 m-t-xs m-b-xs"> ENA Order <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i> </div>
                               <small class="text-muted"> All Consignment Status</small> 
                            </div>
                         </div>
                      </header>
                      <div class="list-group no-radius alt"> 
                          <a class="list-group-item" href="../consignment_ena/consignment_list_from.php?s=3"> <span class="badge bg-light"><?php echo $dataPointsOrderEnaCount3;?></span> <i class="fa icon-envelope text-danger"></i> Order Pending </a>
                          <a class="list-group-item" href="../consignment_ena/consignment_list_from.php?s=4"> <span class="badge bg-light"><?php echo $dataPointsOrderEnaCount4;?></span> <i class="fa icon-envelope-open text-danger"></i> Order Confirmed </a>
                          <a class="list-group-item" href="../consignment_ena/consignment_list_from.php?s=5"> <span class="badge bg-light"><?php echo $dataPointsOrderEnaCount5;?></span> <i class="fa icon-envelope-letter text-danger"></i> Invoice Generated </a>
                          <a class="list-group-item" href="../consignment_ena/consignment_list_from.php?s=6"> <span class="badge bg-light"><?php echo $dataPointsOrderEnaCount6;?></span> <i class="fa fa-truck text-danger"></i> Dispatched </a>
                          <a class="list-group-item" href="../consignment_ena/consignment_list_from.php?s=7"> <span class="badge bg-light"><?php echo $dataPointsOrderEnaCount7;?></span> <i class="fa fa-unlink  text-danger"></i> Excuted </a>
                      </div>
                   </section>

                </div>     
                                    
                                    
                                    
                <div class="col-sm-6">
                   <section class="panel panel-default">
                      <header class="panel-heading bg-light no-border">
                         <div class="clearfix">
                            <div class="clear">
                               <div class="h3 m-t-xs m-b-xs"> ENA ORDER </div>
                               <small class="text-muted"> Consignment status created by other</small> 
                            </div>
                         </div>
                      </header>
                        <div id="ENA_ORDER" style="height: 198px; width: 100%;"></div>
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
 


 
 
var enac = new CanvasJS.Chart("ENA_CONSIGNMENT", {
	animationEnabled: true,
	data: [{
		type: "pie",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPointsConsignmentEna, JSON_NUMERIC_CHECK); ?>
	}]
});
enac.render();
 
var enao = new CanvasJS.Chart("ENA_ORDER", {
	animationEnabled: true,
	data: [{
		type: "doughnut",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPointsOrderEna, JSON_NUMERIC_CHECK); ?>
	}]
});
enao.render();
 
var enaStock = new CanvasJS.Chart("ENA_ITEM_STOCK", {
	animationEnabled: true,
	data: [{
		type: "column",
		indexLabel: "{label} ({y} BL)",
		neckHeight: 0,
		dataPoints: <?php echo json_encode($enaStock, JSON_NUMERIC_CHECK); ?>
	}]
});
enaStock.render();
}

</script>
    
    <script src="../js/canvas_js.js"></script>
    <script src="company.js"></script>
    <script src="../js/global.js"></script>
    <script src="../js/charts/sparkline/jquery.sparkline.min.js"></script>
    <?php include '../global_html/footer.php';;?>
</body>

</html>