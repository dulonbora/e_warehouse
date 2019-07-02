<?php

ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? "" : $_SESSION['id'];

require_once('../classes/Transfar_Master.php');
require_once('../classes/DateSetter.php');
require_once('../classes/Company.php');
$_transfar      = new Transfar_Master();
$_DateSetter    = new DateSetter();
$_Company       = new Company();


$response = array();
$response["SUCCESS"] = 0;


$TotalRow = $_transfar->TotalCountByUser($userId, "SALE");
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_transfar->loadAllPaggingByUserId($userId, "SALE", $start, $limit);


if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {

        $Edict['ID']                = $rows['ID']                   == NULL ? 0 : $rows['ID'] ;
        $Edict['USER_FROM']         = $rows['USER_FROM']            == NULL ? "" : $rows['USER_FROM'] ;
        $Edict['USER_FROM_NAME']      = $rows['USER_FROM']              == NULL ? "" : $_Company->returnCompanyName($rows['USER_FROM']) ;
        $Edict['USER_TO']           = $rows['USER_TO']              == NULL ? "" : $rows['USER_TO'] ;
        $Edict['TOO']               = $rows['TOO']                  == NULL ? "" : $rows['TOO'] ;
        $Edict['CONSIGNMENT_NO']    = $rows['ID']                   == NULL ? "" : $rows['FYEAR']."/".$rows['FYEAR'] ;
        $Edict['FYEAR']             = $rows['FYEAR']                == NULL ? "" : $rows['FYEAR'] ;
        $Edict['VCH_TYPE']          = $rows['VCH_TYPE']             == NULL ? "" : $rows['VCH_TYPE'] ;
        $Edict['SL_NO']             = $rows['SL_NO']                == NULL ? 0 : $rows['SL_NO'] ;
        $Edict['MODE']              = $rows['MODE']                 == NULL ? "" : $rows['MODE'] ;
        $Edict['VOUCHER_NO']        = $rows['VOUCHER_NO']           == NULL ? "" : $rows['VOUCHER_NO'] ;
        $Edict['LONGDATE']          = $_DateSetter->date($rows['LONGDATE']) == NULL ? 0 : $_DateSetter->date($rows['LONGDATE']);
        $Edict['ORDER_NO']          = $rows['ORDER_NO']             == NULL ? "" : $rows['ORDER_NO'] ;
        $Edict['ORDER_DATE']        = $rows['ORDER_DATE']           == NULL ? "" : $rows['ORDER_DATE'] ;
        $Edict['BILL_NO']           = $rows['BILL_NO']              == NULL ? "" : $rows['BILL_NO'] ;
        $Edict['BILL_DATE']         = $rows['BILL_DATE']            == NULL ? "" : $rows['BILL_DATE'] ;
        $Edict['CONVERTED']         = $rows['CONVERTED']            == NULL ? "" : $rows['CONVERTED'] ;
        $Edict['DELIVERY_MODE']     = $rows['DELIVERY_MODE']        == NULL ? "" : $rows['DELIVERY_MODE'] ;
        $Edict['DELIVERY_NOTE']     = $rows['DELIVERY_NOTE']        == NULL ? "" : $rows['DELIVERY_NOTE'] ;
        $Edict['OTHER_NOTE']        = $rows['OTHER_NOTE']           == NULL ? "" : $rows['OTHER_NOTE'] ;
        $Edict['ITEM_TOTAL']        = $rows['ITEM_TOTAL']           == NULL ? 0 : $rows['ITEM_TOTAL'] ;
        $Edict['AVD_AMOUNT']        = $rows['AVD_AMOUNT']           == NULL ? 0 : $rows['AVD_AMOUNT'] ;
        $Edict['AVD_AMOUNT_STATUS'] = $rows['AVD_AMOUNT_STATUS']    == NULL ? 0 : $rows['AVD_AMOUNT_STATUS'] ;
        $Edict['PASS_AMOUNT']       = $rows['PASS_AMOUNT']          == NULL ? 0 : $rows['PASS_AMOUNT'] ;
        $Edict['PASS_AMOUNT_STATUS']= $rows['PASS_AMOUNT_STATUS']   == NULL ? 0 : $rows['PASS_AMOUNT_STATUS'] ;
        $Edict['VAT_AMOUNT']        = $rows['VAT_AMOUNT']           == NULL ? 0 : $rows['VAT_AMOUNT'] ;
        $Edict['VAT_AMOUNT_STATUS'] = $rows['VAT_AMOUNT_STATUS']    == NULL ? 0 : $rows['VAT_AMOUNT_STATUS'] ;
        $Edict['COST_PRICE']        = $rows['COST_PRICE']           == NULL ? 0 : $rows['COST_PRICE'] ;
        $Edict['COST_PRICE_STATUS'] = $rows['COST_PRICE_STATUS']    == NULL ? 0 : $rows['COST_PRICE_STATUS'] ;
        $Edict['TOTAL_TCS']         = $rows['TOTAL_TCS']            == NULL ? 0 : $rows['TOTAL_TCS'] ;
        $Edict['OTHER_CHARGE']      = $rows['OTHER_CHARGE']         == NULL ? 0 : $rows['OTHER_CHARGE'] ;
        $Edict['CHARGED_AMOUNT']    = $rows['CHARGED_AMOUNT']       == NULL ? 0 : $rows['CHARGED_AMOUNT'] ;
        $Edict['ADJUSTMENT']        = $rows['ADJUSTMENT']           == NULL ? 0 : $rows['ADJUSTMENT'] ;
        $Edict['GRAND_TOTAL']       = $rows['GRAND_TOTAL']          == NULL ? 0 : $rows['GRAND_TOTAL'] ;
        $Edict['CREATE_BY']         = $rows['CREATE_BY']            == NULL ? "" : $rows['CREATE_BY'] ;
        $Edict['CREATE_ON']         = $_DateSetter->date($rows['CREATE_ON']) == NULL ? 0 : $_DateSetter->date($rows['CREATE_ON']);
        $Edict['MODIFY_BY']         = $rows['MODIFY_BY']            == NULL ? "" : $rows['MODIFY_BY'] ;
        $Edict['MODIFY_ON']         = $rows['MODIFY_ON']            == NULL ? 0 : $rows['MODIFY_ON'] ;
        $Edict['STATUS']            = $rows['STATUS']               == NULL ? 0 : $rows['STATUS'] ;
        $Edict['STATUS_STR']        = $rows['STATUS']               == NULL ? 0 : $_transfar->Status($rows['STATUS']) ;
        $Edict['IS_ACTIVE']         = $rows['IS_ACTIVE']            == NULL ? 0 : $rows['IS_ACTIVE'] ;
        
        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>