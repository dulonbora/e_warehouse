<?php
require_once('../classes/Category.php');
ob_start();
$id = filter_input(INPUT_GET, 'i');
$_category = new Category();
$Results = $_category->LoadValue($id);

$response = array();
if ($Results > 0) {
    
$response['CONTENTS'] = array();
$Edict= array();

$Edict['ID']            = $_category->getId();
$Edict['PARENT_ID']     = $_category->getParent_id();
$Edict['NAME']          = $_category->getName();
$Edict['TYPE']          = $_category->getType();
$Edict['IS_ACTIVE']     = $_category->getIs_active();

array_push($response['CONTENTS'], $Edict);
$response["SUCCESS"] = 1; // echoing JSON response
echo json_encode($response);

}

else{
$response["SUCCESS"] = 0;
$response['CONTENTS'] = "Id not found.";
echo json_encode($response);
}

?>
