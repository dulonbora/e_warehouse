<?php
//error_reporting(0);
ob_start();
if (session_status()        == PHP_SESSION_NONE) {session_start();}

$id = filter_input(INPUT_GET, 'id');
$userId = (int) $id == NULL ? $_SESSION['id'] : $id;

require_once('../classes/Brand__List__User_View.php');
$_Brand__List__User_View   = new Brand__List__User_View();

require_once('../classes/Stock_Fectory.php');
$_Stock_Fectory             = new Stock_Fectory();


$response                   = array();
$response["SUCCESS"]        = 0;


$TotalRow                   = $_Brand__List__User_View->TotalCountByUser($userId);
$limit                      = 20;
$TotalPage                  = ceil($TotalRow / $limit);
$page                       = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1)             == $TotalPage) {$page == 0;}
$start                      = ($page - 1) * $limit;


$Result                     = $_Brand__List__User_View->loadAllPaggingByUser($userId, $start, $limit);
if ($Result > 0) {
    $response['CONTENTS']   = array();
    $Edict                  = array();
    foreach ($Result as $rows) {
        
        $Edict['ID']                        = $rows['ID'];
        $Edict['ITEM_ID']                   = $rows['ITEM_ID']              == NULL ? "" : $rows['ITEM_ID'];
        $Edict['PACKING_ID']                = $rows['PACKING_ID']           == NULL ? "" : $rows['PACKING_ID'];
        $Edict['USER_ID']                   = $rows['USER_ID']              == NULL ? "" : $rows['USER_ID'];
        $Edict['FYEAR']                     = $rows['FYEAR']                == NULL ? "" : $rows['FYEAR'];
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
        
        $Edict['OPENING_STOCK']             = $rows['OPENING_STOCK']        == NULL ? "" : $rows['OPENING_STOCK'];
        $Edict['OPENING_STOCK_STR']         = $rows['OPENING_STOCK']        == NULL ? "" : $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['OPENING_STOCK'], "C/S", "BTL");
        
        $Edict['INWARD_STOCK']              = $rows['INWARD_STOCK']         == NULL ? "" : $rows['INWARD_STOCK'];
        $Edict['INWARD_STOCK_STR']          = $rows['INWARD_STOCK']         == NULL ? "" : $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['INWARD_STOCK'], "C/S", "BTL");
        
        $Edict['OUTWARD_STOCK']             = $rows['OUTWARD_STOCK']        == NULL ? "" : $rows['OUTWARD_STOCK'];
        $Edict['OUTWARD_STOCK_STR']         = $rows['OUTWARD_STOCK']        == NULL ? "" : $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['OUTWARD_STOCK'], "C/S", "BTL");
        
        $Edict['PRODIUCTING_STOCK']         = $rows['PRODIUCTING_STOCK']    == NULL ? "" : $rows['PRODIUCTING_STOCK'];
        $Edict['PRODIUCTING_STOCK_STR']     = $rows['PRODIUCTING_STOCK']    == NULL ? "" : $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['PRODIUCTING_STOCK'], "C/S", "BTL");
        
        $Edict['PRODIUCED_STOCK']           = $rows['PRODIUCED_STOCK']      == NULL ? "" : $rows['PRODIUCED_STOCK'];
        $Edict['PRODIUCED_STOCK_STR']       = $rows['PRODIUCED_STOCK']      == NULL ? "" : $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['PRODIUCED_STOCK'], "C/S", "BTL");
        
        $Edict['LOST_STOCK']                = $rows['LOST_STOCK']           == NULL ? "" : $rows['LOST_STOCK'];
        $Edict['LOST_STOCK_STR']            = $rows['LOST_STOCK']           == NULL ? "" : $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['LOST_STOCK'], "C/S", "BTL");
        
        $Edict['CLOSEING_STOCK']            = $rows['CLOSEING_STOCK']       == NULL ? "" : $rows['CLOSEING_STOCK'];
        $Edict['CLOSEING_STOCK_STR']        = $rows['CLOSEING_STOCK']       == NULL ? "" : $_Stock_Fectory->getStockInString($rows['BOTTLES_PER_CASE'], $rows['CLOSEING_STOCK'], "C/S", "BTL");
        
        $Edict['USER_ITEM_STATUS']          = $rows['USER_ITEM_STATUS']     == NULL ? "" : $rows['USER_ITEM_STATUS'];
        $Edict['CREATE_ON']                 = $rows['CREATE_ON']            == NULL ? "" : $rows['CREATE_ON'];
        $Edict['CREATE_BY']                 = $rows['CREATE_BY']            == NULL ? "" : $rows['CREATE_BY'];
        $Edict['MODIFY_ON']                 = $rows['MODIFY_ON']            == NULL ? "" : $rows['MODIFY_ON'];
        $Edict['MODIFY_BY']                 = $rows['MODIFY_BY']            == NULL ? "" : $rows['MODIFY_BY'];                    
        
        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>