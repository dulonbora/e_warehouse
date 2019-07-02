<?php
error_reporting(0);

$id                         = filter_input(INPUT_GET, 'i');
$mid                        = filter_input(INPUT_GET, 'm');
include '../classes/Transfar_Item.php';
$Transfar_Item              = new Transfar_Item();
include '../classes/Transfar_Master_Updater.php';
$Transfar_Master_Updater    = new Transfar_Master_Updater();

$response                   = array();
$response['SUCCESS']        = 0;

if($Transfar_Item->Delete($id)==1){
    if($Transfar_Master_Updater->UpdateTotalInMaster($mid)){$response['SUCCESS'] = 1;}    
    }
echo json_encode($response);
exit();
