<?php

ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

require_once('../classes/Brand__List__User_View.php');
$_userItem = new Brand__List__User_View();

require_once('../classes/Brand__Master.php');
$_brandMaster = new Brand__Master();

require_once('../classes/Brand__Packing.php');
$_brandPacking = new Brand__Packing();

require_once('../classes/Stock_Fectory.php');
$_Stock_Fectory = new Stock_Fectory();

$_id = filter_input(INPUT_GET , "i");

$response = array();
$response["SUCCESS"] = 0;


$Result = $_userItem->LoadValue($_id);
$_brandMaster->LoadValue($_userItem->getItem_id());
$_brandPacking->LoadValue($_userItem->getPacking_id());
    $response['CONTENTS'] = array();
if ($Result > 0) {
    $Edict = array();
 
        $Edict['ID']                        = $_userItem->getId();
        $Edict['ITEM_ID']                   = $_userItem->getItem_id()               == NULL ? "" : $_userItem->getId();;
        $Edict['PACKING_ID']                = $_userItem->getPacking_id()            == NULL ? "" : $_userItem->getItem_id();
        $Edict['USER_ID']                   = $_userItem->getUser_id()               == NULL ? "" : $_userItem->getPacking_id();
        $Edict['NAME']                      = $_userItem->getName()                  == NULL ? "" : $_userItem->getName();
        $Edict['BOTTLES_PER_CASE']          = $_userItem->getBottles_per_case()      == NULL ? "" : $_userItem->getBottles_per_case();
        $Edict['ML_PER_CASE']               = $_userItem->getMl_per_case()           == NULL ? "" : $_userItem->getMl_per_case();
        $Edict['MRP']                       = $_userItem->getMrp()                   == NULL ? "" : $_userItem->getMrp();
        $Edict['MRP_PER_BOTTLE']            = $_userItem->getMrp_per_bottle()        == NULL ? "" : $_userItem->getMrp_per_bottle();
        $Edict['AVD_AMOUNT']                = $_userItem->getAvd_amount()            == NULL ? "" : $_userItem->getAvd_amount();
        $Edict['AVD_AMOUNT_PER_BOTTLE']     = $_userItem->getAvd_amount_per_bottle() == NULL ? "" : $_userItem->getAvd_amount_per_bottle();
        $Edict['VAT']                       = $_userItem->getVat()                   == NULL ? "" : $_userItem->getVat();
        $Edict['VAT_PER_BOTTLE']            = $_userItem->getVat_per_bottle()        == NULL ? "" : $_userItem->getVat_per_bottle();
        $Edict['TPF']                       = $_brandPacking->getTff_amount()        == NULL ? "" : $_brandPacking->getTff_amount();
        $Edict['IPF']                       = $_brandPacking->getImport_fee()        == NULL ? "" : $_brandPacking->getImport_fee();
        $Edict['EPF']                       = $_brandPacking->getExport_fee()        == NULL ? "" : $_brandPacking->getExport_fee();
        $Edict['LPL']                       = $_brandPacking->getLpl_per_case()      == NULL ? "" : $_brandPacking->getLpl_per_case();
        $Edict['W_COST_MRP']                = $_brandPacking->getW_cost_price()      == NULL ? "" : $_brandPacking->getW_cost_price();
        $Edict['W_COST_PRICE_PER_BOTTLE']   = $_brandPacking->getW_cost_price_per_bottle()== NULL ? "" : $_brandPacking->getW_cost_price_per_bottle();
        $Edict['R_COST_MRP']                = $_brandPacking->getR_cost_price()      == NULL ? "" : $_brandPacking->getR_cost_price();
        $Edict['R_COST_PRICE_PER_BOTTLE']   = $_brandPacking->getR_cost_price_per_bottle()== NULL ? "" : $_brandPacking->getR_cost_price_per_bottle();
        $Edict['BL_PER_CASE']               = $_brandPacking->getBl_per_case()       == NULL ? "" : $_brandPacking->getBl_per_case();

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
}
echo json_encode($response);
?>