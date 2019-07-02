<?php

require_once('../classes/Brand__Packing.php');
$_brandMaster = new Brand__Packing();

$_id = filter_input(INPUT_GET , "i");

$response = array();
$response["SUCCESS"] = 0;


$Result = $_brandMaster->loadAllPagging($_id);

if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        $Edict['ID']                        = $rows['ID'];
        $Edict['FYEAR']                     = $rows['FYEAR']                == NULL ? "" : $rows['FYEAR'];
        $Edict['MASTER_ID']                 = $rows['MASTER_ID']            == NULL ? "" : $rows['MASTER_ID'];
        $Edict['BOTTLES_PER_CASE']          = $rows['BOTTLES_PER_CASE']     == NULL ? "" : $rows['BOTTLES_PER_CASE'];
        $Edict['ML_PER_CASE']               = $rows['ML_PER_CASE']          == NULL ? "" : $rows['ML_PER_CASE'];
        $Edict['BL_PER_CASE']               = $rows['BL_PER_CASE']          == NULL ? "" : $rows['BL_PER_CASE'];
        $Edict['LPL_PER_CASE']              = $rows['LPL_PER_CASE']         == NULL ? "" : $rows['LPL_PER_CASE'];
        $Edict['LPL_PER_BOTTLE']            = $rows['LPL_PER_BOTTLE']       == NULL ? "" : $rows['LPL_PER_BOTTLE'];
        $Edict['W_COST_PRICE']              = $rows['W_COST_PRICE']         == NULL ? "" : $rows['W_COST_PRICE'];
        $Edict['W_COST_PRICE_PER_BOTTLE']   = $rows['W_COST_PRICE_PER_BOTTLE']== NULL ? "" : $rows['W_COST_PRICE_PER_BOTTLE'];
        $Edict['R_COST_PRICE']              = $rows['R_COST_PRICE']           == NULL ? "" : $rows['R_COST_PRICE'];
        $Edict['R_COST_PRICE_PER_BOTTLE']   = $rows['R_COST_PRICE_PER_BOTTLE']== NULL ? "" : $rows['R_COST_PRICE_PER_BOTTLE'];
        $Edict['AVD_AMOUNT']                = $rows['AVD_AMOUNT']           == NULL ? "" : $rows['AVD_AMOUNT'];
        $Edict['AVD_AMOUNT_PER_BOTTLE']     = $rows['AVD_AMOUNT_PER_BOTTLE']== NULL ? "" : $rows['AVD_AMOUNT_PER_BOTTLE'];
        $Edict['TFF_AMOUNT']                = $rows['TFF_AMOUNT']           == NULL ? "" : $rows['TFF_AMOUNT'];
        $Edict['TFF_PER_BOTTLE']            = $rows['TFF_PER_BOTTLE']       == NULL ? "" : $rows['TFF_PER_BOTTLE'];
        $Edict['IMPORT_FEE']                = $rows['IMPORT_FEE']           == NULL ? "" : $rows['IMPORT_FEE'];
        $Edict['EXPORT_FEE']                = $rows['EXPORT_FEE']           == NULL ? "" : $rows['EXPORT_FEE'];
        $Edict['VAT']                       = $rows['VAT']                  == NULL ? "" : $rows['VAT'];
        $Edict['VAT_PER_BOTTLE']            = $rows['VAT_PER_BOTTLE']       == NULL ? "" : $rows['VAT_PER_BOTTLE'];
        $Edict['LANDED_TO_WHOLESALE']       = $rows['LANDED_TO_WHOLESALE']  == NULL ? "" : $rows['LANDED_TO_WHOLESALE'];
        $Edict['WHOLESALE_MARGIN_PERCENTAGE']= $rows['WHOLESALE_MARGIN_PERCENTAGE']== NULL ? "0" : $rows['WHOLESALE_MARGIN_PERCENTAGE'];
        $Edict['WHOLESALE_MARGIN_CASE']     = $rows['WHOLESALE_MARGIN_CASE']== NULL ? "" : $rows['WHOLESALE_MARGIN_CASE'];
        $Edict['WHOLESALE_MARGIN_BOTTLE']   = $rows['WHOLESALE_MARGIN_BOTTLE']== NULL ? "" : $rows['WHOLESALE_MARGIN_BOTTLE'];
        $Edict['LANDED_TO_RETAIL']          = $rows['LANDED_TO_RETAIL']     == NULL ? "" : $rows['LANDED_TO_RETAIL'];
        $Edict['RETAIL_MARGIN_PERCENTAGE']  = $rows['RETAIL_MARGIN_PERCENTAGE']== NULL ? "" : $rows['RETAIL_MARGIN_PERCENTAGE'];
        $Edict['RETAIL_MARGIN_CASE']        = $rows['RETAIL_MARGIN_CASE']   == NULL ? "" : $rows['RETAIL_MARGIN_CASE'];
        $Edict['RETAIL_MARGIN_BOTTLE']      = $rows['RETAIL_MARGIN_BOTTLE'] == NULL ? "" : $rows['RETAIL_MARGIN_BOTTLE'];
        $Edict['MRP']                       = $rows['MRP']                  == NULL ? "" : $rows['MRP'];
        $Edict['MRP_PER_BOTTLE']            = $rows['MRP_PER_BOTTLE']       == NULL ? "" : $rows['MRP_PER_BOTTLE'];
        $Edict['MINIMUM_ADV']               = $rows['MINIMUM_ADV']          == NULL ? "" : $rows['MINIMUM_ADV'];
        $Edict['EXCISE_DUTY']               = $rows['EXCISE_DUTY']          == NULL ? "" : $rows['EXCISE_DUTY'];
        $Edict['GALLONAGE_FEE']             = $rows['GALLONAGE_FEE']        == NULL ? "" : $rows['GALLONAGE_FEE'];
        $Edict['BOOTLE_TYPE']               = $rows['BOOTLE_TYPE']          == NULL ? "" : $rows['BOOTLE_TYPE'];
        $Edict['IS_MONO_CARTOON']           = $rows['IS_MONO_CARTOON']      == NULL ? "" : $rows['IS_MONO_CARTOON'];
        $Edict['STATUS']                    = $rows['STATUS']               == NULL ? "" : $rows['STATUS'];
        $Edict['IS_ACTIVE']                 = $rows['IS_ACTIVE']            == NULL ? "" : $rows['IS_ACTIVE'];
        $Edict['APPLY_FROM']                = $rows['APPLY_FROM']           == NULL ? "" : $rows['APPLY_FROM'];

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>