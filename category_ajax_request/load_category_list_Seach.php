<?php

require_once('../classes/Category.php');
$_Category = new Category();

$_str = filter_input(INPUT_GET , "p");

$response = array();
$response["SUCCESS"] = 0;

$Result = $_Category->loadAllSearch($_str, 0, 20);
if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        $Edict['ID']                = $rows['ID'];
        $Edict['PARENT_ID']         = $rows['PARENT_ID'] == NULL ? "0" : $rows['PARENT_ID'];
        $Edict['NAME']              = $rows['NAME'] == NULL ? "" : $rows['NAME'];
        $Edict['TYPE']              = $rows['TYPE'] == NULL ? "" : $rows['TYPE'];
        $Edict['IS_ACTIVE']         = $rows['IS_ACTIVE'] == NULL ? "" : $rows['IS_ACTIVE'];

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>