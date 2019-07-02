<?php

include '../classes/Ena_Transfar_View.php';
$Ena_Transfar_View = new Ena_Transfar_View();

include '../classes/Json_Parsar.php';
$Json__Parsar = new Json_Parsar();

$status = filter_input(INPUT_GET, 'i');
$io = filter_input(INPUT_GET, 'io');

$TotalRow = $Ena_Transfar_View->TotalCountByIo_Type($status, $io);

$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;


$Result = $Ena_Transfar_View->loadAllPaggingByIo_Type($start, $limit, $status, $io);

$Json__Parsar->PrintSingleJSON($Result);

