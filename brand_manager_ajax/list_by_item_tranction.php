<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'];
//$userId = $_SESSION['user'] == NULL ? "" : $_SESSION['user'];


require_once('../classes/Transfar_Item.php');
require_once('../classes/Brand__Master.php');
require_once('../classes/Brand__Packing.php');
require_once('../classes/Stock_Fectory.php');
require_once('../classes/DateSetter.php');
$_Brand__Master = new Brand__Master();
$_Brand__Packing = new Brand__Packing();
$_Transfar_Item = new Transfar_Item();
$_Stock_Fectory = new Stock_Fectory();
$_DateSetter = new DateSetter();

$_item_id = filter_input(INPUT_GET , "i");

$response = array();
$response["SUCCESS"] = 0;


$TotalRow = $_Transfar_Item->TotalCountByItemId($_item_id);
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['p']) ? 1 : $_GET['p']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_Transfar_Item->loadAllPaggingByItemId($_item_id, $start, $limit);


if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        $_Brand__Master->LoadValue($rows['ITEM_ID']);
        $_Brand__Packing->LoadValue($rows['PACKING_ID']);
        
        
        $Edict['ID']                    = $rows['ID']                   == NULL ? 0 : $rows['ID'] ;
        $Edict['MASTER_ID']             = $rows['MASTER_ID']            == NULL ? 0 : $rows['MASTER_ID'] ;
        $Edict['ITEM_ID']               = $rows['ITEM_ID']              == NULL ? 0 : $rows['ITEM_ID'] ;
        $Edict['ITEM_ID']               = $rows['ITEM_ID']              == NULL ? 0 : $rows['ITEM_ID'] ;
        $Edict['PACKING_ID']            = $rows['PACKING_ID']           == NULL ? 0 : $rows['PACKING_ID'] ;
        $Edict['USER_ITEM_ID']          = $rows['USER_ITEM_ID']         == NULL ? 0 : $rows['USER_ITEM_ID'] ;
        $Edict['UNIT']                  = $rows['UNIT']                 == NULL ? 0 : $rows['UNIT'] ;
        $Edict['IO_TYPE']               = $rows['IO_TYPE']                 == NULL ? 0 : $_Transfar_Item->Full_Io_Type($rows['IO_TYPE']) ;
        $Edict['PACKING_SIZE']          = $rows['PACKING_SIZE']         == NULL ? 0 : $rows['PACKING_SIZE'] ;
        $Edict['BATCH_NO']              = $rows['BATCH_NO']             == NULL ? 0 : $rows['BATCH_NO'] ;
        $Edict['TOTAL_CASE']            = $rows['TOTAL_CASE']           == NULL ? 0 : $rows['TOTAL_CASE'] ;
        $Edict['TOTAL_BOTTLE']          = $rows['TOTAL_BOTTLE']         == NULL ? 0 : $rows['TOTAL_BOTTLE'] ;
        $Edict['TOTAL_BL']              = $rows['TOTAL_BL']             == NULL ? 0 : $rows['TOTAL_BL'] ;
        $Edict['TOTAL_LPL']             = $rows['TOTAL_LPL']            == NULL ? 0 : $rows['TOTAL_LPL'] ;
        $Edict['TOTAL_COST']            = $rows['TOTAL_COST']           == NULL ? 0 : $rows['TOTAL_COST'] ;
        $Edict['TOTAL_ADV']             = $rows['TOTAL_ADV']            == NULL ? 0 : $rows['TOTAL_ADV'] ;
        $Edict['TOTAL_FEE']             = $rows['TOTAL_FEE']            == NULL ? 0 : $rows['TOTAL_FEE'] ;
        $Edict['TOTAL_VAT']             = $rows['TOTAL_VAT']            == NULL ? 0 : $rows['TOTAL_VAT'] ;
        $Edict['TCS']                   = $rows['TCS']                  == NULL ? 0 : $rows['TCS'] ;
        $Edict['TOTAL_MRP']             = $rows['TOTAL_MRP']            == NULL ? 0 : $rows['TOTAL_MRP'] ;
        $Edict['TOTAL_AMOUNT']          = $rows['TOTAL_AMOUNT']         == NULL ? 0 : $rows['TOTAL_AMOUNT'] ;
        $Edict['STATUS']                = $rows['STATUS'] == 0 ? "PRODUCING" : "PRODUCED";
        $Edict['IS_ACTIVE']             = $rows['IS_ACTIVE']            == NULL ? 0 : $rows['IS_ACTIVE'] ;
        $Edict['LONGDATE']              = $_DateSetter->date($rows['LONGDATE'])== NULL ? 0 : $_DateSetter->date($rows['LONGDATE']) ;
        $Edict['CREATE_BY']             = $rows['CREATE_BY']            == NULL ? 0 : $rows['CREATE_BY'] ;
        $Edict['QNTY']                  =  $_Stock_Fectory->getStockInString($_Brand__Packing->getBottles_per_case(), 
                                           $rows['TOTAL_BOTTLE'],
                                           "CASE",
                                           "BOTTLE");

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
//echo $TotalRow;

?>