<?php

ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

require_once('../classes/Ena__User__Item.php');
require_once('../classes/Ena__Item__List.php');

$_Ena__User__Item       = new Ena__User__Item();
$_Ena__Item__List       = new Ena__Item__List();
$_id                    = filter_input(INPUT_GET , "i");

$response               = array();
$response["SUCCESS"]    = 0;

$Result                 = $_Ena__User__Item->LoadValue($_id);
$_Ena__Item__List->LoadValue($_Ena__User__Item->getItem_id());

$response['CONTENTS']   = array();


if ($Result > 0) {
    $Edict = array();
 
        $Edict['ID']                        = $_Ena__User__Item->getId();
        $Edict['ITEM_ID']                   = $_Ena__User__Item->getItem_id()        == NULL ? "" : $_Ena__User__Item->getItem_id();
        $Edict['USER_ID']                   = $_Ena__User__Item->getUser_id()        == NULL ? "" : $_Ena__User__Item->getUser_id();
        
        $Edict['ITEM_NAME']                 = $_Ena__Item__List->getItem_name()      == NULL ? "" : $_Ena__Item__List->getItem_name();
        $Edict['MRP']                       = $_Ena__User__Item->getMrp()            == NULL ? "" : $_Ena__User__Item->getMrp();
        $Edict['TAX_PERCENTAGE']            = $_Ena__User__Item->getTax_percentage() == NULL ? "" : $_Ena__User__Item->getTax_percentage();
        $Edict['CLOSEING_STOCK']            = $_Ena__User__Item->getCloseing_stock() == NULL ? "" : $_Ena__User__Item->getCloseing_stock();
        
        $Edict['I_FEE']                     = $_Ena__Item__List->getI_fee()          == NULL ? "" : $_Ena__Item__List->getI_fee();
        $Edict['T_FEE']                     = $_Ena__Item__List->getT_fee()          == NULL ? "" : $_Ena__Item__List->getT_fee();
        $Edict['E_FEE']                     = $_Ena__Item__List->getE_fee()          == NULL ? "" : $_Ena__Item__List->getE_fee();
 
        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
}
echo json_encode($response);
?>