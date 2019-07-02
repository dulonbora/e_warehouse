<?php
error_reporting(0);
include_once '../classes/Brand__Packing.php';


$response = array(); 
$response['SUCCESS'] = 0;

$__bra = new Brand__Packing();

$_id = filter_input(INPUT_POST , 'ID');
$_fyear = filter_input(INPUT_POST , 'FYEAR');
$_master_id = filter_input(INPUT_POST , 'MASTER_ID');
$_bottles_per_case = filter_input(INPUT_POST , 'BOTTLES_PER_CASE');
$_ml_per_case = filter_input(INPUT_POST , 'ML_PER_CASE');
$_bl_per_case = filter_input(INPUT_POST , 'BL_PER_CASE');
$_lpl_per_case = filter_input(INPUT_POST , 'LPL_PER_CASE');
$_lpl_per_bottle = filter_input(INPUT_POST , 'LPL_PER_BOTTLE');
$_w_cost_price = filter_input(INPUT_POST , 'W_COST_PRICE');
$_w_cost_price_per_bottle = filter_input(INPUT_POST , 'W_COST_PRICE_PER_BOTTLE');
$_r_cost_price = filter_input(INPUT_POST , 'R_COST_PRICE');
$_r_cost_price_per_bottle = filter_input(INPUT_POST , 'R_COST_PRICE_PER_BOTTLE');
$_avd_amount = filter_input(INPUT_POST , 'AVD_AMOUNT');
$_avd_amount_per_bottle = filter_input(INPUT_POST , 'AVD_AMOUNT_PER_BOTTLE');
$_tff_amount = filter_input(INPUT_POST , 'TFF_AMOUNT');
$_tff_per_bottle = filter_input(INPUT_POST , 'TFF_PER_BOTTLE');
$_import_fee = filter_input(INPUT_POST , 'IMPORT_FEE');
$_export_fee = filter_input(INPUT_POST , 'EXPORT_FEE');
$_vat = filter_input(INPUT_POST , 'VAT');
$_vat_per_bottle = filter_input(INPUT_POST , 'VAT_PER_BOTTLE');
$_landed_to_wholesale = filter_input(INPUT_POST , 'LANDED_TO_WHOLESALE');
$_wholesale_margin_percentage = filter_input(INPUT_POST , 'WHOLESALE_MARGIN_PERCENTAGE');
$_wholesale_margin_case = filter_input(INPUT_POST , 'WHOLESALE_MARGIN_CASE');
$_wholesale_margin_bottle = filter_input(INPUT_POST , 'WHOLESALE_MARGIN_BOTTLE');
$_landed_to_retail = filter_input(INPUT_POST , 'LANDED_TO_RETAIL');
$_retail_margin_percentage = filter_input(INPUT_POST , 'RETAIL_MARGIN_PERCENTAGE');
$_retail_margin_case = filter_input(INPUT_POST , 'RETAIL_MARGIN_CASE');
$_retail_margin_bottle = filter_input(INPUT_POST , 'RETAIL_MARGIN_BOTTLE');
$_mrp = filter_input(INPUT_POST , 'MRP');
$_mrp_per_bottle = filter_input(INPUT_POST , 'MRP_PER_BOTTLE');
$_minimum_adv = filter_input(INPUT_POST , 'MINIMUM_ADV');
$_excise_duty = filter_input(INPUT_POST , 'EXCISE_DUTY');
$_gallonage_fee = filter_input(INPUT_POST , 'GALLONAGE_FEE');
$_bootle_type = filter_input(INPUT_POST , 'BOOTLE_TYPE');
$_is_mono_cartoon = filter_input(INPUT_POST , 'IS_MONO_CARTOON');
$_status = 0;
$_apply_from = filter_input(INPUT_POST , 'APPLY_FROM');


$__bra->setFyear($_fyear);
$__bra->setMaster_id($_master_id);
$__bra->setBottles_per_case($_bottles_per_case);
$__bra->setMl_per_case($_ml_per_case);
$__bra->setBl_per_case($_bl_per_case);
$__bra->setLpl_per_case($_lpl_per_case);
$__bra->setLpl_per_bottle($_lpl_per_bottle);
//$__bra->setW_cost_price($_w_cost_price);
//$__bra->setW_cost_price_per_bottle($_w_cost_price_per_bottle);
//$__bra->setR_cost_price($_r_cost_price);
//$__bra->setR_cost_price_per_bottle($_r_cost_price_per_bottle);
$__bra->setAvd_amount($_avd_amount);
$__bra->setAvd_amount_per_bottle($_avd_amount_per_bottle);
$__bra->setTff_amount($_tff_amount);
$__bra->setTff_per_bottle($_tff_per_bottle);
$__bra->setImport_fee($_import_fee);
$__bra->setExport_fee($_export_fee);
$__bra->setVat($_vat);
$__bra->setVat_per_bottle($_vat_per_bottle);
//$__bra->setLanded_to_wholesale($_landed_to_wholesale);
//$__bra->setWholesale_margin_percentage($_wholesale_margin_percentage);
//$__bra->setWholesale_margin_case($_wholesale_margin_case);
//$__bra->setWholesale_margin_bottle($_wholesale_margin_bottle);
//$__bra->setLanded_to_retail($_landed_to_retail);
//$__bra->setRetail_margin_percentage($_retail_margin_percentage);
//$__bra->setRetail_margin_case($_retail_margin_case);
//$__bra->setRetail_margin_bottle($_retail_margin_bottle);
$__bra->setMrp($_mrp);
$__bra->setMrp_per_bottle($_mrp_per_bottle);
$__bra->setMinimum_adv($_minimum_adv);
$__bra->setExcise_duty($_excise_duty);
$__bra->setGallonage_fee($_gallonage_fee);
$__bra->setBootle_type($_bootle_type);
$__bra->setIs_mono_cartoon($_is_mono_cartoon);
$__bra->setStatus($_status);
$__bra->setApply_from($_apply_from);

if($_id==0){if($__bra->Insert()==1){$response['SUCCESS'] = 1;}}
 else {
    if($__bra->Update($_id)==1){$response['SUCCESS'] = 1;}
}


echo json_encode($response);
exit();
