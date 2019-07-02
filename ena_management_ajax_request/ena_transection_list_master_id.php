<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

$_id = filter_input(INPUT_GET , 'id');

require_once('../classes/Ena__Transfar.php');
$_Ena_Item = new Ena__Transfar();

require_once('../classes/Ena__User__Item.php');
$_Ena__User__Item = new Ena__User__Item();

require_once('../classes/DateSetter.php');
$_date = new DateSetter();

require_once('../classes/Brand__Master.php');
$_brandMaster = new Brand__Master();

require_once('../classes/Json_Parsar.php');
$Json_Parsar = new Json_Parsar();



$response = array();
$response["SUCCESS"] = 0;

$TotalRow = $_Ena_Item->TotalCountMasterId($_id);


$Result = $_Ena_Item->loadAllPaggingMasterId($_id);

if ($Result > 0) {$Json_Parsar->PrintSingleJSON($Result);}
?>