<?php


error_reporting(0);
ob_start();

if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

include '../classes/Masage.php';
include '../classes/Ena__Transfar.php';
include '../classes/Ena__User__Item.php';

$response = array();
$response["SUCCESS"] = 0;

$__mas                  = new Masage();
$__Ena__Transfar        = new Ena__Transfar();
$__Ena__User__Item      = new Ena__User__Item();



$_user_id           = $userId;
$_to_user_id        = filter_input(INPUT_GET, "TO_USER_ID");
$_district_id       = 1;
//$_district_id     = filter_input(INPUT_GET, "DISTRICT_ID");
$_module_type       = filter_input(INPUT_GET, "MODULE_TYPE");
$_module_ids        = filter_input(INPUT_GET, "MODULE_IDS");
$_massage_type      = filter_input(INPUT_GET, "MASSAGE_TYPE");
$_note              = filter_input(INPUT_GET, "NOTE");
$_designation       = filter_input(INPUT_GET, "DESIGNATION");
$_action            = filter_input(INPUT_GET, "ACTION");
$_status            = 0;
$_create_on         = time();
$_create_by         = $userId;
$_modify_on         = time();
$_modify_by         = $userId;
$_is_active         = "YES";


$__mas->setUser_id($_user_id);
$__mas->setTo_user_id($_to_user_id);
$__mas->setDistrict_id($_district_id);
$__mas->setModule_type($_module_type);
$__mas->setModule_ids($_module_ids);
$__mas->setMassage_type($_massage_type);
$__mas->setNote($_note);
$__mas->setDesignation($_designation == "" ? "" : $_designation);
$__mas->setAction($_action);
$__mas->setStatus($_status);
$__mas->setCreate_on($_create_on);
$__mas->setCreate_by($_create_by);
$__mas->setModify_on($_modify_on);
$__mas->setModify_by($_modify_by);
$__mas->setIs_active($_is_active);


$__Ena__Transfar->LoadValue($_module_ids);


if($__mas->Insert()==1){
    
    if($_action==5){        
        
        if($__Ena__Transfar->UpdateStatus($_module_ids, $__Ena__Transfar->getIo_type(), $_action)==1){
        }
        
    }
    $response["SUCCESS"] = 1;
    
    
}

echo json_encode($response);
exit();
?>