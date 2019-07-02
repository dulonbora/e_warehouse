<?php
error_reporting(0);
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['excise_user_id'] == NULL ? 0 : $_SESSION['excise_user_id'];

include '../classes/Company.php';
include '../classes/Global_Functions.php';


$response = array(); 
$response["SUCCESS"] = 0;

$__com = new Company();
$__glo = new Global_Functions();



$_gstn = filter_input(INPUT_POST , "GSTN");
$_pan_or_it_no = filter_input(INPUT_POST , "PAN_OR_IT_NO");
$_sales_tax_no = filter_input(INPUT_POST , "SALES_TAX_NO");
$_cst_no = filter_input(INPUT_POST , "CST_NO");
$_id = filter_input(INPUT_POST , "ID");


$__com->setGSTN($_gstn);
$__com->setPAN_OR_IT_NO($_pan_or_it_no);
$__com->setSALES_TAX_NO($_sales_tax_no);
$__com->setCST_NO($_cst_no);
$__com->setID($_id);

$ok = $__com->Check_If_Exists($userId);

if($__com->UpdateTaxDetails($ok)==1){$response["SUCCESS"] = 1;}

echo json_encode($response);
exit();
