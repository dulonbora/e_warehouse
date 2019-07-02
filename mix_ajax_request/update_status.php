<?php

ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

include '../classes/Mix__Item__Transfar.php';
$__mix = new Mix__Item__Transfar();

$_id = filter_input(INPUT_POST , 'i');
$_status = filter_input(INPUT_POST , 's');
echo $_id;
echo $_status;

$response = array(); 
$response['SUCCESS'] = 0;

$__mix->setModifyOn(time());
$__mix->setModifyBy($userId);

if($__mix->UpdateStatus($_id, $_status)==1){$response['SUCCESS'] = 1;}

echo json_encode($response);
exit();