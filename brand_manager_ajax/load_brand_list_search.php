<?php


ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];
require_once('../classes/Brand__List__User_View.php');
$_brandMaster = new Brand__List__User_View();

require_once('../classes/Stock_Fectory.php');
$_Stock_Fectory = new Stock_Fectory();

$response = array();
$response["SUCCESS"] = 0;


$TotalRow = $_brandMaster->TotalCountByUser($userId);
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_brandMaster->loadAllPaggingByUser($userId, $start, $limit);
if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        
        $case = $_Stock_Fectory->getUnitStock($rows['BOTTLES_PER_CASE'], $rows['CURRENT_STOCK_BOTTLE']);
        $str = $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['CURRENT_STOCK_BOTTLE'], "CASES", "BOTTLES");
        $Openstr = $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['OPENING_STOCK_BOTTLE'], "CASES", "BOTTLES");
        
        
        $Edict['ID']                        = $rows['ID'];
        $Edict['ITEM_ID']                   = $rows['ITEM_ID']              == NULL ? "" : $rows['ITEM_ID'];
        $Edict['PACKING_ID']                = $rows['PACKING_ID']           == NULL ? "" : $rows['PACKING_ID'];
        $Edict['USER_ID']                   = $rows['USER_ID']              == NULL ? "" : $rows['USER_ID'];
        $Edict['NAME']                      = $rows['NAME']                 == NULL ? "" : $rows['NAME'];
        $Edict['BOTTLES_PER_CASE']          = $rows['BOTTLES_PER_CASE']     == NULL ? "" : $rows['BOTTLES_PER_CASE'];
        $Edict['ML_PER_CASE']               = $rows['ML_PER_CASE']          == NULL ? "" : $rows['ML_PER_CASE'];
        $Edict['MRP']                       = $rows['MRP']                  == NULL ? "" : $rows['MRP'];
        $Edict['MRP_PER_BOTTLE']            = $rows['MRP_PER_BOTTLE']       == NULL ? "" : $rows['MRP_PER_BOTTLE'];
        $Edict['AVD_AMOUNT']                = $rows['AVD_AMOUNT']           == NULL ? "" : $rows['AVD_AMOUNT'];
        $Edict['AVD_AMOUNT_PER_BOTTLE']     = $rows['AVD_AMOUNT_PER_BOTTLE']== NULL ? "" : $rows['AVD_AMOUNT_PER_BOTTLE'];
        $Edict['VAT']                       = $rows['VAT']                  == NULL ? "" : $rows['VAT'];
        $Edict['VAT_PER_BOTTLE']            = $rows['VAT_PER_BOTTLE']       == NULL ? "" : $rows['VAT_PER_BOTTLE'];
        $Edict['STRANGTH']                  = $rows['STRANGTH']             == NULL ? "" : $rows['STRANGTH'];
        $Edict['GROUP_ID']                  = $rows['GROUP_ID']             == NULL ? "" : $rows['GROUP_ID'];
        $Edict['GROUP_NAME']                = $rows['GROUP_NAME']           == NULL ? "" : $rows['GROUP_NAME'];
        $Edict['CATEGORY_ID']               = $rows['CATEGORY_ID']          == NULL ? "" : $rows['CATEGORY_ID'];
        $Edict['CATEGORY_NAME']             = $rows['CATEGORY_NAME']        == NULL ? "" : $rows['CATEGORY_NAME'];
        $Edict['TYPE_ID']                   = $rows['TYPE_ID']              == NULL ? "" : $rows['TYPE_ID'];
        $Edict['TYPE_NAME']                 = $rows['TYPE_NAME']            == NULL ? "" : $rows['TYPE_NAME'];
        $Edict['IS_IMPORTED']               = $rows['IS_IMPORTED']          == NULL ? "" : $rows['IS_IMPORTED'];
        $Edict['ITEM_FOR']                  = $rows['ITEM_FOR']             == NULL ? "" : $rows['ITEM_FOR'];
        $Edict['IMAGE_LINK']                = $rows['IMAGE_LINK']           == NULL ? "" : $rows['IMAGE_LINK'];
        $Edict['DESCRIPTION']               = $rows['DESCRIPTION']          == NULL ? "" : $rows['DESCRIPTION'];
        $Edict['CURRENT_STOCK_CASE']        = $case                         == NULL ? "" : $case;
        $Edict['CURRENT_STOCK_STR']         = $str                          == NULL ? "" : $str;
        $Edict['CURRENT_STOCK_BOTTLE']      = $rows['CURRENT_STOCK_BOTTLE'] == NULL ? "" : $rows['CURRENT_STOCK_BOTTLE'];
        $Edict['OPENING_STOCK_CASE']        = $rows['OPENING_STOCK_CASE']   == NULL ? "" : $rows['OPENING_STOCK_CASE'];
        $Edict['OPENING_STOCK_STR']         = $Openstr                      == NULL ? "" : $Openstr;
        $Edict['OPENING_STOCK_BOTTLE']      = $rows['OPENING_STOCK_BOTTLE'] == NULL ? "" : $rows['OPENING_STOCK_BOTTLE'];
        $Edict['USER_ITEM_STATUS']          = $rows['USER_ITEM_STATUS']     == NULL ? "" : $rows['USER_ITEM_STATUS'];
        
        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>