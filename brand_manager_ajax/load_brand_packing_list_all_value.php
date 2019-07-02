<?php

ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];

require_once('../classes/Brand__Packing__View.php');
$_brandMaster = new Brand__Packing__View();

require_once('../classes/Json_Parsar.php');
$_Json_Parsar = new Json_Parsar();

//$_id = filter_input(INPUT_GET , "i");
//$_parent_id = $_id == 0 ? 0 : $_id;


$TotalRow = $_brandMaster->TotalCount();
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_brandMaster->loadAllPagging($start, $limit);



$_Json_Parsar->PrintSingleJSON($Result);
