<?php

require_once('../classes/Ena__Item__List.php');
$_Ena_Item = new Ena__Item__List();

require_once('../classes/Brand__Master.php');
$_brandMaster = new Brand__Master();

$response = array();
$response["SUCCESS"] = 0;

$TotalRow = $_Ena_Item->TotalCount();
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_Ena_Item->loadAllPagging($start, $limit);
if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        $Edict['ID']           = $rows['ID'];
        $Edict['ITEM_NAME']    = $rows['ITEM_NAME']          == NULL ? "0" : $rows['ITEM_NAME'];
        $Edict['GROUP_ID']     = $_brandMaster->getParentNameFromCategory($rows['GROUP_ID']);
        $Edict['CATEGORY_ID']  = $_brandMaster->getParentNameFromCategory($rows['CATEGORY_ID']);
        $Edict['TYPE_ID']      = $_brandMaster->getParentNameFromCategory($rows['TYPE_ID']);
        $Edict['STRANGTH']     = $rows['STRANGTH']      == NULL ? "" : $rows['STRANGTH'];
        $Edict['FEE_REQUIRE']  = $rows['FEE_REQUIRE']   == NULL ? "" : $rows['FEE_REQUIRE'];
        $Edict['I_FEE']        = $rows['I_FEE']         == NULL ? "" : $rows['I_FEE'];
        $Edict['E_FEE']        = $rows['E_FEE']         == NULL ? "" : $rows['E_FEE'];
        $Edict['T_FEE']        = $rows['T_FEE']         == NULL ? "" : $rows['T_FEE'];
        $Edict['STATUS']       = $rows['STATUS']        == NULL ? "" : $rows['STATUS'];

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>