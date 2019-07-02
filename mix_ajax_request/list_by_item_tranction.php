<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'];
//$userId = $_SESSION['user'] == NULL ? "" : $_SESSION['user'];


require_once('../classes/Mix__Item__Transfar.php');
require_once('../classes/Mix__Item__List__View.php');
require_once('../classes/Stock_Fectory.php');
require_once('../classes/DateSetter.php');
$_mix = new Mix__Item__Transfar();
$_mix_v = new Mix__Item__List__View();
$_Stock_Fectory = new Stock_Fectory();
$_DateSetter = new DateSetter();

$_item_id = filter_input(INPUT_GET , "i");

$response = array();
$response["SUCCESS"] = 0;


$TotalRow = $_mix->TotalCountByItemId($_item_id);
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['p']) ? 1 : $_GET['p']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_mix->loadAllPaggingByItemId($_item_id, $start, $limit);


if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        $_mix_v->LoadValue($rows['USER_ITEM_ID']);
        $Edict['ID']                    = $rows['ID']                   == NULL ? 0 : $rows['ID'] ;
        $Edict['ITEM_ID']               = $rows['ITEM_ID']              == NULL ? 0 : $rows['ITEM_ID'] ;
        $Edict['USER_ITEM_ID']          = $rows['USER_ITEM_ID']         == NULL ? 0 : $rows['USER_ITEM_ID'] ;
        $Edict['USER_FROM']             = $rows['USER_FROM']            == NULL ? 0 : $rows['USER_FROM'] ;
        $Edict['USER_TO']               = $rows['USER_TO']              == NULL ? 0 : $rows['USER_TO'] ;
        $Edict['TOO']                   = $rows['TOO']                  == NULL ? "" : $rows['TOO'] ;
        $Edict['IO_TYPE']               = $rows['IO_TYPE']              == NULL ? "" : $rows['IO_TYPE'] ;
        $Edict['MODE']                  = $rows['MODE']                 == NULL ? "" : $rows['MODE'] ;
        $Edict['TRANK_NO']              = $rows['TRANK_NO']             == NULL ? "" : $rows['TRANK_NO'] ;
        $Edict['PERMIT_ID']             = $rows['PERMIT_ID']            == NULL ? 0 : $rows['PERMIT_ID'] ;
        $Edict['TYPE']                  = $rows['TYPE']                 == NULL ? "" : $rows['TYPE'] ;
        $Edict['NOTE']                  = $rows['NOTE']                 == NULL ? "" : $rows['NOTE'] ;
        $Edict['QNTY']                  =  $_Stock_Fectory->getStockInString($_mix_v->getSubUnitValue(), 
                                           $rows['IN_SUBUNIT'],
                                           $_mix_v->getUnit(),
                                           $_mix_v->getSubUnit());
        $Edict['UNIT']                  = $_mix_v->getUnit()            == NULL ? "" : $_mix_v->getUnit() ;
        $Edict['IN_UNIT']               = $rows['IN_UNIT']              == NULL ? 0 : $rows['IN_UNIT'] ;
        $Edict['IN_SUBUNIT']            = $rows['IN_SUBUNIT']           == NULL ? 0 : $rows['IN_SUBUNIT'] ;
        $Edict['SUBUNIT']               = $_mix_v->getSubUnit()         == NULL ? "" : $_mix_v->getSubUnit() ;
        $Edict['LONGDATE']              = $_DateSetter->date($rows['LONGDATE'])== NULL ? 0 : $_DateSetter->date($rows['LONGDATE']) ;
        $Edict['STATUS']                = $rows['STATUS'] == 0 ? "PRODUCING" : "PRODUCED";
        $Edict['CREATE_ON']             = $rows['CREATE_ON']            == NULL ? 0 : $rows['CREATE_ON'] ;
        $Edict['CREATE_BY']             = $rows['CREATE_BY']            == NULL ? 0 : $rows['CREATE_BY'] ;
        $Edict['MODIFY_ON']             = $rows['MODIFY_ON']            == NULL ? 0 : $rows['MODIFY_ON'] ;
        $Edict['MODIFY_BY']             = $rows['MODIFY_BY']            == NULL ? 0 : $rows['MODIFY_BY'] ;
        $Edict['IS_ACTIVE']             = $rows['IS_ACTIVE']            == NULL ? "" : $rows['IS_ACTIVE'] ;

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
//echo $TotalRow;

?>