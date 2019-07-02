<?php

ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'];


require_once('../classes/Ledger_Account.php');
require_once('../classes/DateSetter.php');
$_Ledger_Account        = new Ledger_Account();
$_DateSetter            = new DateSetter();


$response = array();
$response["SUCCESS"] = 0;


$TotalRow = $_Ledger_Account->TotalCount($userId);
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_Ledger_Account->loadAllPagging($start, $limit, $userId);


if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {

        $Edict['ID']                = $rows['ID']                   == NULL ? 0 : $rows['ID'] ;
        $Edict['AC_VOUCHER_ID']     = $rows['AC_VOUCHER_ID']        == NULL ? 0 : $rows['AC_VOUCHER_ID'] ;
        $Edict['LONGDATE']          = $rows['LONGDATE']             == NULL ? 0 : $_DateSetter->date($rows['LONGDATE']) ;
        $Edict['SL_NO']             = $rows['SL_NO']                == NULL ? 0 : $rows['SL_NO'] ;
        $Edict['PARTICULARS']       = $rows['PARTICULARS']          == NULL ? 0 : $rows['PARTICULARS'] ;
        $Edict['NOTE']              = $rows['NOTE']                 == NULL ? 0 : $rows['NOTE'] ;
        $Edict['VOUCHER_ID']        = $rows['VOUCHER_ID']           == NULL ? 0 : $rows['VOUCHER_ID'] ;
        $Edict['VOUCHER_NO']        = $rows['VOUCHER_NO']           == NULL ? 0 : $rows['VOUCHER_NO'] ;
        $Edict['VOUCHER_TYPE']      = $rows['VOUCHER_TYPE']         == NULL ? 0 : $rows['VOUCHER_TYPE'] ;
        $Edict['LEDGER_ID']         = $rows['LEDGER_ID']            == NULL ? 0 : $rows['LEDGER_ID'] ;
        $Edict['CREDIT']            = $rows['CREDIT']               == NULL ? 0 : $rows['CREDIT'] ;
        $Edict['DEBIT']             = $rows['DEBIT']                == NULL ? 0 : $rows['DEBIT'] ;
        $Edict['CRDR']              = $rows['CRDR']                 == NULL ? 0 : $rows['CRDR'] ;
        $Edict['BALANCE']           = $rows['BALANCE']              == NULL ? 0 : $rows['BALANCE'] ;
        $Edict['STATUS']            = $rows['STATUS']               == NULL ? "" : $rows['STATUS']  == 1 ? "PENDING" : "PAID" ;
        $Edict['CREATE_ON']         = $rows['CREATE_ON']            == NULL ? 0 : $rows['CREATE_ON'] ;
        $Edict['CREATE_BY']         = $rows['CREATE_BY']            == NULL ? 0 : $rows['CREATE_BY'] ;
        $Edict['MODIFY_BY']         = $rows['MODIFY_BY']            == NULL ? 0 : $rows['MODIFY_BY'] ;
        $Edict['MODIFY_ON']         = $rows['MODIFY_ON']            == NULL ? 0 : $rows['MODIFY_ON'] ;
        $Edict['IS_ACTIVE']         = $rows['IS_ACTIVE']            == NULL ? 0 : $rows['IS_ACTIVE'] ;

        
        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>