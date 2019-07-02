<?php
error_reporting(0);

ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

include '../classes/Ena__Transfar.php';
include '../classes/Ena__User__Item.php';
include '../classes/Transfar_Master.php';

$response = array(); 
$response['SUCCESS'] = 0;

$__ena              = new Ena__Transfar();
$__ena_user         = new Ena__User__Item();
$__Transfar_Master  = new Transfar_Master();

$_master_id = filter_input(INPUT_POST , 'MASTER_ID');
$_user_item_id = filter_input(INPUT_POST , 'USER_ITEM_ID');
$_item_id = filter_input(INPUT_POST , 'ITEM_ID');
$_user_from = $userId;
//$_user_from = 0;
//$_user_from = filter_input(INPUT_POST , 'USER_FROM');
$_user_to = filter_input(INPUT_POST , 'USER_TO');
$_too = $_user_to == NULL ? "SELF" : "OTHER";
$_io_type           = "C";

$_mode = "PRODUCTION";
$_trank_no = filter_input(INPUT_POST , 'TRANK_NO');
$_permit_id = 0;
//$_permit_id = filter_input(INPUT_POST , 'PERMIT_ID');
$_total_fee = filter_input(INPUT_POST , 'FEE');
$_bl = filter_input(INPUT_POST , 'BL');
$_longdate = time();
$_status = $_io_type == "P" ? 0 : 1;
$_create_on = time();
$_create_by = $userId;
$_modify_on = time();
$_modify_by = $userId;
$_is_active = "YES";


$__ena_user->LoadValue($_user_item_id);

$_total_mrp = $__ena_user->getMrp() * $_bl;
$_total_vat = ($_total_mrp/100)*$__ena_user->getTax_percentage();
$_tcs = $_total_mrp/100;
$_total_cost = $_total_mrp;
$_total_amount = $_total_mrp+$_total_vat+$_tcs;


$__ena->setMaster_id($_master_id);
$__ena->setItem_id($_item_id);
$__ena->setUser_item_id($_user_item_id);
$__ena->setUser_from($_user_from);
$__ena->setUser_to($_user_to);
$__ena->setToo($_too);
$__ena->setMode($_mode == NULL ? "PRODUCTION" : $__ena->GenerateMode($_mode));
$__ena->setTrank_no($_trank_no == NULL ? "" : $_trank_no);
$__ena->setPermit_id($_permit_id == NULL ? 0 : $_permit_id);
$__ena->setBl($_bl);

$__ena->setIo_type($_io_type);

$__ena->setTotal_cost($_total_cost);
$__ena->setTotal_fee($_total_fee);
$__ena->setTotal_vat($_total_vat);
$__ena->setTcs($_tcs);
$__ena->setTotal_mrp($_total_mrp);
$__ena->setTotal_amount($_total_amount);

if($__ena->Insert()==1){
    $__Transfar_Master->setItem_total(1);
    $__Transfar_Master->setAvd_amount(0);
    $__Transfar_Master->setPass_amount($_total_fee);
    $__Transfar_Master->setVat_amount($_total_vat);
    $__Transfar_Master->setCost_price($_total_cost);
    $__Transfar_Master->setTotal_tcs($_tcs);
    $__Transfar_Master->setGrand_total($_total_amount);
    $__Transfar_Master->setId($_master_id);
    if($__Transfar_Master->UpdateFromEnaConsignment()==1){
        $response['SUCCESS'] = 1;
        
    }
    }

echo json_encode($response);
exit();