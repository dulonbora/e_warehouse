<?php
error_reporting(0);
require_once('../classes/Brand__Packing__View.php');
$_Brand__Packing__View          = new Brand__Packing__View();

require_once('../classes/Imfl_Stock_Counter.php');
$_Imfl_Stock_Counter        = new Imfl_Stock_Counter();

require_once('../classes/Stock_Fectory.php');
$_Stock_Fectory        = new Stock_Fectory();

require_once('../classes/Brand__List__User_View.php');
$_Brand__List__User_View        = new Brand__List__User_View();


$response           = array();
$response["SUCCESS"] = 0;

$TotalRow = $_Brand__Packing__View->TotalCount();
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_Brand__Packing__View->loadAllPagging($start, $limit);
if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        $_Brand__List__User_View->LoadValue($rows['ID']);
        
        $oSStock                = $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $_Imfl_Stock_Counter->Total_Count_Opening_Stock($rows['ID']), "CASE", "BTL");
        $iStock                = $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $_Imfl_Stock_Counter->Total_Count_Inward_Stock($rows['ID']), "CASE", "BTL");
        $OStock                = $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $_Imfl_Stock_Counter->Total_Count_Outward_Stock($rows['ID']), "CASE", "BTL");
        $lStock                = $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $_Imfl_Stock_Counter->Total_Count_Lost_Stock($rows['ID']), "CASE", "BTL");
        $pStock                = $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $_Imfl_Stock_Counter->Total_Count_Production_Stock($rows['ID']), "CASE", "BTL");
        $xStock                = $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $_Imfl_Stock_Counter->Total_Count_Produced_Stock($rows['ID']), "CASE", "BTL");
        $cStock                = $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $_Imfl_Stock_Counter->Total_Count_Closeing_Stock($rows['ID']), "CASE", "BTL");
        
        $Edict['ID']            = $rows['ID'];
        $Edict['BTL']           = $rows['BOTTLES_PER_CASE'];
        $Edict['ML']            = $rows['ML_PER_CASE'];
        $Edict['NAME']          = $rows['ITEM_NAME'];
        $Edict['MRP_PER_BOTTLE']= $rows['MRP_PER_BOTTLE'];
        $Edict['OPENING']       = $oSStock              == NULL ? "0"    : $oSStock;
        $Edict['INWARD']        = $iStock               == NULL ? "0"    : $iStock;
        $Edict['OUTWARD']       = $OStock               == NULL ? "0"    : $OStock;
        $Edict['LOSE']          = $lStock               == NULL ? "0"    : $lStock;
        $Edict['PRODUCTION']    = $pStock               == NULL ? "0"    : $pStock;
        $Edict['PRIDUCED']      = $xStock               == NULL ? "0"    : $xStock;
        $Edict['CLOSEING']      = $cStock               == NULL ? "0"    : $cStock;

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>


