<?php
error_reporting(E_ALL);
$_id            = filter_input(INPUT_GET, "i");


$response                   = array();
$response["SUCCESS"]        = 0;

require_once '../classes/Transfar_Item.php';
$Transfar_Item          = new Transfar_Item();

require_once '../classes/Transfar_Master.php';
$Transfar_Master        = new Transfar_Master();


include_once '../classes/Stock_Transfar______.php';
$Stock_Transfar = new Stock_Transfar______();


$item_id            = $Transfar_Item->retturnItemId($_id);
$packing_id         = $Transfar_Item->retturnPackingId($_id);
$subunit_value      = $Transfar_Item->retturnTotalBottle($_id);

$user_id_in         = $Transfar_Master->returnUserToo($Transfar_Item->retturnMasterId($_id));
$user_id_out        = $Transfar_Master->returnUserFrom($Transfar_Item->retturnMasterId($_id));


$in_id              = $Stock_Transfar->LoadIdByPackingIdAndItemIdIn($item_id, $packing_id, $user_id_in);
$out_id             = $Stock_Transfar->LoadIdByPackingIdAndItemIdIn($item_id, $packing_id, $user_id_out);



if($Stock_Transfar->UpdateStockIn($in_id, $subunit_value)   ==1){$response["SUCCESS"]       = 1;}
if($Stock_Transfar->UpdateStockOut($out_id, $subunit_value) ==1){$response["SUCCESS"]       = 1;}
echo json_encode($response);

?>