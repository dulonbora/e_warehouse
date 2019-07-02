<?php
error_reporting(0);
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'];

require_once('../classes/Ena__Transfar.php');
$_traI = new Ena__Transfar();

require_once('../classes/Stock_Fectory.php');
$_Stock_Fectory = new Stock_Fectory();

require_once('../classes/Ena__Item__List.php');
$_brand = new Ena__Item__List();

require_once('../classes/Brand__Packing.php');
$_brand_packing = new Brand__Packing();

$_master_id = filter_input(INPUT_GET , "i");

$response = array();
$response["SUCCESS"] = 0;

$Result = $_traI->loadByMasterId($_master_id);
if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        
        $_brand->LoadValue($rows['ITEM_ID']);

        $Edict['ID']                = $rows['ID']           == NULL ? 0 : $rows['ID'] ;
        $Edict['ITEM_NAME']         = $_brand->getItem_name()== NULL ? 0 : $_brand->getItem_name() ;
        $Edict['BL']                = $rows['BL']           == NULL ? 0 : $rows['BL'] ;
        $Edict['TOTAL_COST']        = $rows['TOTAL_COST']   == NULL ? 0 : $rows['TOTAL_COST'] ;
        $Edict['TOTAL_FEE']         = $rows['TOTAL_FEE']    == NULL ? 0 : $rows['TOTAL_FEE'] ;
        $Edict['TOTAL_VAT']         = $rows['TOTAL_VAT']    == NULL ? 0 : $rows['TOTAL_VAT'] ;
        $Edict['TCS']               = $rows['TCS']          == NULL ? 0 : $rows['TCS'] ;
        $Edict['TOTAL_MRP']         = $rows['TOTAL_MRP']    == NULL ? 0 : $rows['TOTAL_MRP'] ;
        $Edict['TOTAL_AMOUNT']      = $rows['TOTAL_AMOUNT'] == NULL ? 0 : $rows['TOTAL_AMOUNT'] ;

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1;  //loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>