<?php

require_once('../classes/Brand__Master.php');
$_Brand__Master = new Brand__Master();

$_str = filter_input(INPUT_GET , "p");

$response = array();
$response["SUCCESS"] = 0;

$Result = $_Brand__Master->loadAllSearch($_str, 0, 20);
if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    foreach ($Result as $rows) {
        
        $Edict['ID']           = $rows['ID'];
        $Edict['NAME']         = $rows['NAME']          == NULL ? "0" : $rows['NAME'];
        $Edict['GROUP_ID']     = $_Brand__Master->getParentNameFromCategory($rows['GROUP_ID']);
        $Edict['CATEGORY_ID']  = $_Brand__Master->getParentNameFromCategory($rows['CATEGORY_ID']);
        $Edict['TYPE_ID']      = $_Brand__Master->getParentNameFromCategory($rows['TYPE_ID']);
        $Edict['STRANGTH']     = $rows['STRANGTH']      == NULL ? "" : $rows['STRANGTH'];
        $Edict['IS_IMPORTED']  = $rows['IS_IMPORTED']   == NULL ? "" : $rows['IS_IMPORTED'];
        $Edict['IS_NEW']       = $rows['IS_NEW']        == NULL ? "" : $rows['IS_NEW'];
        $Edict['STATUS']       = $rows['STATUS']        == NULL ? "" : $rows['STATUS'];

        array_push($response['CONTENTS'], $Edict);
        $response["SUCCESS"] = 1; // loaded
    }
} else {
    $response["SUCCESS"] = 0;
}
echo json_encode($response);
?>