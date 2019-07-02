<?php

require_once('../classes/Category.php');
$_Category = new Category();

$_id = filter_input(INPUT_GET , "p");
$_parent_id = $_id == NULL ? "GROUP" : $_id;

$response = array();
$response["SUCCESS"] = 0;


$TotalRow = $_Category->TotalCountByType($_parent_id);
$limit = 100;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_Category->loadAllPaggingByType($_parent_id, $start, $limit);
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