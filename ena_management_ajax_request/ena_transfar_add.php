<?php
error_reporting(0);

ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

include '../classes/Ena__Transfar.php';
include '../classes/Ena__User__Item.php';

$response = array(); 
$response['SUCCESS'] = 0;

$__ena = new Ena__Transfar();
$__ena_user = new Ena__User__Item();

$_user_item_id = filter_input(INPUT_POST , 'USER_ITEM_ID');
$_item_id = $__ena->getMainItemId($_user_item_id);
$_user_from = $userId;
//$_user_from = 0;
//$_user_from = filter_input(INPUT_POST , 'USER_FROM');
$_user_to = NULL;
//$_user_to = filter_input(INPUT_POST , 'USER_TO');
$_too = $_user_to == NULL ? "SELF" : "OTHER";
$_io_type           = filter_input(INPUT_POST , "IO_TYPE");

$_mode = "PRODUCTION";
$_trank_no = filter_input(INPUT_POST , 'TRANK_NO');
$_permit_id = 0;
//$_permit_id = filter_input(INPUT_POST , 'PERMIT_ID');
$_bl = filter_input(INPUT_POST , 'BL');
$_longdate = time();
$_status = $_io_type == "P" ? 0 : 1;
$_create_on = time();
$_create_by = $userId;
$_modify_on = time();
$_modify_by = $userId;
$_is_active = "YES";


$__ena->setItem_id($_item_id);
$__ena->setUser_item_id($_user_item_id);
$__ena->setUser_from($_user_from);
$__ena->setUser_to($_user_to);
$__ena->setToo($_too);
$__ena->setMode($_mode == NULL ? "PRODUCTION" : $__ena->GenerateMode($_mode));
$__ena->setTrank_no($_trank_no == NULL ? "" : $_trank_no);
$__ena->setPermit_id($_permit_id == NULL ? 0 : $_permit_id);
$__ena->setBl($_bl);
$__ena->setLongdate($_longdate);
$__ena->setStatus($_status);
$__ena->setCreate_on(time());
$__ena->setCreate_by($_create_by);
$__ena->setModify_on(time());
$__ena->setModify_by($_modify_by);
$__ena->setIs_active($_is_active);
$__ena->setIo_type($_io_type);

if($__ena->Insert()==1){
    if($__ena_user->UpdateStock($_user_item_id, $_bl, $_io_type)==1){
        $response['SUCCESS'] = 1;
    }
    }

echo json_encode($response);
exit();