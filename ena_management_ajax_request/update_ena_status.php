<?php
error_reporting(0);
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

include '../classes/Ena__Transfar.php';
include '../classes/Ena__User__Item.php';
$__ena              = new Ena__Transfar();
$__Ena__User__Item  = new Ena__User__Item();

$_id                = filter_input(INPUT_POST , 'i');
$_status            = filter_input(INPUT_POST , 's');

$__ena->LoadValue($_id);

$response = array(); 
$response['SUCCESS'] = 0;

$__ena->setModify_on(time());
$__ena->setModify_by($userId);


if($__ena->UpdateStatus($_id, "X", $_status)==1){
        if($__Ena__User__Item->UpdateStockProuction($__ena->getUser_item_id(), $__ena->getBl())==1){$response['SUCCESS'] = 1;}
    }

echo json_encode($response);
exit();