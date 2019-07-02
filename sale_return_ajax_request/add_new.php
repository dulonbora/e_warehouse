<?php
include '../classes/Sale__Master.php';

$response = array(); 
$response["SUCCESS"] = 0;

$__sal = new Sale__Master();

$_user_id = filter_input(INPUT_POST , "USER_ID");
$_longdate = filter_input(INPUT_POST , "LONGDATE");
$_total_item = filter_input(INPUT_POST , "TOTAL_ITEM");
$_total_adv = filter_input(INPUT_POST , "TOTAL_ADV");
$_total_fee = filter_input(INPUT_POST , "TOTAL_FEE");
$_total_vat = filter_input(INPUT_POST , "TOTAL_VAT");
$_mrp_value = filter_input(INPUT_POST , "MRP_VALUE");
$_total_bl = filter_input(INPUT_POST , "TOTAL_BL");
$_total_lpl = filter_input(INPUT_POST , "TOTAL_LPL");
$_is_converted = filter_input(INPUT_POST , "IS_CONVERTED");
$_status = filter_input(INPUT_POST , "STATUS");
$_create_by = filter_input(INPUT_POST , "CREATE_BY");
$_create_on = filter_input(INPUT_POST , "CREATE_ON");
$_modify_on = filter_input(INPUT_POST , "MODIFY_ON");
$_modify_by = filter_input(INPUT_POST , "MODIFY_BY");
$_is_active = filter_input(INPUT_POST , "IS_ACTIVE");


$__sal->setUser_id($_user_id);
$__sal->setLongdate($_longdate);
$__sal->setTotal_item($_total_item);
$__sal->setTotal_adv($_total_adv);
$__sal->setTotal_fee($_total_fee);
$__sal->setTotal_vat($_total_vat);
$__sal->setMrp_value($_mrp_value);
$__sal->setTotal_bl($_total_bl);
$__sal->setTotal_lpl($_total_lpl);
$__sal->setIs_converted($_is_converted);
$__sal->setStatus($_status);
$__sal->setCreate_by($_create_by);
$__sal->setCreate_on($_create_on);
$__sal->setModify_on($_modify_on);
$__sal->setModify_by($_modify_by);
$__sal->setIs_active($_is_active);

if($__sal->Insert()==1){$response["SUCCESS"] = 1;}

echo json_encode($response);
exit();

?>