<?php

require_once('../classes/Brand__Master.php');
require_once('../classes/Brand__Packing.php');
$_brandMaster = new Brand__Master();
$_brandPacking = new Brand__Packing();

$_id = filter_input(INPUT_GET , "p");
$_parent_id = $_id == 0 ? 0 : $_id;

$response = array();
$response["SUCCESS"] = 0;


$TotalRow = $_brandMaster->TotalCount();
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_brandMaster->loadAllPagging($start, $limit);
if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        $Edict['ID']           = $rows['ID'];
        $Edict['NAME']         = $rows['NAME']          == NULL ? "0" : $rows['NAME'];
        $Edict['GROUP_ID']     = $_brandMaster->getParentNameFromCategory($rows['GROUP_ID']);
        $Edict['CATEGORY_ID']  = $_brandMaster->getParentNameFromCategory($rows['CATEGORY_ID']);
        $Edict['TYPE_ID']      = $_brandMaster->getParentNameFromCategory($rows['TYPE_ID']);
        $Edict['STRANGTH']     = $rows['STRANGTH']      == NULL ? "" : $rows['STRANGTH'];
        $Edict['IS_IMPORTED']  = $rows['IS_IMPORTED']   == NULL ? "" : $rows['IS_IMPORTED'];
        $Edict['IS_NEW']       = $rows['IS_NEW']        == NULL ? "" : $rows['IS_NEW'];
        $Edict['STATUS']       = $rows['STATUS']        == NULL ? "" : $rows['STATUS'];
        $Edict['COUNT']        = $_brandPacking->TotalCount($rows['ID']);

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>