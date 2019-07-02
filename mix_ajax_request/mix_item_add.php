<?php

error_reporting(0);
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

include_once '../classes/Brand__Packing.php';
$__Brand__Packing       = new Brand__Packing();

include_once '../classes/Stock_Fectory.php';
$__Stock_Fectory        = new Stock_Fectory();

include '../classes/Mix__Item__Master.php';
$response = array(); 
$response["SUCCESS"] = 0;

$__mix = new Mix__Item__Master();

$_packing_id = filter_input(INPUT_POST , "PACKING_ID");

$_unit = filter_input(INPUT_POST , "UNIT");
$_sub_unit = filter_input(INPUT_POST , "SUB_UNIT");
$_sub_unit_value = filter_input(INPUT_POST , "SUB_UNIT_VALUE");
$_opening_stock_unit = filter_input(INPUT_POST , "OPENING_STOCK_UNIT");
$_opening_stock_unit1 = filter_input(INPUT_POST , "OPENING_STOCK_UNIT1");
$_type = filter_input(INPUT_POST , "ITEM_TYPE");
$_create_on = time();
$_create_by = $userId;
$_modify_on = time();
$_modify_by = $userId;

$__Brand__Packing->LoadValue($_packing_id);
$_opening_stock_sub_unit    = ($_sub_unit_value * $_opening_stock_unit) + $_opening_stock_unit1;
$_opening_stock_unit_main        = $__Stock_Fectory->getUnitStock($_sub_unit_value, $_opening_stock_sub_unit);
$_closeing_stock_str        = $__Stock_Fectory->getStockInString($_sub_unit_value, $_opening_stock_sub_unit, $_unit, $_sub_unit);
$_item_id = $__Brand__Packing->getMaster_id();




$__mix->setItemId($_item_id);
$__mix->setPackingId($_packing_id);
$__mix->setUnit($_unit);
$__mix->setSubUnit($_sub_unit);
$__mix->setSubUnitValue($_sub_unit_value);
$__mix->setOpeningStockUnit($_opening_stock_unit_main);
$__mix->setOpeningStockSubUnit($_opening_stock_sub_unit);
$__mix->setCloseingStockUnit($_opening_stock_unit_main);
$__mix->setCloseingStockSubUnit($_opening_stock_sub_unit);
$__mix->setCloseingStockStr($_closeing_stock_str);
$__mix->setItemType($_type);
$__mix->setCreateOn($_create_on);
$__mix->setCreateBy($_create_by);
$__mix->setModifyOn($_modify_on);
$__mix->setModifyBy($_modify_by);

$ok = $__mix->ChecAlreadyExit($_item_id, $_packing_id, $_type, $_create_by);

if($ok==1){$response["SUCCESS"] = 2;}  else {
if($__mix->Insert()==1){$response["SUCCESS"] = 1;}
}

echo json_encode($response);
exit();

