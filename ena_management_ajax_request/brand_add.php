<?php

error_reporting(0);
ob_start();

if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

include '../classes/Ena__User__Item.php';
include '../classes/Ena__Transfar.php';

$response = array(); 
$response['SUCCESS'] = 0;

$__ena              = new Ena__User__Item();
$__Ena__Transfar    = new Ena__Transfar();

$_item_id               = filter_input(INPUT_POST , 'ITEM_ID');
$_user_id               = $userId;
$_opening_stock         = filter_input(INPUT_POST , 'OPENING_STOCK');
$_tax_percentage        = filter_input(INPUT_POST , 'TAX_PERCENTAGE');
$_mrp                   = filter_input(INPUT_POST , 'MRP');
$_inward_stock          = 0;
$_outward_stock         = 0;
$_prodiucting_stock     = 0;
$_prodiuced_stock       = 0;
$_lost_stock            = 0;
$_closeing_stock        = $_opening_stock;
$_create_on             = time();
$_create_by             = $_user_id;
$_is_active             = "";


$__ena->setItem_id($_item_id);
$__ena->setUser_id($_user_id);
$__ena->setOpening_stock($_opening_stock);
$__ena->setInward_stock($_inward_stock);
$__ena->setOutward_stock($_outward_stock);
$__ena->setProdiucting_stock($_prodiucting_stock);
$__ena->setProdiuced_stock($_prodiuced_stock);
$__ena->setLost_stock($_lost_stock);
$__ena->setCloseing_stock($_closeing_stock);
$__ena->setCreate_on($_create_on);
$__ena->setCreate_by($_create_by);
$__ena->setIs_active($_is_active);
$__ena->setMrp($_mrp);
$__ena->setTax_percentage($_tax_percentage);

if($__ena->ChecAlreadyExit($_item_id, $_user_id)==1){
    $response['SUCCESS'] = 2;
}
 else {
     
    

if($__ena->Insert()==1){
    
    $__Ena__Transfar->setItem_id($_item_id);
    $__Ena__Transfar->setUser_item_id($__ena->getId());
    $__Ena__Transfar->setUser_from($_user_id);
    $__Ena__Transfar->setUser_to($_user_id);
    $__Ena__Transfar->setToo("");
    $__Ena__Transfar->setMode("OPENING STOCK");
    $__Ena__Transfar->setTrank_no("");
    $__Ena__Transfar->setPermit_id(0);
    $__Ena__Transfar->setBl($_opening_stock);
    $__Ena__Transfar->setLongdate($_create_on);
    $__Ena__Transfar->setStatus(1);
    $__Ena__Transfar->setCreate_on(time());
    $__Ena__Transfar->setCreate_by($_user_id);
    $__Ena__Transfar->setModify_on(time());
    $__Ena__Transfar->setModify_by($_user_id);
    $__Ena__Transfar->setIs_active("YES");
    $__Ena__Transfar->setIo_type("OS");
    if($__Ena__Transfar->Insert()==1){
    $response['SUCCESS'] = 1;
    }
    }
}


echo json_encode($response);
exit();





?>