<?php
error_reporting(0);
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'];

require_once('../classes/Transfar_Item.php');
$_traI = new Transfar_Item();

require_once('../classes/Stock_Fectory.php');
$_Stock_Fectory = new Stock_Fectory();

require_once('../classes/Brand__Master.php');
$_brand = new Brand__Master();

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
        $_brand_packing->LoadValue($rows['PACKING_ID']);

        $Edict['ID']                = $rows['ID']           == NULL ? 0 : $rows['ID'] ;
        $Edict['MASTER_ID']         = $rows['MASTER_ID']    == NULL ? 0 : $rows['MASTER_ID'] ;
        $Edict['ITEM_ID']           = $rows['ITEM_ID']      == NULL ? 0 : $rows['ITEM_ID'] ;
        $Edict['ITEM_NAME']         = $_brand->getName()    == NULL ? "" : $_brand->getName() ;
        $Edict['PACKING_ID']        = $rows['PACKING_ID']   == NULL ? 0 : $rows['PACKING_ID'] ;
        $Edict['MRP']               = $rows['PACKING_ID']   == NULL ? 0 : $rows['TOTAL_MRP']/$rows['TOTAL_BOTTLE'] ;
        $Edict['SIZE']              = $_brand_packing->getMl_per_case()   == NULL ? "" : $_brand_packing->getMl_per_case()." ML" ;
        $Edict['USER_ITEM_ID']      = $rows['USER_ITEM_ID'] == NULL ? 0 : $rows['USER_ITEM_ID'] ;
        $Edict['UNIT']              = $rows['UNIT']         == NULL ? "" : $rows['UNIT'] ;
        $Edict['QNTY']              = $_Stock_Fectory->getStockInString($_brand_packing->getBottles_per_case(), $rows['TOTAL_BOTTLE'], "C/S", "BTL")         == NULL ? "" : $_Stock_Fectory->getStockInString($_brand_packing->getBottles_per_case(), $rows['TOTAL_BOTTLE'], "CASE", "BOTTLE") ;
        $Edict['PACKING_SIZE']      = $rows['PACKING_SIZE'] == NULL ? 0 : $rows['PACKING_SIZE'] ;
        $Edict['BATCH_NO']          = $rows['BATCH_NO']     ==NULL ? "" : $rows['BATCH_NO'] ;
        $Edict['TOTAL_CASE']        = $rows['TOTAL_CASE']   ==NULL ? "" : $rows['TOTAL_CASE']." CASE" ;
        $Edict['TOTAL_BOTTLE']      = $rows['TOTAL_BOTTLE'] ==NULL ? "" : $rows['TOTAL_BOTTLE']." BTL" ;
        $Edict['TOTAL_BL']          = $rows['TOTAL_BL']     ==NULL ? 0 : $rows['TOTAL_BL'] ;
        $Edict['TOTAL_LPL']         = $rows['TOTAL_LPL']    ==NULL ? 0 : $rows['TOTAL_LPL'] ;
        $Edict['TOTAL_COST']        = $rows['TOTAL_COST']   ==NULL ? 0 : $rows['TOTAL_COST'] ;
        $Edict['TOTAL_ADV']         = $rows['TOTAL_ADV']    ==NULL ? 0 : $rows['TOTAL_ADV'] ;
        $Edict['TOTAL_FEE']         = $rows['TOTAL_FEE']    ==NULL ? 0 : $rows['TOTAL_FEE'] ;
        $Edict['TOTAL_VAT']         = $rows['TOTAL_VAT']    ==NULL ? 0 : $rows['TOTAL_VAT'] ;
        $Edict['TCS']               = $rows['TCS']          ==NULL ? 0 : $rows['TCS'] ;
        $Edict['TOTAL_MRP']         = $rows['TOTAL_MRP']    ==NULL ? 0 : $rows['TOTAL_MRP'] ;
        $Edict['TOTAL_AMOUNT']      = $rows['TOTAL_AMOUNT'] ==NULL ? 0 : $rows['TOTAL_AMOUNT'] ;
        $Edict['IS_ACTIVE']         = $rows['IS_ACTIVE']    ==NULL ? "" : $rows['IS_ACTIVE'] ;
        $Edict['STATUS']            = $rows['STATUS']       ==NULL ? "" : $rows['STATUS'] ;

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1;  //loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>