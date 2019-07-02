<?php

error_reporting(0);
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['excise_user_id'] == NULL ? 0 : $_SESSION['excise_user_id'];

include '../classes/Company.php';
include '../classes/Global_Functions.php';


$response                       = array();
$response["SUCCESS"]            = 0;

$__com                          = new Company();
$__glo                          = new Global_Functions();

$_excise_user_id                = $userId;
$_role                          = filter_input(INPUT_POST, "ROLE", FILTER_SANITIZE_STRING);
$_company_type                  = filter_input(INPUT_POST, "COMPANY_TYPE", FILTER_SANITIZE_STRING);
$_company_logo                  = "logo.png";
$_company_name                  = filter_input(INPUT_POST, "COMPANY_NAME", FILTER_SANITIZE_STRING);
$_email                         = filter_input(INPUT_POST, "EMAIL", FILTER_SANITIZE_EMAIL);
$_phone_no                      = filter_input(INPUT_POST, "PHONE_NO", FILTER_SANITIZE_STRING);
$_address                       = filter_input(INPUT_POST, "ADDRESS", FILTER_SANITIZE_STRING);
$_city                          = filter_input(INPUT_POST, "CITY", FILTER_SANITIZE_STRING);
$_district                      = filter_input(INPUT_POST, "DISTRICT", FILTER_SANITIZE_STRING);
$_sub_division                  = filter_input(INPUT_POST, "SUB_DIVISION", FILTER_SANITIZE_STRING);
$_state                         = filter_input(INPUT_POST, "STATE", FILTER_SANITIZE_STRING);
$_zip                           = filter_input(INPUT_POST, "ZIP",FILTER_SANITIZE_NUMBER_INT);
$_gstn                          = "";
$_pan_or_it_no                  = "";
$_sales_tax_no                  = "";
$_cst_no                        = "";
$_status                        = 0;
$_create_on                     = time();
$_create_by                     = $userId;
$_modify_on                     = time();
$_modify_by                     = $userId;


$__com->setExcise_user_id($_excise_user_id);
$__com->setRole($_role);
$__com->setCompany_type($_company_type);
$__com->setCompany_logo($_company_logo);
$__com->setCompany_name($_company_name);
$__com->setEmail($_email);
$__com->setPhone_no($_phone_no);
$__com->setAddress($_address);
$__com->setCity($_city);
$__com->setDistrict($_district);
$__com->setSub_division($_sub_division);
$__com->setState($_state);
$__com->setZip($_zip);
$__com->setGstn($_gstn);
$__com->setPan_or_it_no($_pan_or_it_no);
$__com->setSales_tax_no($_sales_tax_no);
$__com->setCst_no($_cst_no);
$__com->setStatus($_status);
$__com->setCreate_on($_create_on);
$__com->setCreate_by($_create_by);
$__com->setModify_on($_modify_on);
$__com->setModify_by($_modify_by);
$__com->setIs_active("YES");


$ok = $__com->Check_If_Exists($userId);
if ($ok > 0) {
    if ($__com->UpdateCompanyDetails($ok) == 1) {
        $response["SUCCESS"] = 1;
    }
} else {
    if ($__com->Insert() == 1) {
        $response["SUCCESS"] = 1;
    }
}



echo json_encode($response);
exit();
