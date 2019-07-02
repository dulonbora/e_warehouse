<?php
error_reporting(0);
ob_start();
if (session_status()    == PHP_SESSION_NONE) {session_start();}
$userId                 = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

include_once '../classes/Transfar_Master.php';
$response               = array();
$response['SUCCESS']    = 0;

$__tra = new Transfar_Master();

$_user_from             = filter_input(INPUT_POST, 'USER_FROM');
$_mode                  = filter_input(INPUT_POST, 'MODE');
$_vch_type              = filter_input(INPUT_POST, 'VCH_TYPE');
$_longDate              = filter_input(INPUT_POST, 'LONGDATE');
$_user_to               = $userId;
$_too                   = "";
$_fyear                 = date("Y");
$_longdate              = time();

$_create_by             = $userId;
$_modify_by             = $userId;




$__tra->setUser_from($_user_from);
$__tra->setUser_to($_user_to);
$__tra->setMode($_mode);
$__tra->setToo($_too);
$__tra->setVch_type($_vch_type);
$__tra->setFyear($_fyear);
$__tra->setLongdate(strtotime($_longDate.' 00:00:02'));

$__tra->setCreate_by($_create_by);
$__tra->setCreate_on(time());
$__tra->setModify_by($_modify_by);
$__tra->setModify_on(time());

if ($__tra->Insert() == 1) {
    $response['SUCCESS'] = $__tra->getId();
}

echo json_encode($response);
exit();
