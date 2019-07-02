<?php

require_once('../classes/Brand__Packing__View.php');
$_Brand__Packing__View          = new Brand__Packing__View();

require_once('../classes/Imfl_Stock_Counter.php');
$_Imfl_Stock_Counter        = new Imfl_Stock_Counter();

require_once('../classes/Stock_Fectory.php');
$_Stock_Fectory        = new Stock_Fectory();

require_once('../classes/Brand__List__User_View.php');
$_Brand__List__User_View        = new Brand__List__User_View();

require_once('../classes/Brand__Master.php');
$_Brand__Master        = new Brand__Master();

require_once('../classes/Category.php');
$_Category        = new Category();


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
        $_Brand__Master->LoadValue($_Brand__List__User_View->getItem_id());
        
        $cStock                = $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $_Imfl_Stock_Counter->Total_Count_Closeing_Stock($rows['ID']), "C/S", "BTL");
        
        $Edict['ID']            = $rows['ID'];
        $Edict['GROUP_ID']      = 0;
        $Edict['CATEGORY_ID']   = 0;
        $Edict['TYPE_ID']       = 0;
        $Edict['ML']            = $_Brand__List__User_View->getMl_per_case();
        $Edict['BTL']            = $_Brand__List__User_View->getBottles_per_case();
        $Edict['MRP']           = $_Brand__List__User_View->getMrp();
        $Edict['NAME']          = $_Brand__List__User_View->getName()         == NULL ? ""       : $_Brand__List__User_View->getName();

        $Edict['CLOSEING']      = $cStock               == NULL ? "0"    : $cStock;

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>


