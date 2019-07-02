<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'] == NULL ? 0 : $_SESSION['id'];


include '../classes/Company.php';


$response = array(); 
$response["SUCCESS"] = 0;

$__com = new Company();

$ok = $__com->Check_If_Exists($userId);


$_company_name = filter_input(INPUT_POST , "COMPANY_NAME");
$_email = filter_input(INPUT_POST , "EMAIL");
$_phone_no = filter_input(INPUT_POST , "PHONE_NO");
$_address = filter_input(INPUT_POST , "ADDRESS");
$_city = filter_input(INPUT_POST , "CITY");
$_state = filter_input(INPUT_POST , "STATE");
$_zip = filter_input(INPUT_POST , "ZIP");
$_gstn = filter_input(INPUT_POST , "GSTN");
$_pan_or_it_no = filter_input(INPUT_POST , "PAN_OR_IT_NO");
$_sales_tax_no = filter_input(INPUT_POST , "SALES_TAX_NO");
$_cst_no = filter_input(INPUT_POST , "CST_NO");
$_status = filter_input(INPUT_POST , "STATUS");
$_create_on = time();
$_create_by = $userId;
$_modify_on = time();
$_modify_by = $userId;


$__com->setCompany_name($_company_name);
$__com->setEmail($_email);
$__com->setPhone_no($_phone_no);
$__com->setAddress($_address);
$__com->setCity($_city);
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


if($ok > 0){if($__com->Update($ok)==1){$response["SUCCESS"] = 1;}}
else {if($__com->Insert()==1){$response["SUCCESS"] = 1;}}


echo json_encode($response);
exit();

?>
