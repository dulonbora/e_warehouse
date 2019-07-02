<?php
error_reporting(0);
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

include_once '../classes/Transfar_Item.php';
include_once '../classes/Brand__List__User_View.php';
include_once '../classes/Transfar_Master_Updater.php';

$response = array();
$response['SUCCESS'] = 0;

$__tra                  = new Transfar_Item();
$__brand                = new Brand__List__User_View();
$__traMasterUpdate      = new Transfar_Master_Updater();


$_master_id = filter_input(INPUT_POST, 'MASTER_ID');
$_user_item_id = filter_input(INPUT_POST, 'USER_ITEM_ID');


$__brand->LoadValue($_user_item_id);

$_item_id = $__brand->getItem_id();
$_packing_id = $__brand->getPacking_id();
$_unit = filter_input(INPUT_POST, 'UNIT');
$_packing_size = $__brand->getMl_per_case();
$_total_case = filter_input(INPUT_POST, 'TOTAL_CASE');
$_io = 'C';
$_total_bottle = filter_input(INPUT_POST, 'TOTAL_BOTTLE');
$_total_bl = filter_input(INPUT_POST, 'TOTAL_BL');
$_total_lpl = filter_input(INPUT_POST, 'TOTAL_LPL');
$_total_cost = filter_input(INPUT_POST, 'TOTAL_COST');
$_total_adv = filter_input(INPUT_POST, 'TOTAL_ADV');
$_total_fee = filter_input(INPUT_POST, 'TOTAL_FEE');
$_total_vat = filter_input(INPUT_POST, 'TOTAL_VAT');
$_tcs = filter_input(INPUT_POST, 'TCS');
$_total_mrp = filter_input(INPUT_POST, 'TOTAL_MRP');
$_total_amount = $_total_cost + $_total_adv+$_total_fee+$_total_vat+$_tcs;


$__tra->setMaster_id($_master_id);
$__tra->setItem_id($_item_id);
$__tra->setPacking_id($_packing_id);
$__tra->setUser_item_id($_user_item_id);
$__tra->setUnit($_unit);
$__tra->setPacking_size($_packing_size);
$__tra->setTotal_case($_total_case);
$__tra->setTotal_bottle($_total_bottle);
$__tra->setTotal_bl($_total_bl);
$__tra->setTotal_lpl($_total_lpl);
$__tra->setTotal_cost($_total_cost);
$__tra->setTotal_adv($_total_adv);
$__tra->setTotal_fee($_total_fee);
$__tra->setTotal_vat($_total_vat);
$__tra->setTcs($_tcs);
$__tra->setIoType($_io);
$__tra->setTotal_mrp($_total_mrp);
$__tra->setTotal_amount($_total_amount);

if ($__tra->Insert() == 1) {

    if ($__traMasterUpdate->UpdateTotalInMaster($_master_id) == 1) {
        $response['SUCCESS'] = 1;
    } else {
        $response['SUCCESS'] = 0;
    }
}

echo json_encode($response);
exit();

