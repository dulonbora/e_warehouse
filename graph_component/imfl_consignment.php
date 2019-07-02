
<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];
 
include '../classes/Transfar_Master.php';

$Transfar_Master                    = new Transfar_Master();


 
$dataPointsConsignment = array( 
	array("label"=>"Active",                "y"=>$Transfar_Master->TotalCountByUserByStatus($userId, 1, "IMFL")),
	array("label"=>"Confirmed",             "y"=>$Transfar_Master->TotalCountByUserByStatus($userId, 2, "IMFL")),
	array("label"=>"Order Pending",         "y"=>$Transfar_Master->TotalCountByUserByStatus($userId, 3, "IMFL")),
	array("label"=>"Order Confirmed",       "y"=>$Transfar_Master->TotalCountByUserByStatus($userId, 4, "IMFL")),
	array("label"=>"Invoice Generated",     "y"=>$Transfar_Master->TotalCountByUserByStatus($userId, 5, "IMFL")),
	array("label"=>"Dispatched",            "y"=>$Transfar_Master->TotalCountByUserByStatus($userId, 6, "IMFL")),
	array("label"=>"Excuted",               "y"=>$Transfar_Master->TotalCountByUserByStatus($userId, 7, "IMFL"))
)
 
?>


<section class="panel panel-default">
                      <header class="panel-heading bg-light no-border">
                         <div class="clearfix">
                            <div class="clear">
                                <div class="h3 m-t-xs m-b-xs"> IMFL Consignment <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i> </div>
                               <small class="text-muted"> All Consignment Status</small> 
                            </div>
                         </div>
                      </header>
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                   </section>



<script>
window.onload = function() {
var chart1 = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	data: [{
		type: "pie",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPointsConsignment, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
}



</script>

