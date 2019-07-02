<?php

include '../classes/User_Item_Transfer_View.php';
include '../classes/Json_Parsar.php';

$User_Item_Transfer_View    = new User_Item_Transfer_View();
$Json__Parsar               = new Json_Parsar();

$status                     = filter_input(INPUT_GET, 'i');
$io                         = filter_input(INPUT_GET, 'io');

$TotalRow = $User_Item_Transfer_View->TotalCountByIo_Type($status, $io);

$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;


$Result = $User_Item_Transfer_View->loadAllPaggingByIo_Type($start, $limit, $status, $io);

$Json__Parsar->PrintSingleJSON($Result);

