<?php

include '../classes/Company.php';
$Company         = new Company();

include '../classes/Json_Parsar.php';
$Json__Parsar   = new Json_Parsar();

$status          = filter_input(INPUT_GET, 'i');

$TotalRow = $Company->TotalCountByStatus("O", $status);

$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $Company->loadAllPaggingByStatus($start, $limit, "O", $status);

str_replace("null", "", $Json__Parsar->PrintSingleJSON($Result));

