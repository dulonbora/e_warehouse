<?php

error_reporting(0);
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['id'];

include '../classes/Brand__Master.php';

$response = array(); 
$response["SUCCESS"] = 0;

$__bra = new Brand__Master();
$_id                = filter_input(INPUT_POST , "ID");
$_name              = filter_input(INPUT_POST , "NAME");
$_strangth          = filter_input(INPUT_POST , "STRANGTH");
$_group_id          = filter_input(INPUT_POST , "GROUP_ID");
$_category_id       = filter_input(INPUT_POST , "CATEGORY_ID");
$_company_id        = filter_input(INPUT_POST , "COMPANY_ID");
$_type_id           = filter_input(INPUT_POST , "TYPE_ID");
$_is_imported       = filter_input(INPUT_POST , "IS_IMPORTED");
$_is_new            = filter_input(INPUT_POST , "IS_NEW");
$_item_for          = filter_input(INPUT_POST , "ITEM_FOR");
$_image_link        = filter_input(INPUT_POST , "IMAGE_LINK");
$_description       = filter_input(INPUT_POST , "DESCRIPTION");
$_status            = filter_input(INPUT_POST , "STATUS");
$_create_on         = time();
$_create_by         = $userId;
$_modify_on         = time();
$_modify_by         = $userId;
$_is_active         = filter_input(INPUT_POST , "IS_ACTIVE");

$__bra->setName($_name);
$__bra->setStrangth($_strangth);
$__bra->setGroup_id($_group_id);
$__bra->setCategory_id($_category_id);
$__bra->setCompany_id($_company_id);
$__bra->setType_id($_type_id);
$__bra->setIs_imported($_is_imported);
$__bra->setIs_new($_is_new);
$__bra->setItem_for($_item_for);
$__bra->setImage_link($_image_link);
$__bra->setDescription($_description);
$__bra->setStatus($_status);
$__bra->setCreate_on($_create_on);
$__bra->setCreate_by($_create_by);
$__bra->setModify_on($_modify_on);
$__bra->setModify_by($_modify_by);
$__bra->setIs_active($_is_active);

if($_id > 0){if($__bra->Update($_id)==1){$response["SUCCESS"] = 1;}}
else {if($__bra->Insert()==1){$response["SUCCESS"] = 1;}}

echo json_encode($response);
exit();

?>