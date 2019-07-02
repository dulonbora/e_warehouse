<?php
include '../classes/Transfar_Master.php';
include '../classes/Global_Functions.php';
$_id = filter_input(INPUT_GET , "i");

$Transfar_Master        = new Transfar_Master();
$Global_Functions       = new Global_Functions();
$Transfar_Master->LoadValue($_id);
$status                 = $Transfar_Master->getStatus()+1;


if($Transfar_Master->UpdateStatus($_id, $status)){
    $Global_Functions->pageRedirect("../consignment_ena/consignment_details.php?i=".$_id);
}